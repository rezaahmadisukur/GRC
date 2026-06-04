import { test, expect, Page } from "@playwright/test";
import { getOwnerUser } from "./db";

const ownerLogin = async (page: Page) => {
    const owner: {
        username: string;
        password?: string | undefined;
    } = await getOwnerUser();

    await page.goto("/login");
    await page.waitForLoadState("networkidle");
    await page.waitForTimeout(500);
    await page.fill("input[name='username']", owner.username);
    await page.waitForTimeout(300);
    await page.fill("input[name='password']", "password123");
    await page.waitForTimeout(300);
    await page.click("button[type='submit']");
    await page.waitForLoadState("networkidle");
    await page.waitForTimeout(1000);

    await expect(page).toHaveURL("/dashboard");
};

test("TC-LOG-001 | Owner login ke dashboard", async ({ page }) => {
    await ownerLogin(page);
});

test("TC-VAL-006 | Owner lihat dashboard", async ({ page }) => {
    await ownerLogin(page);

    await expect(page.locator("h2").first()).toContainText("Dashboard");
    await expect(page.locator("body")).toContainText("Owner Rental");
});

test("TC-SEC-001 | Owner buka halaman staff", async ({ page }) => {
    await ownerLogin(page);

    await page.goto("/admin/staff");
    await page.waitForLoadState("networkidle");
    await page.waitForTimeout(500);
    await expect(page.locator("h2").first()).toContainText("Karyawan");
});

test("TC-VAL-009 | Owner buat admin baru", async ({ page }) => {
    await ownerLogin(page);
    await page.goto("/admin/staff");
    await page.waitForLoadState("networkidle");

    // Klik tombol Tambah Admin Baru
    await page.click("text=Tambah Admin Baru");
    await page.waitForTimeout(500);

    // Isi form modal
    await page.fill("input[name='name']", "Staff Test");
    await page.fill("input[name='username']", "staff_" + Date.now());

    // Submit
    await page.click("button:has-text('Simpan')");
    await page.waitForLoadState("networkidle");

    // Cek sukses
    await expect(page.locator("body")).toContainText("berhasil");
});

test("TC-VAL-007 | Owner toggle status staff", async ({ page }) => {
    await ownerLogin(page);
    await page.goto("/admin/staff");
    await page.waitForLoadState("networkidle");
    await page.waitForTimeout(500);

    // Cari tombol Nonaktifkan atau Aktifkan
    const toggleBtn = page
        .locator("button:has-text('Nonaktifkan'), button:has-text('Aktifkan')")
        .first();

    // Skip kalau gak ada staff
    if (!(await toggleBtn.isVisible().catch(() => false))) {
        test.skip(true, "Tidak ada staff untuk di-toggle");
    }

    await toggleBtn.click();
    // Tunggu modal animasi selesai (CSS transition 300ms + requestAnimationFrame)
    await page.waitForTimeout(500);
    // Modal mengubah tombol "Konfirmasi" menjadi "Ya, Nonaktifkan" atau "Ya, Aktifkan"
    await page.locator("#toggleConfirmBtn").click();
    await page.waitForLoadState("networkidle");

    await expect(page.locator("body")).toContainText("berhasil");
});

test("TC-VAL-008 | Owner reset password staff", async ({ page }) => {
    await ownerLogin(page);
    await page.goto("/admin/staff");
    await page.waitForLoadState("networkidle");

    // Cari tombol Reset PW
    const resetBtn = page.locator("text=Reset PW").first();

    // Skip kalau gak ada staff
    if (!(await resetBtn.isVisible().catch(() => false))) {
        test.skip(true, "Tidak ada staff untuk di-reset");
    }

    await resetBtn.click();
    await page.waitForTimeout(500);
    await page.locator("text=Ya, Reset Sekarang").click();
    await page.waitForLoadState("networkidle");

    await expect(page.locator("body")).toContainText("berhasil");
});

test("TC-SEC-002 | Owner logout dari sistem", async ({ page }) => {
    await ownerLogin(page);

    await page.waitForTimeout(1000);
    await page.click("text=Logout");
    await page.waitForLoadState("networkidle");
    await expect(page).toHaveURL("/login");
});
