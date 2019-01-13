@extends('layouts.app')

@section('title', 'Pievienot darbu')

@section('navbar-links')
    <li>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Informācijas panelis</a></li>
            <li class="breadcrumb-item"><a href="/work">100 labie darbi</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pievienot darbu</li>
        </ol>
    </li>
@endsection

@section('content')
    <div class="container wrapper">
        <h1 class="text-center">Pievienot darbu</h1>

        <hr>

        @include('inc.messages')

        <form action="/work" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group required">
                <label for="title">Nosaukums</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" placeholder="Nosaukums" class="form-control" required autofocus>
            </div>

            <div class="form-group required">
                <label for="body">Apraksts</label>
                <textarea name="body" id="body" cols="30" rows="10" required class="form-control" placeholder="Apraksts">{{ old('body') }}</textarea>
            </div>

            <div class="form-group required">
                <label for="teacher">Vadītājs</label>
                <select name="teacher_id" class="form-control" required id="teacher">
                    @foreach ($teachers as $teacher)
                        <option {{ $teacher->id == old('teacher_id') ? 'selected' : '' }} value="{{ $teacher->id }}">{{ $teacher->fullName() }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group required">
                <label for="work_status">Darba statuss</label>
                <select name="work_status_id" id="work_status" required class="form-control">
                    @foreach ($workStatuses as $status)
                        <option {{ $status->id == old('work_status_id') ? 'selected' : '' }} value="{{ $status->id }}">{{ $status->status }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="completed_at">Plānotais pabeigšanas datums</label>
                <input type="date" class="form-control" value="{{ old('completed_at') }}" placeholder="Pabeigšanas datums" name="completed_at" id="completed_at">
            </div>

            <div class="form-group">
                <div class="custom-file">
                    <input type="file" accept="image/*" name="image" id="image" class="custom-file-label">
                    <label for="image" class="custom-file-label">Pievienot attēlu</label>
                </div>

                <small class="form-text text-muted">Maksimums 5MB.</small>
            </div>

            @include('inc.required')

            <div class="form-group">
                <input type="submit" value="Pievienot" class="btn btn-outline-primary form-control">
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script defer src="{{ asset('js/pages/work.js') }}"></script>
@endsection
