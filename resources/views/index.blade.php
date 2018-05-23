@extends('layouts.app')

{{-- Remove padding-top from main --}}
@section('styling-main', 'pb-4')

@section('content')

<div class="parallax">
    <div class="parallax-container card">
        <div class="card-body text-center">
            <h4>Ogres 1. vidusskolas projekts</h4>
            <h2>100 labie darbi</h2>
            <div class="card-buttons">
                <button class="ml-4 btn btn-primary">Iesaistīties</button>
                <button class="mr-4 btn btn-outline-secondary">Uzzināt vairāk</button>
            </div>
        </div>
    </div>
</div>

<div class="container container-primary">
    <h1 class="text-center">100 labie darbi</h1>

    <hr>

    {{-- Tables --}}
    <div class="row">

        <div class="col-8 no-padding-right">
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

        <div class="col-4 no-padding-left">
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
    
    {{-- @include('inc.lorem') --}}
</div>

@endsection