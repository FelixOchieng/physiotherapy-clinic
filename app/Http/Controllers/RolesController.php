<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:view role')->only(['index', 'show']);
        $this->middleware('permission:add role')->only(['create', 'store']);
        $this->middleware('permission:edit role')->only(['edit', 'update']);
        $this->middleware('permission:delete role')->only(['delete']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();

        return view('role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = new Role();
        $permissions = Permission::all();
        return view('role.create', compact('permissions', 'role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        $role = Role::create($request->validated());

        if ($request->has('permissions')) {
            $permissions = $request->permissions;
            $role->syncPermissions($permissions);
        }

        return redirect()->route('role.index')->with('success', 'Role created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('role.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('role.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, Role $role)
    {
        $role->update($request->validated());

        if ($request->has('permissions')) {
            $permissions = $request->permissions;
            $role->syncPermissions($permissions);
        } else {
            foreach ($role->permissions as $permission) {
                $role->revokePermissionTo($permission);
            }
        }


        return redirect()->route('role.index')->with('success', 'Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        foreach ($role->permissions as $permission) {
            $role->revokePermissionTo($permission);
        }

        $role->delete();
        return redirect()->route('role.index')->with('success', 'Role deleted successfully');
    }
}
