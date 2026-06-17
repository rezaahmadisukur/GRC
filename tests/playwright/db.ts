import mysql, { RowDataPacket } from "mysql2/promise";

export const ADMIN_PASSWORD = "grcrental123";
export const OWNER_PASSWORD = "password123";

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
export async function ensureAdminUser() {
    const db = await getDb();

    try {
        // Cari admin aktif
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
            return { username: admin.username, must_change_password: 0 };
        }

        // Coba cari admin nonaktif (kena toggle oleh owner test)
        const [inactiveRows] = await db.execute<RowDataPacket[]>(
            "SELECT id, username, must_change_password FROM users WHERE role = 'admin' AND is_active = 0 LIMIT 1",
        );

        if (inactiveRows.length === 0) {
            return undefined;
        }

        const inactive = inactiveRows[0] as {
            id: number;
            username: string;
            must_change_password: number;
        };

        await db.execute(
            "UPDATE users SET is_active = 1, must_change_password = 0 WHERE id = ?",
            [inactive.id],
        );

        return { username: inactive.username, must_change_password: 0 };
    } finally {
        await db.end();
    }
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
