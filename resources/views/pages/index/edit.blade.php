@extends('layouts.app')

@section('title', 'Rediģēt ' . $index->section_title)

@section('navbar-links')
    <li>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Informācijas panelis</a></li>
            <li class="breadcrumb-item"><a href="/index">Rediģēt lapas saturu</a></li>
            <li class="breadcrumb-item active" aria-current="page">Rediģēt {{ $index->section_title }}</li>
        </ol>
    </li>
@endsection

@section('content')
    <div class="wrapper container">
        <h1 class="text-center">Rediģēt {{ $index->section_title }}</h1>

        <hr>

        @include('inc.messages')

        <form action="/index/{{ $index->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="form-group required">
                <label for="section">Sekcija</label>
                <input type="text" name="section" id="section" class="form-control" value="{{ $index->section }}" required autofocus placeholder="Sekcija">
            </div>

            <div class="form-group required">
                <label for="section_title">Sekcijas virsraksts</label>
                <input type="text" name="section_title" id="section_title" value="{{ $index->section_title }}" required placeholder="Sekcijas virsraksts" class="form-control">
            </div>

            <div class="form-group">
                <label for="title">Apakšvirsraksts</label>
                <input type="text" name="title" id="title" value="{{ $index->title }}" placeholder="Apakšvirsraksts" class="form-control">
            </div>

            <div class="form-group">
                <label for="body">Apraksts</label>
                <textarea name="body" id="body" cols="30" rows="10" placeholder="Apraksts" class="form-control">{{ $index->body }}</textarea>
            </div>

            @if ($index->image == null)
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" accept="image/*" name="image" id="image" class="custom-file-label">
                        <label for="image" class="custom-file-label">Pievienot attēlu</label>
                    </div>

                    <small class="form-text text-muted">Maksimums 10MB.</small>
                </div>
            @else
                <div class="form-group">
                    <label for="image">Pievienotais attēls</label><br>
                    <a class="btn btn-outline-secondary mb-2" target="_blank" href="{{ $imageURL }}">Skatīt attēlu</a><br>
                    <a href="#" id="imageDestroyButton" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i> Dzēst pievienoto attēlu</a>
                </div>
            @endif

            @if ($index->file == null)
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" name="file" id="file" class="custom-file-label">
                        <label for="file" class="custom-file-label">Pievienot failu</label>
                    </div>

                    <small class="form-text text-muted">Maksimums 10MB.</small>
                </div>
            @else
                <div class="form-group">
                    <label for="file">Pievienotais fails</label><br>
                    <a class="btn btn-outline-secondary mb-2" target="_blank" href="{{ $fileURL }}">Skatīt failu</a><br>
                    <a href="#" id="fileDestroyButton" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i> Dzēst pievienoto failu</a>
                </div>
            @endif

            @include('inc.required')

            <div class="form-group">
                <input type="submit" value="Saglabāt" class="btn btn-outline-primary form-control">
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script defer src="{{ asset('js/pages/indexAdmin.js') }}"></script>
@endsection
