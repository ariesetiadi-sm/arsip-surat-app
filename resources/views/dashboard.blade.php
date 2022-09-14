@extends('layout.template')

@section('content')
    @if (session('welcome'))
        <div class="alert alert-success" role="alert">
            {{ session('welcome') }}
        </div>
    @endif

    {{-- Dashboard Content --}}
    <h1>Dashboard</h1>
@endsection
