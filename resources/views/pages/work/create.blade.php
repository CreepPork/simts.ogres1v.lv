@extends('layouts.app')

@section('navbar-links')
    <li>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Sākums</a></li>
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

        <form action="/work" method="post">
            @csrf

            <div class="form-group">
                <label for="title">Nosaukums</label>
                <input type="text" name="title" id="title" placeholder="Nosaukums" class="form-control" required autofocus>
            </div>

            <div class="form-group">
                <label for="body">Apraksts</label>
                <textarea name="body" id="body" cols="30" rows="10" required class="form-control" placeholder="Apraksts"></textarea>
            </div>

            <div class="form-group">
                <label for="completion">Plānotais pabeigšanas datums</label>
                <input type="date" required class="form-control" placeholder="Pabeigšanas datums" name="completion" id="completion">
            </div>

            <div class="form-group">
                <label for="teacher">Vadītājs</label>
                <select name="teacher_id" class="form-control" required id="teacher">
                    @foreach ($teachers as $teacher)
                        <option value="{{ $teacher->id }}">{{ $teacher->fullName() }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="work_status">Darba statuss</label>
                <select name="work_status_id" id="work_status" required class="form-control">
                    @foreach ($workStatuses as $status)
                        <option value="{{ $status->id }}">{{ $status->status }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <input type="submit" value="Pievienot" class="btn btn-outline-primary form-control">
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script defer src="{{ asset('js/pages/work.js') }}"></script>
@endsection
