<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {

        $roles = Role::get();

        return view('backend.roles.index', [
            'roles' => $roles
        ]);
    }

    public function create()
    {
        return view('backend.roles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        Role::create([
            'name' => $request->name,
        ]);

        return redirect()->route('roles.index');
    }

    public function edit(Role $role)
    {
        return view('backend.roles.edit', [
            'role' => $role
        ]);
    }

    public function update(Request $request, Role $role)
    {
        // dd($request->all());
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $role->update([
            'name' => $request->name,
        ]);

        return redirect()->route('roles.index');
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('roles.index');
    }
}
