@extends('layouts.admin')
@section('title')
    {{ $web['site'] }} | {{ $web['page'] }}
@endsection
@section('content')

    <div class="card">
        <div class="card-header">{{ __('Product List') }}</div>

        <div class="card-body">
            @can('product_create')
            <a href="{{ route('admin.product.create') }}" class="btn btn-primary">Add New Product</a>
            @endcan

            <br /><br />
                <table class="table table-borderless table-hover">
                  <tr class="bg-info text-light">
                      <th class="text-center">ID</th>
                      <th>Nama Product</th>
                      <th>Satuan</th>
                      <th>Harga</th>
                      <th>
                          &nbsp;
                      </th>
                  </tr>
                    @forelse ($product as $value)
                        <tr>
                            <td class="text-center">{{$value->id}}</td>
                            <td>{{$value->nama}}</td>
                            <td>{{$value->satuan->nama}}</td>
                            <td>{{$value->harga}}</td>
                            <td>
                                @can('satuan_edit')
                                    <a href="{{ route('admin.product.edit', $value->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                @endcan
                                @can('satuan_delete')
                                <form action="{{ route('admin.product.destroy', $value->id) }}" class="d-inline-block" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="100%" class="text-center text-muted py-3">Tidak Ada Produk</td>
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
