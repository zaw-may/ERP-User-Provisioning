<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function index ()
    {
        $roles = Role::all();
        return view('roles.roles-list', compact('roles'));
    }

    public function create()
    {
        return view('roles.create-role');
    }

    public function store(Request $request)
    {
        $request -> validate([
            'id' => ['required', 'numeric'],
            'name' => ['required', 'string', 'max:255']
        ]);

        Role::create($request -> all());

        return redirect () -> route('roles.roles-list') -> with ('success', 'Role created successfully');
    }

    public function show($id)
    {
        $role = Role::find($id);
        return view('roles.show', compact('role'));
    }

    public function eidt($id)
    {
        $role = Role::find($id);
        return view('roles.eidt', compact('role'));
    }

    public function update(Request $request, $id)
    {
        $request -> validate([
            'id' => ['required', 'numeric'],
            'name' => ['required', 'string', 'max:255']
        ]);

        $role = Role::find($id);
        $role -> update($request -> all());

        return redirect() -> route('roles.roles-list') -> with('success', 'Role updated successfully');
    }

    public function destroy($id)
    {
        Role::destroy($id);
        return redirect() -> route('roles.roles-list') -> with('success', 'Role deleted successfully');
    }
}
