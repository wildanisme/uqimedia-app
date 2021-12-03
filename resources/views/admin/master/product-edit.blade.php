@extends('layouts.admin')
@section('title')
    {{ $web['site'] }} | {{ $web['page'] }}
@endsection
@section('content')

<div class="card">
    <div class="card-header">{{ __('Edit Produk') }}</div>

    <div class="card-body">
        <form method="POST" action="{{ route('admin.product.update', $product->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <label for="nama_product" class="col-md-4 col-form-label text-md-right">{{ __('Nama Produk') }}</label>
                <div class="col-md-6">
                    <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama', $product->nama) }}" autocomplete="nama">
                    @error('nama')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="satuan" class="col-md-4 col-form-label text-md-right">{{ __('Satuan') }}</label>
                <div class="col-md-6">
                    <select name="satuan" id="satuan" class="form-control @error('satuan') is-invalid @enderror">
                        @foreach ($satuan as $value)
                        <option value="{{ $value->id }}" {{ old('satuan', $product->nama) ? 'selected' : '' }}>{{ $value->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="harga" class="col-md-4 col-form-label text-md-right">{{ __('Harga') }}</label>
                <div class="col-md-6">
                    <input id="harga" type="number" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{ old('harga', $product->harga) }}" autocomplete="harga">
                    @error('harga')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Submit') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
@section('scripts')
<script>

</script>
@endsection