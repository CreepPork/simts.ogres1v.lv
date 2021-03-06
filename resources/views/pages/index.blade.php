@extends('layouts.app')

@section('title', '100 labie darbi')
@section('description', 'Apskati Ogres 1. vidusskolas projektu "100 labie darbi", kas veicina skolas un Latvijas attīstību saistībā ar Latvijas simtgadi!')

{{-- Remove padding from main --}}
@section('styling-main', '')

@section('navbar-links')
    <li><a href="#app" class="nav-link active">Sākums</a></li>
    <li><a href="#greatWorks" class="nav-link">Labie Darbi</a></li>
    <li><a href="#getInvolved" class="nav-link">Iesaisties!</a></li>
    <li><a href="#events" class="nav-link">Pasākumi</a></li>
@endsection

@section('content')

<input type="hidden" id="parallaxURL" value="{{ $parallaxURL }}">

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
                <div class="{{ count($currentWorks->works) > 0 && count($plannedWorks->works) > 0 ? 'col-lg-6' : 'col' }}">
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
                                <tr data-href="/work/{{ $work->id }}">
                                    <td>{{ $work->title }}</td>
                                    <td>{{ $work->teacher->fullName() }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @if (count($currentWorks->works) > 0 && count($plannedWorks->works) > 0)
                    <div class="col-lg-6 no-padding-left">
                        <h3 class="text-center">{{ $currentWorks->status ?? 'Pašreizējie darbi' }}</h3>

                        {{-- Current works --}}
                        @if (count($currentWorks->works) > 0)
                            <div>
                                <table class="table table-bordered table-striped table-hover table-clickable">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>Darbs</th>
                                            <th>Skolotājs</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($currentWorks->works ?? [] as $work)
                                            <tr data-href="/work/{{ $work->id }}">
                                                <td>{{ $work->title }}</td>
                                                <td>{{ $work->teacher->fullName() }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif

                        {{-- Planned works --}}
                        @if (count($plannedWorks->works) > 0)
                            <div>
                                <table class="table table-bordered table-striped table-hover table-clickable">
                                    <h3 class="text-center">{{ $plannedWorks->status ?? 'Plānotie darbi' }}</h3>

                                    <thead class="table-primary">
                                        <tr>
                                            <th>Darbs</th>
                                            <th>Skolotājs</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($plannedWorks->works ?? [] as $work)
                                            <tr data-href="/work/{{ $work->id }}">
                                                <td>{{ $work->title }}</td>
                                                <td>{{ $work->teacher->fullName() }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                @endif
            @else
                <div class="col">
                    <div class="alert alert-warning"><b>Sistēmā nav pievienoti 100 labie darbi.</b></div>
                </div>
            @endif
        </div>

        {{-- Buttons --}}
        <div class="row">
            <div class="col-sm works-button-left">
                <a href="/work" class="btn btn-outline-primary">Skatīt visus</a>
            </div>

            <div class="col-sm text-center works-button-center">
                <a target="_blank" rel="noopener" href="{{ $workPresentation[1] }}" class="btn btn-outline-primary">{{ optional($workPresentation[0])->section_title ?? 'Nav ievadīts' }}</a>
            </div>

            <div class="col-sm text-right works-button-right">
                <a target="_blank" rel="noopener" href="{{ $workRegulation[1] }}" class="btn btn-outline-primary">{{ optional($workRegulation[0])->section_title ?? 'Nav ievadīts' }}</a>
            </div>
        </div>
    </section>

    {{-- Section - Involvement --}}
    <section tabindex="-1" class="container mb-5">
        <h1 id="getInvolved" class="text-center">{{ $involve->section_title ?? 'Iesaisties!' }}</h1>

        <hr>

        <div class="row d-flex">
            @if (isset($involve->image))
                <div class="col-lg d-flex">
                    <a href="{{ isset($involve) ? asset($involve->image) : '' }}" data-lightbox="image-2">
                        <img src="{{ isset($involve) ? asset($involve->image) : '' }}" class="img-fluid img-thumbnail" alt="Iesaisties!">
                    </a>
                </div>
            @endif

            <div class="{{ isset($involve->image) ? 'col-lg' : 'col' }} d-flex flex-wrap align-content-between">
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

    {{-- Section - Events --}}
    <section tabindex="-1" class="container mb-3">
        <h1 id="events" class="text-center">Pasākumi</h1>

        <hr>

        <div class="row">
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
</div>

@endsection

@section('scripts')
    <script defer src="{{ asset('js/pages/index.js') }}"></script>
@endsection
