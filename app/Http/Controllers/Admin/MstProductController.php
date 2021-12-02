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
        DB::table('mst_product')->insert([
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
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
