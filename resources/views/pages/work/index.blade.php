@extends('layouts.app')

@section('content')
    <div class="container wrapper">
        <h1 class="text-center">100 labie darbi</h1>

        <hr>

        @foreach ($statuses as $status)
            <h5 class="text-center">{{ $status->status }}</h5>

            <table class="table table-hover table-clickable table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="w-75">Nosaukums</th>
                        <th>Skolotājs</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($status->works as $work)
                        <tr>
                            <td>{{ $work->title }}</td>
                            <td>{{ $work->teacher->fullName() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <hr>
        @endforeach

    </div>
@endsection
