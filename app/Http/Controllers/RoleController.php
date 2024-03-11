<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use App\Models\Role;
use App\Models\Permission;
use App\Models\Feature;

class RoleController extends Controller
{
    public function index ()
    {
        if (Auth::check()) {
            $roles = Role::all();
            return view('roles.roles-list', compact('roles'));
        } else {
            return redirect()->route('login')->with('error', 'You need to login first.');
        }        
    }

    public function create ()
    {
        if (Auth::check()) {
            return view('roles.create-role', [
                'permissions' => Permission::all(),
                'features' => Feature::all()
            ]);
        } else {
            return redirect()->route('login')->with('error', 'You are not allowed to create a new role.');
        }        
    }

    public function store(Request $request)
    {
        if (Auth::check()) {
            $request->validate([
                'id' => ['required', 'numeric'],
                'name' => ['required', 'string', 'max:255']
            ]);
            Role::create($request->all());
            return redirect()->route('roles.roles-list')->with('success', 'Role created successfully.');
        } else {
            return redirect()->route('roles.create-role')->withInput()->with('error', 'Role creating cannot be done.');
        }        
    }

    public function show(Role $roleid)
    {
        if (Auth::check()) {
            $role = Role::find($roleid);
            return view('roles.show', compact('role'));
        } else {
            return redirect()->route('login')->with('error', 'You must be logged in to access the role list page.');
        }        
    }

    public function edit(Role $roleid)
    {
        if (Auth::check()) {
            return view('roles.edit', [
                'role'=> $roleid,
                'permissions'=>Permission::all(),
                'features'=>Feature::all()
            ]);
        } else {
            return redirect()->route('login')->with('error', 'You are not allowed to edit the role permissions details.');
        }        
    }

    public function update(Request $request, Role $roleid)
    {
        if (Auth::check()) {
            $request->validate([
                'id' => ['required', 'numeric'],
                'name' => ['required', 'string', 'max:255']
            ]);
            $role = Role::find($roleid);
            $role->update($request->all());
            return redirect()->route('roles.roles-list')->with('success', 'Role updated successfully.');
        } else {
            return redirect()->route('login')->with('error', 'You are not allowed to update the role permissions details.');
        }         
    }

    public function destroy(Role $roleid)
    {
        if (Auth::check()) {
            $roleid->delete();
           return redirect()->route('roles.roles-list')->with('success', 'Role deleted successfully.');
        } else {
            return redirect()->route('login')->with('error', 'You are not allowed to delete the existing role without permission.');
        }
    }
}
