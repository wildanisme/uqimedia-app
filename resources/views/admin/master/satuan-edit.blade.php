@extends('layouts.admin')

@section('content')

    <div class="card">
        <div class="card-header">{{ __('Edit Satuan') }}</div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.satuan.update', $satuan->id) }}">
                @csrf
                @method('PUT')

                <div class="form-group row">
                    <label for="nama" class="required col-md-4 col-form-label text-md-right">{{ __('Satuan') }}</label>

                    <div class="col-md-6">
                        <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama', $satuan->nama) }}" required autocomplete="nama" >

                        @error('nama')
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

@endsection
