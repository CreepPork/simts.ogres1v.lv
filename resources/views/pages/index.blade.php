@extends('layouts.app')

{{-- Remove padding from main --}}
@section('styling-main', '')

@section('navbar-links')
    <li><a href="#app" class="nav-link active">Sākums</a></li>
    <li><a href="#greatWorks" class="nav-link">Labie Darbi</a></li>
    <li><a href="#events" class="nav-link">Pasākumi</a></li>
    <li><a href="#getInvolved" class="nav-link">Iesaisties!</a></li>
@endsection

@section('content')

<div class="parallax">
    <div class="parallax-container card">
        <div class="card-body text-center">
            <div class="row">
                <div class="col-xs-4 col-md-12">
                    <h4>Ogres 1. vidusskolas projekts</h4>
                </div>

                <div class="col-xs-4 col-md-12">
                    <h2>100 labie darbi</h2>
                </div>

                <div class="col-xs-4 col-md-12">
                    <div class="card-buttons">
                        <a href="#getInvolved" class="ml-4 btn btn-primary">Iesaistīties</a>
                        <a href="#greatWorks" class="mr-4 btn btn-outline-secondary">Uzzināt vairāk</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container wrapper wrapper-index">
    {{-- Section - 100 Great Works --}}
    <section tabindex="-1" class="container mb-5">
        <h1 id="greatWorks" class="text-center">100 labie darbi</h1>

        <hr>

        {{-- Tables --}}
        <div class="row">
            @if (count($completedWorks->works) > 0 || count($currentWorks->works) > 0 || count($plannedWorks->works) > 0)
                <div class="col-lg-7">
                    <h3 class="text-center">{{ $completedWorks->status ?? 'Pabeigtie darbi' }}</h3>

                    {{-- Completed works --}}
                    <table class="table table-bordered table-striped table-hover table-clickable">
                        <thead class="table-primary">
                            <tr>
                                <th>Darbs</th>
                                <th>Skolotājs</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($completedWorks->works ?? [] as $work)
                                <tr>
                                    <td>{{ $work->title }}</td>
                                    <td>{{ $work->teacher->fullName() }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="col-lg-5 no-padding-left">
                    <h3 class="text-center">{{ $currentWorks->status ?? 'Pašreizējie darbi' }}</h3>

                    {{-- Current works --}}
                    <div class="great-works-limit">
                        <table class="table table-bordered table-striped table-hover table-clickable">
                            <thead class="table-primary">
                                <tr>
                                    <th>Darbs</th>
                                    <th>Skolotājs</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($currentWorks->works ?? [] as $work)
                                    <tr>
                                        <td>{{ $work->title }}</td>
                                        <td>{{ $work->teacher->fullName() }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- Planned works --}}
                    <div class="great-works-limit">
                        <table class="table table-bordered table-striped table-hover table-clickable">
                            <h3 class="text-center">{{ $plannedWorks->status ?? 'Plānotie darbi' }}</h3>

                            <thead class="table-primary">
                                <tr>
                                    <th>Darbs</th>
                                    <th>Skolotājs</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($currentWorks->works ?? [] as $work)
                                    <tr>
                                        <td>{{ $work->title }}</td>
                                        <td>{{ $work->teacher->fullName() }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <div class="col">
                    <div class="alert alert-warning"><b>Sistēmā nav pievienoti 100 labie darbi.</b></div>
                </div>
            @endif
        </div>

        {{-- Buttons --}}
        <div class="row">
            <div class="col-md-9">
                <a href="/work" class="btn btn-outline-primary">Skatīt visus</a>
            </div>

            <div class="col-lg-3 great-works-buttons">
                <button class="btn btn-outline-primary">Prezentācija</button>
                <button class="btn btn-outline-primary">Nolikums</button>
            </div>
        </div>
    </section>

    {{-- Section - Events --}}
    <section tabindex="-1" class="container">
        <h1 id="events" class="text-center">Pasākumi</h1>

        <hr>

        <div class="row mb-5">
            <div class="col-lg">
                @if (count($events) > 0)
                    <div id="eventCarousel" class="carousel slide mb-3" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @foreach ($events as $event)
                                <li data-target="#eventCarousel" data-slide-to="{{ $event->id }}" class="{{ $loop->first ? 'active' : ''}}"></li>
                            @endforeach
                        </ol>

                        <div class="carousel-inner">
                            @foreach ($events as $event)
                                <div data-id="{{ $event->id }}" class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                    <img class="d-block w-100" src="{{ asset($event->image) }}" alt="{{ $event->title }}">

                                    <div class="carousel-caption d-none d-md-block">
                                        <h3 class="event-title">{{ $event->title }}</h3>
                                        <p class="event-summary">{{ $event->summary }}</p>
                                        <input type="hidden" value="{{ $event->event_at->formatLocalized('%e. %B %Y %H:%M') }}" class="event-date">
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <a class="carousel-control-prev" data-href-disable="true" href="#eventCarousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>

                            <span class="sr-only">Previous</span>
                        </a>

                        <a class="carousel-control-next" data-href-disable="true" href="#eventCarousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>

                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                    <h2 id="event-title">{{ $events[0]->title }}</h2>

                    <h5 id="event-summary">{{ $events[0]->summary }}</h5>

                    <h5 id="event-date" class="text-muted">{{ $events[0]->event_at->formatLocalized('%e. %B %Y %H:%M') }}</h5>

                    <a id="event-view" href="/event/{{ $events[0]->id }}" class="btn btn-outline-primary">Skatīt</a>
                @else
                    <div class="alert alert-warning"><b>Sistēmā nav pievienoti pasākumi!</b></div>
                @endif
            </div>
        </div>
    </section>

    {{-- Section - Involvement --}}
    <section tabindex="-1" class="container pb-3">
        <h1 id="getInvolved" class="text-center">{{ $involve->section_title ?? 'Iesaisties!' }}</h1>

        <hr>

        <div class="row d-flex">
            @if (isset($involve->image))
                <div class="col-lg-8 d-flex">
                    <a href="{{ isset($involve) ? asset($involve->image) : '' }}" data-lightbox="image-2">
                        <img src="{{ isset($involve) ? asset($involve->image) : '' }}" class="img-fluid img-thumbnail" alt="Iesaisties!">
                    </a>
                </div>
            @endif

            <div class="{{ isset($involve->image) ? 'col-lg-4' : 'col' }} d-flex flex-wrap align-content-between">
                <div> {{-- Wrapper div to keep the text together with the title so there isn't a big gap between title and text --}}
                    <h2 class="pt-2">{{ $involve->title ?? 'Vidusskolai vajag tevi!' }}</h2>

                    @if (isset($involve->body))
                        <p>
                            {{ $involve->body }}
                        </p>
                    @else
                        <div class="alert alert-warning"><b>Sistēmā nav pievienots apraksts par iesaistīšanos!</b></div>
                    @endif
                </div>

                <div class="d-flex flex-grow justify-content-between">
                    <a href="/gift" class="btn btn-outline-primary">Dāvināt</a>
                    <a href="/recommend/create" class="btn btn-outline-primary">Ieteikt</a>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

@section('scripts')
    <script defer src="{{ asset('js/pages/index.js') }}"></script>
@endsection
