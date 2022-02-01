<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mst\Product;
use App\Models\Mst\Satuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Response;

class MstProductController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('product_access'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $web = [
            'site' => 'UQIMEDIA App',
            'page' => 'Produk'
        ];
        $satuan = Satuan::all();
        $product = Product::with(['satuan'])->get();

        return view('admin.master.product-index', compact('product', 'satuan', 'web'));
    }

    public function create()
    {
        abort_if(Gate::denies('product_create'), Response::HTTP_FORBIDDEN, 'Forbidden');
        $web = [
            'site' => 'UQIMEDIA App',
            'page' => 'Tambah Produk'
        ];
        $satuan = Satuan::all();

        return view('admin.master.product-create', compact('satuan', 'web'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'string|required',
            'satuan' => 'numeric|required',
            'harga' => 'numeric|required'
        ]);

        $product = new Product;
        $product->nama = $request->nama;
        $product->id_satuan = $request->satuan;
        $product->harga = $request->harga;
        $product->save();
        // Product::create([
        //     'nama' => $request->nama,
        //     'id_satuan' => $request->satuan,
        //     'harga' => $request->harga
        // ]);

        return redirect()->route('admin.product.index')->with('status-success', 'New Product Created');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        abort_if(Gate::denies('product_edit'), Response::HTTP_FORBIDDEN, 'Forbidden');
        $web = [
            'site' => 'UQIMEDIA App',
            'page' => 'Edit Produk'
        ];
        $product = Product::findOrFail($id);
        $satuan = Satuan::all();

        return view('admin.master.product-edit', compact('satuan', 'product', 'web'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $data = $request->validate([
            'nama' => 'string|required',
            'satuan' => 'numeric|required',
            'harga' => 'numeric|required'
        ]);

        $product->update($data);

        return redirect()->route('admin.product.index')->with('status-success', 'Produk Berhasil Diedit');
    }

    public function destroy($id)
    {
        abort_if(Gate::denies('product_delete'), Response::HTTP_FORBIDDEN, 'Forbidden');
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.product.index')->with('status-success', 'Produk Berhasil Dihapus');
    }
}
