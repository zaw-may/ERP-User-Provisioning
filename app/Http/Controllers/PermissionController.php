<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('permissions.permissions-list', compact('permissions'));
    }

    public function create()
    {
        return view('permissions.create');
    }

    public function store(Request $request)
    {
        $request -> validate([
            'id' => ['required', 'string', 'max:10'],
            'name' => ['required', 'string', 'max:255'],
            'feature_id' => ['required', 'string', 'max:255']
        ]);

        Permission::create($request -> all());

        return redirect() -> route('permissions.permissions-list') -> with('success', 'Permission created successfully');
    }

    public function show($id)
    {
        $permission = Permission::find($id);
        return view('permissions.show', compact('permission'));
    }

    public function edit($id)
    {
        $permission = Permission::find($id);
        return view('permissions.edit', compact('permission'));
    }

    public function update(Request $request, $id)
    {
        $request -> validate([
            'id' => ['required', 'string', 'max:10'],
            'name' => ['required', 'string', 'max:255'],
            'feature_id' => ['required', 'string', 'max:255']
        ]);

        $permission = Permission::find($id);
        $permission -> update($request -> all());

        return redirect() -> route('permmissions.permissions-list') -> with('success', 'Permission updated successfully');
    }

    public function destroy($id)
    {
        Permission::destroy($id);
        return redirect() -> route('permissions.permissions-list') -> with('success', 'Permission deleted successfully');
    }
}
