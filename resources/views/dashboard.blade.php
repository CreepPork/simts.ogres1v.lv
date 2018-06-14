@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="/recommend" class="btn btn-outline-primary">Ieteikumi</a>
                    <a href="/work" class="btn btn-outline-primary">Darbi</a>
                    <a href="/edit" class="btn btn-outline-primary">Rediģēt galvenās lapas saturu</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
