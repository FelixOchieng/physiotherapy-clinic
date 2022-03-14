<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view permission')->only(['index', 'show']);
        $this->middleware('permission:add permission')->only(['create', 'store']);
        $this->middleware('permission:edit permission')->only(['edit', 'update']);
        $this->middleware('permission:delete permission')->only(['delete']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::latest()->get();

        return view('permission.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = new Permission();
        return view('permission.create', compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionRequest $request)
    {
        Permission::create($request->validated());

        return redirect()->route('permission.index')->with('success', 'Permission created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Spatie\Permission\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Spatie\Permission\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        return view('permission.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Spatie\Permission\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionRequest $request, Permission $permission)
    {
        $permission->update($request->validated());
        return redirect()->route('permission.index')->with('success', 'Permission updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Spatie\Permission\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('permission.index')->with('success', 'Permission deleted successfully');
    }
}
