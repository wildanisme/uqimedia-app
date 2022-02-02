@extends('layouts.admin')

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
            <li class="breadcrumb-item active">Edit</li>
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
                        <h3 class="card-title">Edit Role</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.roles.update', $role->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="title" class="required col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>
                                <div class="col-md-6">
                                    <input id="text" type="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $role->title) }}" required autocomplete="title">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="short_code" class="col-md-4 col-form-label text-md-right">{{ __('Short Code') }}</label>
                                <div class="col-md-6">
                                    <input id="text" type="short_code" class="form-control @error('short_code') is-invalid @enderror" name="short_code" value="{{ old('short_code', $role->short_code) }}" autocomplete="short_code">
                                    @error('short_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
            
                            <div class="form-group row">
                                <label for="permissions" class="col-md-4 col-form-label text-md-right">{{ __('Permissions') }}</label>
                                <div class="col-md-6" id="permissions-select">
                                    <select name="permissions[]" id="permissions" class="@error('permissions') is-invalid @enderror"  multiple>
                                        @foreach ($permissions as $id => $permission)
                                            <option value="{{ $id }}" {{ (in_array($id, old('permissions', [])) || $role->permissions->contains($id)) ? 'selected' : '' }}>{{ $permission }}</option>
                                        @endforeach
                                    </select>
                                    <a href="#" id="permission-select-all" class="btn btn-link">select all</a>
                                    <a href="#" id="permission-deselect-all" class="btn btn-link">deselect all</a>
            
                                    @error('permissions')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
            
                                </div>
                            </div>
            
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
    <script>
        var permission_select = new SlimSelect({
            select: '#permissions-select select',
            //showSearch: false,
            placeholder: 'Select Permissions',
            deselectLabel: '<span>&times;</span>',
            hideSelectedOption: true,
        })

        $('#permissions-select #permission-select-all').click(function(){
            var options = [];
            $('#permissions-select select option').each(function(){
                options.push($(this).attr('value'));
            });

            permission_select.set(options);
        })

        $('#permissions-select #permission-deselect-all').click(function(){
            permission_select.set([]);
        })
    </script>
@endsection
