<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesNPermissionsController extends Controller
{
    public function index()
    {
        $roles = Role::with('permissions')->get();
        $permissions = Permission::all();

        return view('rolesNpermissions.index', compact('roles', 'permissions'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $role = Role::create([
            'name' => $request->role_name,
            'guard_name' => 'web'
        ]);

        $role->givePermissionTo($request->select_form);

        return back()->with('success', 'Successfully Added a Role');
    }

    public function storePermission(Request $request)
    {
        // dd($request->select_form);
        $permission = Permission::create([
            'name' => $request->permission_name,
            'guard_name' => 'web'
        ]);



        return back()->with('success', 'Succesfully Added a Permission');
    }

    public function assignPermissionToRole(Request $request)
    {
        //
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
