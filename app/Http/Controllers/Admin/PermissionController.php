<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Response;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        abort_if(Gate::denies('permissions_access'), Response::HTTP_FORBIDDEN, 'Forbidden');
        $title = 'Index Permission';
        $permissions = Permission::paginate(15)->appends($request->query());;
        return view('admin.permissions.index', compact('permissions', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('permissions_create'), Response::HTTP_FORBIDDEN, 'Forbidden');
        $title = 'Tambah Permission';
        return view('admin.permissions.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePermissionRequest $request)
    {
        Permission::create($request->validated());

        return redirect()->route('admin.permissions.index')->with('status-success', 'New Permission Created');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        abort_if(Gate::denies('permissions_edit'), Response::HTTP_FORBIDDEN, 'Forbidden');
        $title = 'Edit Permission';
        return view('admin.permissions.edit', compact('permission', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePermissionRequest $request, Permission $permission)
    {
        $permission->update($request->validated());

        return redirect()->route('admin.permissions.index')->with('status-success', 'Permission Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        abort_if(Gate::denies('permissions_delete'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $permission->delete();

        return redirect()->back()->with('status-success', 'Permission Deleted');
    }
}
