<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mst\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Response;

class MstPelangganController extends Controller
{

    public function index()
    {
        abort_if(Gate::denies('pelanggan_access'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $web = [
            'site' => 'UQIMEIA App',
            'page' => 'Pelanggan'
        ];
        $pelanggan = Pelanggan::all();

        return view('admin.master.pelanggan-index', compact('pelanggan', 'web'));
    }

    public function create()
    {
        abort_if(Gate::denies('pelanggan_create'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $web = [
            'site' => 'UQIMEIA App',
            'page' => 'Tambah Pelanggan'
        ];

        return view('admin.master.pelanggan-create', compact('web'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'string|required',
            'alamat' => 'string|required',
            'no_telp' => 'string|required'
        ]);
        Pelanggan::create($data);
        // $pelanggan = new Pelanggan;
        // $pelanggan->nama = $request->nama;
        // $pelanggan->alamat = $request->alamat;
        // $pelanggan->no_telp = $request->no_telp;
        // $pelanggan->save();

        return redirect()->route('admin.pelanggan.index')->with('status-success', 'Data Pelanggan Behasil Ditambahkan');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        abort_if(Gate::denies('pelanggan_edit'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $web = [
            'site' => 'UQIMEIA App',
            'page' => 'Tambah Pelanggan'
        ];
        $pelanggan = Pelanggan::findOrFail($id);

        return view('admin.master.pelanggan-edit', compact('web', 'pelanggan'));
    }

    public function update(Request $request, $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $data = $request->validate([
            'nama' => 'string|required',
            'alamat' => 'string|required',
            'no_telp' => 'string|required'
        ]);

        $pelanggan->update($data);

        return redirect()->route('admin.pelanggan.index')->with('status-success', 'Data Pelanggan Berhasil Diupdate');
    }

    public function destroy($id)
    {
        abort_if(Gate::denies('pelanggan_delete'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();

        return redirect()->route('admin.pelanggan.index')->with('status-success', 'Data Pelanggan Berhasil Dihapus');
    }
}
