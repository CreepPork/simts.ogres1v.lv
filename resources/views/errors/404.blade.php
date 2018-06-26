@extends('layouts.app')

@section('navbar-links')
    <li class="breadcrumb-item" aria-current="page"><a href="/">Sākums</a></li>
    <li class="breadcrumb-item active" aria-current="page">Lapa nav atrasta</li>
@endsection

@section('title', 'Lapa netika atrasta')

@section('content')
    <div class="wrapper container text-center">
        <i class="fas fa-exclamation-circle fa-4x text-primary mb-3"></i>

        <h2>404</h2>

        <h4 class="text-muted">Lapa ko meklējāt netika atrasta.</h4>
    </div>
@endsection
