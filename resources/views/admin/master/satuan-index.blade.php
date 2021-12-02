@extends('layouts.admin')
@section('title')
    {{ $web['site'] }} | {{ $web['page'] }}
@endsection
@section('content')

    <div class="card">
        <div class="card-header">{{ __('Satuan List') }}</div>

        <div class="card-body">
            @can('satuan_create')
            <a href="{{ route('admin.satuan.create') }}" class="btn btn-primary">Add New Satuan</a>
            @endcan

            <br /><br />



                <table class="table table-borderless table-hover">
                  <tr class="bg-info text-light">
                      <th class="text-center">ID</th>
                      <th>Nama Satuan</th>
                      <th>
                          &nbsp;
                      </th>
                  </tr>
                    @forelse ($satuan as $value)
                        <tr>
                            <td class="text-center">{{$value->id}}</td>
                            <td>{{$value->nama}}</td>
                            <td>
                                @can('satuan_edit')
                                    <a href="{{ route('admin.satuan.edit', $value->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                @endcan
                                @can('satuan_delete')
                                <form action="{{ route('admin.satuan.destroy', $value->id) }}" class="d-inline-block" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="100%" class="text-center text-muted py-3">No Permissions Found</td>
                            </tr>
                    @endforelse
                </table>

            {{-- @if($values->total() > $permissions->perPage())
            <br><br>
            {{$permissions->links()}}
            @endif --}}

        </div>
    </div>

@endsection
