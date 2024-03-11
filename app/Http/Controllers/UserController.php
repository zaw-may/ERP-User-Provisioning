<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use App\Models\Role;
use App\Models\User;


class UserController extends Controller
{
    public function index () 
    {
        if (Auth::check()) {
            $users = User::all();
            return view('users.all-users', compact('users'));
        } else {
            return redirect()->route('login')->with('error', 'You need to login to view users.');
        }        
    }

    public function create () 
    {
        if (Auth::check()) {
            return view('users.create-new-user', ['roles'=>Role::all()]);
        } else {
            return redirect()->route('login')->with('error', 'You are not allowed to create a new user.');
        }
    }

    public function store (Request $request) 
    {
        if (Auth::check()) {
            $request->validate([
                'id' => ['required', 'string', 'max:10'],
                'name' => ['required', 'string', 'max:255'],
                'username' => ['required', 'string', 'max:255'],
                'role_id' => ['required', 'numeric'],
                'phone' => ['required', 'string', 'min:8', 'max:12'],
                'email' => ['required', 'string', 'lowercase','email', 'max:255', 'unique:'.User::class],
                'address' => ['required', 'string', 'max:255'],
                'gender' => ['required', 'string', 'min:1'],
                'is_active' => ['nullable', 'string', 'max:4'],
                'password' => ['required', 'string', 'min:8']
            ]);
            User::create($request -> all());
            return redirect()->route('users.all-users')->with('success', 'User created successfully.');
        } else {
            return redirect()->route('users.create')->withInput()->with('error', 'User creating cannot be done.');
        }        
    }

    public function show (User $userid) 
    {
        if (Auth::check()) {
            $user = User::find($userid);
            return view('users.show', compact('user'));
        } else {
            return redirect()->route('login')->with('error', 'You must be logged in to access the user list page.');
        }        
    }

    public function edit(User $userid) 
    {
        if (Auth::check()) {
            return view('users.edit', [
                'user'=> $userid,
                'roles'=>Role::all()
            ]);
        } else {
            return redirect()->route('login')->with('error', 'You are not allowed to edit the user details.');
        }        
    }

    public function update(Request $request, User $userid)
    {
        if (Auth::check()) {
            $request->validate ([
                'id' => ['required', 'string', 'max:10'],
                'name' => ['required', 'string', 'max:255'],
                'username' => ['required', 'string', 'max:255'],
                'role_id' => ['required', 'numeric'],
                'phone' => ['required', 'string', 'min:8', 'max:12'],
                'email' => ['required', 'string', 'lowercase','email', 'max:255', 'unique:'.User::class],
                'address' => ['required', 'string', 'max:255'],
                'gender' => ['required', 'string', 'min:1'],
                'is_active' => ['nullable', 'string', 'max:4'],
                'password' => ['required', 'string', 'min:8']
            ]);    
            $user = User::find($userid);
            $user->update($request->all());    
            return redirect()->route('users.all-users')->with ('success', 'User updated successfully.');
        } else {
            return redirect()->route('login')->with('error', 'You are not allowed to update the user details.');
        }        
    }

    public function destroy(User $userid)
    {
        if (Auth::check()) {
            $userid->delete();
            return redirect()->route('users.all-users')->with ('success', 'User deleted successfully.');
        } else {
            return redirect()->route('login')->with('error', 'You are not allowed to delete the existing user without permission.');
        }        
    }
}
