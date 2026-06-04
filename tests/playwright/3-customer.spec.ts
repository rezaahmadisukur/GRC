import { test, expect } from "@playwright/test";
import { getCarPlateCode, getBookingCode } from "./db";

test("TC-VAL-002 | Customer lihat halaman home", async ({ page }) => {
    await page.goto("/");
    await page.waitForLoadState("networkidle");
    await expect(page.locator("h1")).toContainText("Rental Mobil");
});

test("TC-VAL-003 | Customer lihat daftar mobil & filter", async ({ page }) => {
    await page.goto("/cars");
    await page.waitForLoadState("networkidle");

    const cars = page.locator(".car-card");
    await expect(cars.first()).toBeVisible();

    const categorySelect = page.locator("select[name='category']");
    if (await categorySelect.isVisible()) {
        await categorySelect.selectOption("MPV");
        await page.waitForLoadState("networkidle");
        await expect(cars.first()).toBeVisible();
    }
});

test("TC-VAL-004 | Customer lihat detail mobil", async ({ page }) => {
    const car = await getCarPlateCode();

    // Skip kalo db kosong
    test.skip(!car, "Tidak ada data mobil di database.");

    await page.goto(`/cars/${car!.plate_code}`);
    await page.waitForLoadState("networkidle");
    await page.waitForTimeout(500);
    await expect(page.locator("h1")).toBeVisible();
    await expect(
        page.getByRole("heading", { name: "Tarif Sewa" }),
    ).toBeVisible();
});

test("TC-VAL-005 | Customer cek status booking", async ({ page }) => {
    const booking = await getBookingCode();

    // Skip kalo belum ada booking
    test.skip(!booking, "Tidak ada booking di database.");

    await page.goto("/check-booking");
    await page.waitForLoadState("networkidle");
    await page.waitForTimeout(300);
    await page.fill("input[name='query']", booking!.booking_code);
    await page.waitForTimeout(300);
    await page.click("button[type='submit']");
    await page.waitForLoadState("networkidle");
    await page.waitForTimeout(500);

    await expect(page.locator("body")).toContainText(booking!.booking_code);
});
