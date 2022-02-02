@extends('layouts.admin')
@section('title')
    {{ $title }}
@endsection
@section('content')
<div class="content-header">    
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Master Produk</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Master</a></li>
            <li class="breadcrumb-item active">Product</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Produk</h3>
                        <div class="card-tools">
                            @can('product_create')
                            <a href="{{ route('admin.product.create') }}" class="btn btn-sm btn-outline-primary">Add New Product</a>
                            @endcan
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    {{-- @include('partial.admin.flash-message') --}}
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="tableProduct">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th>Nama Product</th>
                                        <th>Satuan</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($product as $value)
                                {{-- @dd($value) --}}
                                    <tr>
                                        <td class="text-center">{{$value->id}}</td>
                                        <td>{{$value->nama}}</td>
                                        <td>{{$value->satuan->nama}}</td>
                                        <td>{{$value->harga}}</td>
                                        <td>
                                            @can('products_edit')
                                                <a href="{{ route('admin.product.edit', $value->id) }}" class="btn btn-sm btn-outline-warning">Edit</a>
                                            @endcan
                                            @can('products_delete')
                                            <form action="{{ route('admin.product.destroy', $value->id) }}" class="d-inline-block" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-outline-danger">Delete</button>
                                            </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    $('#tableProduct').DataTable({
        'processing': true,
        'responsive': true,
    });
</script>
@endsection