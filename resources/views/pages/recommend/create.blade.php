@extends('layouts.app')

@section('navbar-links')
    <li>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Sākums</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ieteikt</li>
        </ol>
    </li>
@endsection

@section('content')
    <div class="container wrapper">
        <h1 class="text-center">Ieteikt</h1>

        <hr>

        @include('inc.messages')

        <form action="/recommend" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group required">
                <label for="title">Nosaukums</label>
                <input type="text" name="title" id="title" required autofocus placeholder="Nosaukums" class="form-control">
            </div>

            <div class="form-group required">
                <label for="body">Apraksts</label>
                <textarea name="body" id="body" cols="30" rows="10" required class="form-control" placeholder="Apraksts"></textarea>
            </div>

            <div class="form-group">
                <div class="custom-file">
                    <input type="file" name="attachment" id="attachment" class="custom-file-label">
                    <label for="attachment" class="custom-file-label">Pievienot failu</label>
                </div>

                <small class="form-text text-muted">Maksimums 2MB.</small>
            </div>

            <div class="row align-items-center">
                <div class="col-sm">
                    <div class="form-group">
                        <label for="email">E-pasts</label>
                        <input type="email" name="email" id="email" required class="form-control" placeholder="E-pasts">
                    </div>
                </div>

                <div class="col-sm-1 text-center">
                    <p class="text-muted">vai</p>
                </div>

                <div class="col-sm">
                    <div class="form-group">
                        <label for="telephone">Telefona numurs</label>
                        <input type="tel" name="telephone" id="telephone" required class="form-control" placeholder="Telefona numurs">
                    </div>
                </div>
            </div>

            <div class="form-group text-center">
                <p class="form-text text-muted">Lai mēs varētu ar jums sazināties vajadzības gadījumā.</p>
            </div>

            <div class="form-group">
                <div class="g-recaptcha" data-sitekey="6LeTu14UAAAAAAMYv2gT3ymIdYYlN5N0re5MydiN"></div>
            </div>

            <div class="form-group required-show">
                <p class="form-text text-muted"><span>*</span> - obligāti aizpildāmie lauki.</p>
            </div>

            <div class="form-group">
                <input type="submit" value="Nosūtīt" class="btn btn-outline-primary form-control">
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script defer src="{{ asset('js/pages/recommend.js') }}"></script>
    <script defer src='https://www.google.com/recaptcha/api.js'></script>
@endsection
