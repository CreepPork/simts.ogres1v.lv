@extends('layouts.app')

@section('content')
    <div class="container wrapper">
        <h1 class="text-center">100 labie darbi</h1>

        <hr>

        @if (count($statuses) == 0)
            <div class="alert alert-info">
                Nav pievienoti darbi.
            </div>
        @else
            @foreach ($statuses as $status)
                <div class="py-3">
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
                            <tr data-href="/work/{{ $work->id }}">
                                    <td>{{ $work->title }}</td>
                                    <td>{{ $work->teacher->fullName() }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <hr>
                </div>
            @endforeach
        @endif
    </div>
@endsection
