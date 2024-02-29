<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\Role;
use App\Models\User;


class UserController extends Controller
{
    public function index () 
    {
        $users = User::all();
        return view('users.all-users', compact('users'));
    }

    public function create () 
    {
        
        return view('users.create-new-user');
    }

    public function store (Request $request) 
    {
        $request -> validate([
            'id' => ['required', 'string', 'max:10'],
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'role_id' => ['required', 'numeric'],
            'phone' => ['required', 'string', 'min:8', 'max:12'],
            'email' => ['required', 'string', 'lowercase','email', 'max:255', 'unique:'.User::class],
            'address' => ['required', 'string', 'max:255'],
            'gender' => ['required'],
            'is_active' => ['nullable', 'string', 'max:3'],
            'password' => ['required', 'string', 'min:8']
        ]);

        User::create($request -> all());

        return redirect() -> route('users.all-users') -> with('success', 'User created successfully');
    }

    public function show ($id) 
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

    public function edit($id) 
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request -> validate ([
            'id' => ['required', 'string', 'max:10'],
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'role_id' => ['required', 'numeric'],
            'phone' => ['required', 'string', 'min:8', 'max:12'],
            'email' => ['required', 'string', 'lowercase','email', 'max:255', 'unique:'.User::class],
            'address' => ['required', 'string', 'max:255'],
            'gender' => ['required'],
            'is_active' => ['nullable', 'string', 'max:3'],
            'password' => ['required', 'string', 'min:8']
        ]);

        $user = User::find($id);
        $user -> update($request -> all());

        return redirect () -> route('users.all-users') -> with ('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect () -> route('users.all-users') -> with ('success', 'User deleted successfully');
    }
}
