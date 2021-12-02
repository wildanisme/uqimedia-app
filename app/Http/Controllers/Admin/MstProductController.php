<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mst\Product;
use App\Models\Mst\Satuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Response;
use App\Http\Requests\StoreMstProductRequest;
use App\Http\Requests\UpdateMstProductRequest;
use DB;

class MstProductController extends Controller
{
    public function index()
    {
        $product = Product::with(['satuan'])->get();

        return view('admin.master.product-index', compact('product'));
    }

    public function create()
    {
        $satuan = Satuan::all();

        return view('admin.master.product-create', compact('satuan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'string|required',
            'satuan' => 'numeric|required',
            'harga' => 'numeric|required'
        ]);

        Product::create([
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
        $product = Product::findOrFail($id);
        $satuan = Satuan::all();

        return view('admin.master.product-edit', compact('satuan', 'product'));
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
        //
    }
}
