@extends('layouts.admin')

@section('content')

    <div class="card">
        <div class="card-header">{{ __('Dashboard') }}</div>

        <div class="card-body">

            {{ Auth::user()->name }}
            {{ __('You are logged in!') }}
        </div>
    </div>

@endsection
