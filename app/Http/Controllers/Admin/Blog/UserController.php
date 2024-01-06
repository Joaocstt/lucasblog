<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Blog\User\UpdateRequest;
use App\Http\Requests\Admin\Blog\User\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        foreach ($users as $user) {
            $user->avatar_url = asset('storage/' . $user->avatar);
        }

        return Inertia::render('Admin/Blog/User/List', [
            'users' => $users
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Blog/User/Manager');
    }

    public function store(UserRequest $request)
    {
        $user = new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->role = $request->get('role');

        if($request->hasFile('avatar')) {
            $user->avatar = $request->file('avatar')->store('users');
        }

        $user->save();

        return redirect()->route('admin.users.index');
    }

    public function edit(string $id)
    {
        $user = User::query()->findOrFail($id);

        return Inertia::render('Admin/Blog/User/EditUser', [
            'user' => $user
        ]);
    }

    public function update(UpdateRequest $request, string $id)
    {
        $user = User::query()->findOrFail($id);

        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->role = $request->get('role');
        $user->password = $request->get('password');

        if($request->hasFile('avatar')){
            Storage::delete('users/' . $user->avatar);
            $user->avatar = $request->file('avatar')->store('users');
        }

        $user->save();

        return redirect()->route('admin.users.index');
    }


    public function delete(string $id)
    {
        $user = User::query()->findOrFail($id);

        if(Auth::user()->id === $user->id) {
            return redirect()->route('admin.users.index');
        }

        return Inertia::render('Admin/Blog/User/DeleteUser', [
            'userEmail' => $user
        ]);
    }
    public function destroy(string $id)
    {
        $user = User::query()->findOrFail($id);

        $user->delete();

        Storage::delete('users/' . $user->avatar);

        return redirect()->route('admin.users.index');
    }
}
