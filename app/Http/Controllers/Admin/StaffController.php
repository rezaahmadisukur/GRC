<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStaffRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    public function index()
    {
        // Get all user where have the role is admin
        $staffs = User::where('role', 'admin')->get();
        return view('admin.staff.index', compact('staffs'));
    }

    public function store(StoreStaffRequest $request)
    {
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => 'admin',
            'is_active' => true
        ]);

        return back()->with('success', 'Admin baru berhasil didaftarkan!');
    }

    public function toggleStatus(User $user)
    {
        // Fitur buat pecat/aktifin admin tanpa hapus datanya
        $user->update([
            'is_active' => !$user->is_active
        ]);
        return back()->with('success', 'Status admin berhasil diubah!');
    }

    public function resetPassword(User $user)
    {

        // Reset to default password 'grcrental123'
        $user->update([
            'password' => Hash::make('grcrental123'),
            'must_change_password' => true
        ]);

        return back()->with('success', 'Password ' . $user->name . ' berhasil direset jadi: grcrental123');
    }
}
