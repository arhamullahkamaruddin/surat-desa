<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where(
            'role',
            'user'
        )
        ->latest()
        ->paginate(10);

        return view(
            'superadmin.user.index',
            compact('users')
        );
    }

    public function create()
    {
        return view(
            'superadmin.user.create'
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
            'role' => 'user',
        ]);

        return redirect()
            ->route('admin.user.index')
            ->with(
                'success',
                'User berhasil ditambahkan.'
            );
    }

    public function edit(User $user)
    {
        abort_if(
            $user->role !== 'user',
            404
        );

        return view(
            'superadmin.user.edit',
            compact('user')
        );
    }

    public function update(
        Request $request,
        User $user
    ) {
        abort_if(
            $user->role !== 'user',
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
                'unique:users,email,' . $user->getKey(),
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

        $user->update($data);

        return redirect()
            ->route('admin.user.index')
            ->with(
                'success',
                'User berhasil diperbarui.'
            );
    }

    public function destroy(User $user)
    {
        abort_if(
            $user->role !== 'user',
            404
        );

        $user->delete();

        return back()->with(
            'success',
            'User berhasil dihapus.'
        );
    }
}
