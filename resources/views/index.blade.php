@extends('layouts.app')

{{-- Remove padding-top from main --}}
@section('styling-main', 'pb-4')

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

<div tabindex="-1" class="container mb-5">
    <h1 id="greatWorks" class="text-center">100 labie darbi</h1>

    <hr>

    {{-- Tables --}}
    <div class="row">

        <div class="col-lg-8">
            <h3 class="text-center">Paveiktie darbi</h3>

            <table class="table table-bordered table-striped table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>Darbs</th>
                        <th>Skolotājs</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>Darbs 1</td>
                        <td>Skolotājs 1</td>
                    </tr>
                    <tr>
                        <td>Darbs 2</td>
                        <td>Skolotājs 2</td>
                    </tr>
                    <tr>
                        <td>Darbs 3</td>
                        <td>Skolotājs 3</td>
                    </tr>
                    <tr>
                        <td>Darbs 4</td>
                        <td>Skolotājs 4</td>
                    </tr>
                    <tr>
                        <td>Darbs 5</td>
                        <td>Skolotājs 5</td>
                    </tr>
                    <tr>
                        <td>Darbs 6</td>
                        <td>Skolotājs 6</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="col-lg-4 no-padding-left">
            <h3 class="text-center">Pašreizējie darbi</h3>

            <table class="table table-bordered table-striped table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>Darbs</th>
                        <th>Skolotājs</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>Darbs 1</td>
                        <td>Skolotājs 1</td>
                    </tr>
                    <tr>
                        <td>Darbs 2</td>
                        <td>Skolotājs 2</td>
                    </tr>
                    <tr>
                        <td>Darbs 3</td>
                        <td>Skolotājs 3</td>
                    </tr>
                </tbody>
            </table>

            <table class="table table-bordered table-striped table-hover">
                <h3 class="text-center">Plānotie darbi</h3>

                <thead class="table-primary">
                    <tr>
                        <th>Darbs</th>
                        <th>Skolotājs</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>Darbs 1</td>
                        <td>Skolotājs 1</td>
                    </tr>
                    <tr>
                        <td>Darbs 2</td>
                        <td>Skolotājs 2</td>
                    </tr>
                    <tr>
                        <td>Darbs 3</td>
                        <td>Skolotājs 3</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    {{-- Buttons --}}
    <div class="row">
        <div class="col">
            <button class="btn btn-outline-primary">Prezentācija</button>
        </div>

        <div class="col text-right">
            <button class="btn btn-outline-primary">Nolikums</button>
        </div>
    </div>
</div>

<div tabindex="-1" class="container">
    <h1 id="events" class="text-center">Pasākumi</h1>

    <hr>

    <div class="row mb-5">
        <div class="col-lg-8">
            <a href="{{ asset('images/placeholder.gif') }}" data-lightbox="image-1">
                <img src="{{ asset('images/placeholder.gif') }}" style="width: 100%" class="mb-3" alt="placeholder">
            </a>

            <h2>Tuvākais pasākums</h2>

            <h4>Pasākums 1</h4>

            <h4 class="text-muted">20. jūnijs 2018</h4>

            <button class="btn btn-lg btn-outline-primary">Skatīt</button>
        </div>

        <div class="col-lg-4">
            <div id="calendar"></div>
        </div>
    </div>
</div>

<div tabindex="-1" class="container">
    <h1 id="getInvolved" class="text-center">Iesaisties!</h1>

    <hr>

    <div class="row">
        <div class="col-lg-8">
            <a href="{{ asset('images/placeholder.gif') }}" data-lightbox="image-2">
                <img src="{{ asset('images/placeholder.gif') }}" style="width: 100%" alt="placeholder">
            </a>
        </div>

        <div class="col-lg-4">
            <h2 class="text-center">Vidusskolai vajag tevi!</h2>

            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ornare elementum neque eu eleifend. Duis in condimentum justo, id vestibulum lorem. Curabitur efficitur velit nunc, ac congue leo tincidunt molestie. Donec tempus eros id ipsum interdum ornare. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam convallis sapien ipsum, at ultricies libero dapibus id. Proin eget tellus non mauris dapibus scelerisque. Nunc eu quam tempor, luctus dolor in, venenatis erat. Suspendisse justo leo, laoreet in accumsan a, accumsan id ex.
            </p>

            <div class="d-flex justify-content-space-evenly align-items-end temp-padding">
                <button class="btn btn-outline-primary">Dāvināt</button>
                <button class="btn btn-outline-primary">Ieteikt</button>
                <button class="btn btn-outline-primary">Ziedot</button>
            </div>
        </div>
    </div>
</div>

@endsection
