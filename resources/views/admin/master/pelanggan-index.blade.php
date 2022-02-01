@extends('layouts.admin')
@section('title')
    {{ $web['site'] }} | {{ $web['page'] }}
@endsection
@section('content')
<div class="content-header">    
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Master</a></li>
            <li class="breadcrumb-item active">Pelanggan</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List Pelanggan</h3>
                        <div class="card-tools">
                            @can('pelanggan_create')
                                <a href="{{ route('admin.pelanggan.create') }}" class="btn btn-sm btn-outline-primary">Add New Pelanggan</a>
                            @endcan
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="tablePelanggan">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Alamat</th>
                                        <th>No Telepon</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pelanggan as $value)
                                    <tr>
                                        <td class="text-center">{{$value->id}}</td>
                                        <td>{{$value->nama}}</td>
                                        <td>{{$value->alamat}}</td>
                                        <td>{{$value->no_telp}}</td>
                                        <td>
                                            @can('pelanggan_edit')
                                            <a href="{{ route('admin.pelanggan.edit', $value->id) }}" class="btn btn-sm btn-outline-warning">Edit</a>
                                            @endcan
                                            @can('pelanggan_delete')
                                            <form action="{{ route('admin.pelanggan.destroy', $value->id) }}" class="d-inline-block" method="post">
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
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
    <script>
        $('#tablePelanggan').DataTable({
            'processing':true
        });
    </script>
@endsection
