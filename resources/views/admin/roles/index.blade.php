@extends('layouts.admin')
@section('title')
    {{$title}}
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
            <li class="breadcrumb-item"><a href="#">ACL</a></li>
            <li class="breadcrumb-item"><a href="#">Roles</a></li>
            <li class="breadcrumb-item active">Index</li>
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
                        <h3 class="card-title">Index Roles</h3>
                        <div class="card-tools">
                            @can('roles_create')
                            <a href="{{ route('admin.roles.create') }}" class="btn btn-sm btn-outline-primary">Tambah Role Baru</a>
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
                        <div class="table-responsive" >
                            <table class="table table-bordered table-hover" id="tableRoles">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th>Title</th>
                                        <th>Short Code</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                    <tr>
                                        <td class="text-center">{{$role->id}}</td>
                                        <td>{{$role->title}}</td>
                                        <td>{{$role->short_code ?? '--'}}</td>
                                        <td>
                                            @can('roles_show')
                                            <a href="{{ route('admin.roles.show', $role->id) }}" class="btn btn-sm btn-outline-success">View</a>
                                            @endcan
                                            @can('roles_edit')
                                            <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-sm btn-outline-warning">Edit</a>
                                            @endcan
                                            @can('roles_delete')
                                            <form action="{{ route('admin.roles.destroy', $role->id) }}" class="d-inline-block" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
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
    $('#tableRoles').DataTable({
        'processing':true,
    });
</script>
@endsection
