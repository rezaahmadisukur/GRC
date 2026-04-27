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
        // $staffs = User::where('role', 'admin')->get();
        $staffs = User::getAdminRole();
        return view('admin.staff.index', compact('staffs'));
    }

    public function store(StoreStaffRequest $request)
    {
        $defaultPassword = 'grcrental123';

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($defaultPassword),
            'role' => 'admin',
            'is_active' => true,
            'must_change_password' => true
        ]);

        return back()->with('success', 'Admin baru berhasil dibuat. Password default: ' . $defaultPassword);
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
