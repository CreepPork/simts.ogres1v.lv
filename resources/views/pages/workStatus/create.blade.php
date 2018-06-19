@extends('layouts.app')

@section('navbar-links')
    <li>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Informācijas panelis</a></li>
            <li class="breadcrumb-item"><a href="/workStatus">Darba statusi</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pievienot statusu</li>
        </ol>
    </li>
@endsection

@section('content')
    <div class="wrapper container">
        <h1 class="text-center">Pievienot statusu</h1>

        <hr>

        @include('inc.messages')

        <form action="/workStatus" method="post">
            @csrf

            <div class="form-group required">
                <label for="status">Statuss</label>
                <input type="text" name="status" id="status" class="form-control" required autofocus placeholder="Statuss">
            </div>

            @include('inc.required')

            <div class="form-group">
                <input type="submit" value="Pievienot" class="form-control btn btn-outline-primary">
            </div>
        </form>
    </div>
@endsection
