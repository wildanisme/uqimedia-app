@extends('layouts.admin')
@section('title')
    {{ $web['site'] }} | {{ $web['page'] }}
@endsection
@section('content')

    <div class="card">
        <div class="card-header">{{ __('Pelanggan List') }}</div>

        <div class="card-body">
            @can('pelanggan_create')
            <a href="{{ route('admin.pelanggan.create') }}" class="btn btn-primary">Add New Pelanggan</a>
            @endcan

            <br /><br />
                <table class="table table-borderless table-hover">
                  <tr class="bg-info text-light">
                      <th class="text-center">ID</th>
                      <th>Nama Pelanggan</th>
                      <th>Alamat</th>
                      <th>No Telepon</th>
                      <th>
                          &nbsp;
                      </th>
                  </tr>
                    @forelse ($pelanggan as $value)
                        <tr>
                            <td class="text-center">{{$value->id}}</td>
                            <td>{{$value->nama}}</td>
                            <td>{{$value->alamat}}</td>
                            <td>{{$value->no_telp}}</td>
                            <td>
                                @can('pelanggan_edit')
                                    <a href="{{ route('admin.pelanggan.edit', $value->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                @endcan
                                @can('pelanggan_delete')
                                <form action="{{ route('admin.pelanggan.destroy', $value->id) }}" class="d-inline-block" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="100%" class="text-center text-muted py-3">Tidak Ada Data Pelanggan</td>
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
