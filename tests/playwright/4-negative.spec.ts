import { test, expect } from "@playwright/test";
import {
    ADMIN_PASSWORD,
    ensureAdminUser,
    getDb,
    getOwnerUser,
    OWNER_PASSWORD,
} from "./db";

// ─────────────────────────────────────────────
// NEGATIVE TEST CASES
// Semua test ini menguji skenario Error / Failure
// ─────────────────────────────────────────────

test("TC-NEG-001 | Login gagal - password salah", async ({ page }) => {
    const owner = await getOwnerUser();

    await page.goto("/login");
    await page.waitForLoadState("networkidle");
    await page.waitForTimeout(500);
    await page.fill("input[name='username']", owner.username);
    await page.fill("input[name='password']", "password_salah_123");
    await page.click("button[type='submit']");
    await page.waitForLoadState("networkidle");

    await expect(page).toHaveURL("/login");
    await expect(page.locator("body")).toContainText("Terjadi kesalahan");
});

test("TC-NEG-002 | Login gagal - username tidak terdaftar", async ({
    page,
}) => {
    await page.goto("/login");
    await page.waitForLoadState("networkidle");
    await page.waitForTimeout(500);

    await page.fill("input[name='username']", "user_tidak_ada_99999");
    await page.fill("input[name='password']", OWNER_PASSWORD);
    await page.click("button[type='submit']");
    await page.waitForLoadState("networkidle");

    await expect(page).toHaveURL("/login");
    await expect(page.locator("body")).toContainText("Terjadi kesalahan");
});

test("TC-NEG-003 | Akses dashboard tanpa login", async ({ page }) => {
    await page.goto("/dashboard");
    await page.waitForLoadState("networkidle");

    await expect(page).toHaveURL("/login");
});

test("TC-NEG-004 | Admin akses halaman staff (403)", async ({ page }) => {
    const admin = await ensureAdminUser();
    test.skip(!admin, "Tidak ada admin. Jalankan owner test TC-VAL-009 dulu.");

    await page.goto("/login");
    await page.waitForLoadState("networkidle");
    await page.waitForTimeout(500);
    await page.fill("input[name='username']", admin!.username);
    await page.fill("input[name='password']", ADMIN_PASSWORD);
    await page.click("button[type='submit']");
    await page.waitForLoadState("networkidle");
    await page.waitForTimeout(1000);

    // Coba akses halaman staff (khusus owner)
    await page.goto("/admin/staff");
    await page.waitForLoadState("networkidle");

    // Middleware role:owner → abort(403)
    await expect(page.locator("body")).toContainText("403");
});

test("TC-NEG-005 | Buat admin - username duplicate", async ({ page }) => {
    // Pastikan admin_test sudah ada di database (dari owner test)
    const existingAdmin = await ensureAdminUser();
    test.skip(
        !existingAdmin,
        "Tidak ada admin. Jalankan owner test TC-VAL-009 dulu.",
    );

    const owner = await getOwnerUser();

    // Login sebagai owner
    await page.goto("/login");
    await page.waitForLoadState("networkidle");
    await page.waitForTimeout(500);
    await page.fill("input[name='username']", owner.username);
    await page.fill("input[name='password']", OWNER_PASSWORD);
    await page.click("button[type='submit']");
    await page.waitForLoadState("networkidle");
    await page.waitForTimeout(1000);

    // Buka halaman staff
    await page.goto("/admin/staff");
    await page.waitForLoadState("networkidle");
    await page.waitForTimeout(500);

    // Klik Tambah Admin Baru
    await page.click("text=Tambah Admin Baru");
    await page.waitForTimeout(500);

    // Isi form dengan username yang sudah ada
    await page.fill("input[name='name']", "Admin Duplicate");
    await page.fill("input[name='username']", existingAdmin!.username);
    await page.click("button:has-text('Simpan')");
    await page.waitForLoadState("networkidle");

    // Cek error validasi unique
    await expect(page.locator("body")).toContainText("sudah terdaftar");
});

test("TC-NEG-006 | Buat admin - nama kosong", async ({ page }) => {
    const owner = await getOwnerUser();

    // Login sebagai owner
    await page.goto("/login");
    await page.waitForLoadState("networkidle");
    await page.waitForTimeout(500);
    await page.fill("input[name='username']", owner.username);
    await page.fill("input[name='password']", OWNER_PASSWORD);
    await page.click("button[type='submit']");
    await page.waitForLoadState("networkidle");
    await page.waitForTimeout(1000);

    await page.goto("/admin/staff");
    await page.waitForLoadState("networkidle");
    await page.waitForTimeout(500);

    await page.click("text=Tambah Admin Baru");
    await page.waitForTimeout(500);

    // Nama dikosongkan
    await page.fill("input[name='name']", "");
    await page.fill("input[name='username']", "staff_" + Date.now());
    await page.click("button:has-text('Simpan')");
    await page.waitForLoadState("networkidle");

    // Cek error validasi required
    await expect(page.locator("body")).toContainText("harus diisi");
});

test("TC-NEG-007 | Login gagal - akun nonaktif (with cleanup)", async ({
    page,
}) => {
    const admin = await ensureAdminUser();
    test.skip(!admin, "Tidak ada admin. Jalankan owner test TC-VAL-009 dulu.");

    const db = await getDb();

    try {
        // Set nonaktif
        await db.execute("UPDATE users SET is_active = 0 WHERE username = ?", [
            admin!.username,
        ]);

        // Coba login
        await page.goto("/login");
        await page.waitForLoadState("networkidle");
        await page.waitForTimeout(500);
        await page.fill("input[name='username']", admin!.username);
        await page.fill("input[name='password']", ADMIN_PASSWORD);
        await page.click("button[type='submit']");
        await page.waitForLoadState("networkidle");

        // Harus tetap di halaman login (is_active = 0 ditolak oleh Auth::attempt)
        await expect(page).toHaveURL("/login");
    } finally {
        // Cleanup: aktifkan lagi
        await db.execute("UPDATE users SET is_active = 1 WHERE username = ?", [
            admin!.username,
        ]);
        await db.end();
    }
});
