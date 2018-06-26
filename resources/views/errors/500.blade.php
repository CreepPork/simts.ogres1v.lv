@extends('layouts.app')

@section('title', 'Iekšēja servera kļūda')

@section('navbar-links')
    <li class="breadcrumb-item" aria-current="page"><a href="/">Sākums</a></li>
    <li class="breadcrumb-item active" aria-current="page">Iekšēja servera kļūda</li>
@endsection

@section('content')
    <div class="wrapper container text-center">
        <i class="fas fa-exclamation-circle fa-4x text-primary mb-3"></i>

        <h2>500</h2>

        <h4 class="text-muted">Iekšēja servera kļūda - mēģiniet vēlreiz vēlāk.</h4>

        <p class="text-muted">{{ $exception->getMessage() }}</p>
    </div>
@endsection
