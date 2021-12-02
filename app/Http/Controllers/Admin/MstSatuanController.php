<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mst\Satuan;
use App\Http\Requests\StoreMstSatuanRequest;
use App\Http\Requests\UpdateMstSatuanRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Response;

class MstSatuanController extends Controller
{

    public function index()
    {
        abort_if(Gate::denies('satuan_access'), Response::HTTP_FORBIDDEN, 'Forbidden');
        $satuan = Satuan::all();

        $satuan_trash = Satuan::withTrashed()->get();

        return view('admin.master.satuan-index', compact('satuan', 'satuan_trash'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('satuan_create'), Response::HTTP_FORBIDDEN, 'Forbidden');

        return view('admin.master.satuan-create');
    }

    public function store(StoreMstSatuanRequest $request)
    {
        Satuan::create($request->validated());

        return redirect()->route('admin.satuan.index')->with('status-success', 'New Satuan Created');
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $satuan = Satuan::findOrFail($id);

        return view('admin.master.satuan-edit', compact('satuan'));
    }

    public function update(UpdateMstSatuanRequest $request, $id)
    {
        $satuan = Satuan::findOrFail($id);
        $satuan->update($request->validated());

        return redirect()->route('admin.satuan.index')->with('status-success', 'Satuan Updated');
    }


    public function destroy($id)
    {
        abort_if(Gate::denies('permission_delete'), Response::HTTP_FORBIDDEN, 'Forbidden');
        $satuan = Satuan::findOrFail($id);
        $satuan->delete();

        return redirect()->back()->with('status-success', 'Satuan Deleted');
    }
}
