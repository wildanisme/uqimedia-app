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
            <li class="breadcrumb-item active">Detail</li>
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
                        <h3 class="card-title">Detail Role</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.roles.index') }}" class="btn btn-sm btn-outline-primary">Back to List</a>
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
                            <table class="table table-bordered" id="tableRoles">
                                <thead>
                                    <tr>
                                        <th width="25%">ID</th>
                                        <td>{{ $role->id }}</td>
                                    </tr>
                                    <tr>
                                        <th width="25%">Title</th>
                                        <td>{{ $role->title }}</td>
                                    </tr>
                                    <tr>
                                        <th width="25%">Short Code</th>
                                        <td>{{ $role->short_code ?? "--" }}</td>
                                    </tr>
                                    <tr>
                                        <th width="25%" class="d-flex">Permissions</th>
                                        <td>
                                            @foreach ($role->permissions as $permission)
                                            <div class="btn btn-xs btn-outline-primary">{{ $permission->name }}</div>
                                            @endforeach
                                        </td>
                                    </tr>
                                </thead>
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
{{-- <script>
    $('#tableRoles').DataTable({
        'processing':true
    });
</script>  --}}
@endsection