@extends('layouts.admin')
@section('title')
    {{ $web['site'] }} | {{ $web['page'] }}
@endsection
@section('content')

    <div class="card">
        <div class="card-header">{{ __('Add New Pelanggan') }}</div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.pelanggan.store') }}">
                @csrf
                <div class="form-group row">
                    <label for="nama_pelanggan" class="col-md-4 col-form-label text-md-right">{{ __('Nama Pelanggan') }}</label>
                    <div class="col-md-6">
                        <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" autocomplete="nama" >
                        @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>
                    <div class="col-md-6">
                        <textarea class="form-control" name="alamat" id="" cols="30" rows="3"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="no_telp" class="col-md-4 col-form-label text-md-right">{{ __('No Telepon') }}</label>
                    <div class="col-md-6">
                        <input id="no_telp" type="text" class="form-control @error('no_telp') is-invalid @enderror" name="no_telp" value="{{ old('no_telp') }}" autocomplete="no_telp" >
                        @error('no_telp')
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

@endsection
