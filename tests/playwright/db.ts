import mysql, { RowDataPacket } from "mysql2/promise";
import { execSync } from "child_process";

export async function getDb() {
    return mysql.createConnection({
        host: "127.0.0.1",
        user: "root",
        password: "",
        database: "db_grc",
    });
}

export async function getOwnerUser() {
    const db = await getDb();
    const [rows] = await db.execute<RowDataPacket[]>(
        "SELECT * FROM users WHERE role = 'owner' LIMIT 1",
    );
    await db.end();
    return rows[0] as { username: string; password?: string };
}

/**
 * Pastikan admin user tersedia dan must_change_password = false.
 * Pakai Laravel artisan untuk manage password hash (bcrypt compat).
 */
export async function ensureAdminUser(): Promise<{
    username: string;
    must_change_password: number;
}> {
    const db = await getDb();

    const [rows] = await db.execute<RowDataPacket[]>(
        "SELECT id, username, must_change_password FROM users WHERE role = 'admin' AND is_active = 1 LIMIT 1",
    );

    if (rows.length > 0) {
        const admin = rows[0] as {
            id: number;
            username: string;
            must_change_password: number;
        };

        if (admin.must_change_password) {
            await db.execute(
                "UPDATE users SET must_change_password = 0 WHERE id = ?",
                [admin.id],
            );
        }

        await db.end();
        return { username: admin.username, must_change_password: 0 };
    }

    // Generate unique username
    const username = "admin_" + Date.now();

    // Gunakan Laravel artisan untuk create user (bcrypt hash compatible)
    // Laravel sudah jalan di localhost:8000, kita bisa pakai exec ke php artisan
    try {
        const escapedName = "Admin Test " + Date.now();
        const escapedUser = username;

        execSync(
            `php artisan tinker --execute="
                \\App\\Models\\User::create([
                    'name' => '${escapedName}',
                    'username' => '${escapedUser}',
                    'password' => \\Illuminate\\Support\\Facades\\Hash::make('grcrental123'),
                    'role' => 'admin',
                    'is_active' => true,
                    'must_change_password' => false,
                ]);
            " 2>&1`,
            { cwd: process.cwd() },
        );
    } catch (e) {
        // Jika gagal, mungkin user sudah ada (race condition)
        console.error(
            "ensureAdminUser: Gagal create via artisan, fallback ke cek ulang",
            e,
        );
    }

    await db.end();
    return { username, must_change_password: 0 };
}

export async function getBookingCode() {
    const db = await getDb();
    const [rows] = await db.execute<RowDataPacket[]>(
        "SELECT booking_code FROM bookings ORDER BY id DESC LIMIT 1",
    );
    await db.end();
    return rows[0] as { booking_code: string } | undefined;
}

export async function getAvailableCar() {
    const db = await getDb();
    const [rows] = await db.execute<RowDataPacket[]>(
        "SELECT id, name, plate_code FROM cars WHERE is_available = 1 LIMIT 1",
    );
    await db.end();
    return rows[0] as
        | { id: number; name: string; plate_code: string }
        | undefined;
}

export async function getCarPlateCode() {
    const db = await getDb();
    const [rows] = await db.execute<RowDataPacket[]>(
        "SELECT plate_code FROM cars LIMIT 1",
    );
    await db.end();
    return rows[0] as { plate_code: string } | undefined;
}
