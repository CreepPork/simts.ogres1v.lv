@extends('layouts.app')

@section('navbar-links')
    <li>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Informācijas panelis</a></li>
            <li class="breadcrumb-item"><a href="/gift">Dāvināt</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pievienot aprakstu</li>
        </ol>
    </li>
@endsection

@section('content')
    <div class="wrapper container">
        <h1 class="text-center">Pievienot aprakstu</h1>

        <hr>

        @include('inc.messages')

        <form action="/gift" method="post">
            @csrf

            <div class="form-group required">
                <label for="title">Nosaukums</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Nosaukums" required autofocus>
            </div>

            <div class="form-group required">
                <label for="body">Apraksts</label>
                <textarea name="body" id="body" cols="30" rows="10" class="form-control" placeholder="Apraksts" required></textarea>
            </div>

            @include('inc.required')

            <div class="form-group">
                <input type="submit" value="Pievienot" class="btn btn-outline-primary form-control">
            </div>
        </form>
    </div>
@endsection
