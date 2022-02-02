<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Models\Mst\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Response;

class MstCustomersController extends Controller
{

    public function index()
    {
        abort_if(Gate::denies('customers_access'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $title = 'Index Pelanggan';
        $customers = Customers::all();

        return view('admin.master.customers.pelanggan-index', compact('pelanggan', 'web'));
    }

    public function create()
    {
        abort_if(Gate::denies('customers_create'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $title

        return view('admin.master.customers.pelanggan-create', compact('web'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'string|required',
            'alamat' => 'string|required',
            'no_telp' => 'string|required'
        ]);
        Customers::create($data);

        return redirect()->route('admin.customers.index')->with('status-success', 'Data Pelanggan Behasil Ditambahkan');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        abort_if(Gate::denies('customers_edit'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $title = 'Edit Pelanggan';
        $customers = Customers::findOrFail($id);

        return view('admin.master.customers.pelanggan-edit', compact('web', 'pelanggan'));
    }

    public function update(Request $request, $id)
    {
        $customers = Customers::findOrFail($id);
        $data = $request->validate([
            'nama' => 'string|required',
            'alamat' => 'string|required',
            'no_telp' => 'string|required'
        ]);

        $customers->update($data);

        return redirect()->route('admin.customers.index')->with('status-success', 'Data Pelanggan Berhasil Diupdate');
    }

    public function destroy($id)
    {
        abort_if(Gate::denies('customers_delete'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $customers = Customers::findOrFail($id);
        $customers->delete();

        return redirect()->route('admin.customers.index')->with('status-success', 'Data Pelanggan Berhasil Dihapus');
    }
}
