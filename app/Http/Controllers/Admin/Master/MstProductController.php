<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Models\Mst\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Response;

class MstProductController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('products_access'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $title = 'Index Produk';
        $product = Products::all();

        return view('admin.master.products.product-index', compact('product', 'title'));
    }

    public function create()
    {
        abort_if(Gate::denies('products_create'), Response::HTTP_FORBIDDEN, 'Forbidden');
        $title = 'Tambah Produk';

        return view('admin.master.products.product-create', compact('title'));
    }

    public function store(Request $request)
    {
        $data = $request->validate->all();

        Products::create([
            'nama' => $request->nama,
            'id_satuan' => $request->satuan,
            'harga' => $request->harga
        ]);

        return redirect()->route('admin.product.index')->with('status-success', 'New Product Created');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        abort_if(Gate::denies('products_edit'), Response::HTTP_FORBIDDEN, 'Forbidden');
        $title = 'Edit Peoduk';
        $product = Products::findOrFail($id);

        return view('admin.master.products.product-edit', compact('product', 'title'));
    }

    public function update(Request $request, $id)
    {
        $product = Products::findOrFail($id);

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
        abort_if(Gate::denies('products_delete'), Response::HTTP_FORBIDDEN, 'Forbidden');
        $product = Products::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.product.index')->with('status-success', 'Produk Berhasil Dihapus');
    }
}
