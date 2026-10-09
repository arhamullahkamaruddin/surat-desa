<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $admins = User::where(
            'role',
            'admin'
        )
            ->latest()
            ->paginate(10);

        return view(
            'superadmin.admin.index',
            compact('admins')
        );
    }

    public function create()
    {
        return view(
            'superadmin.admin.create'
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                'unique:users,email',
            ],

            'password' => [
                'required',
                'string',
                'min:8',
            ],
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make(
                $validated['password']
            ),
            'role' => 'admin',
        ]);

        return redirect()
            ->route('superadmin.admin.index')
            ->with(
                'success',
                'Admin berhasil ditambahkan.'
            );
    }

    public function edit(User $admin)
    {
        abort_if(
            $admin->role !== 'admin',
            404
        );

        return view(
            'superadmin.admin.edit',
            compact('admin')
        );
    }

    public function update(
        Request $request,
        User $admin
    ) {
        abort_if(
            $admin->role !== 'admin',
            404
        );

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                'unique:users,email,' . $admin->getKey(),
            ],

            'password' => [
                'nullable',
                'string',
                'min:8',
            ],
        ]);

        $data = [
            'name' => $validated['name'],
            'email' => $validated['email'],
        ];

        if (!empty($validated['password'])) {

            $data['password'] = Hash::make(
                $validated['password']
            );
        }

        $admin->update($data);

        return redirect()
            ->route('superadmin.admin.index')
            ->with(
                'success',
                'Admin berhasil diperbarui.'
            );
    }

    public function destroy(User $admin)
    {
        abort_if(
            $admin->role !== 'admin',
            404
        );

        if ($admin->getKey() === Auth::id()) {

            return back()->with(
                'error',
                'Tidak dapat menghapus akun sendiri.'
            );
        }

        $admin->delete();

        return back()->with(
            'success',
            'Admin berhasil dihapus.'
        );
    }
}
