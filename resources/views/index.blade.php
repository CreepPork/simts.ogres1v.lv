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

<div class="container mb-5">
    <h1 id="greatWorks" class="text-center">100 labie darbi</h1>

    <hr>

    {{-- Tables --}}
    <div class="row">

        <div class="col-8">
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

<div class="container">
    <h1 id="events" class="text-center">Pasākumi</h1>

    <hr>

    <div class="row">
        <div class="col-7">
            <img src="{{ asset('images/placeholder.gif') }}" style="width: 100%" class="mb-3" alt="placeholder">

            <h2>Tuvākais pasākums</h2>

            <h4>Pasākums 1</h4>

            <h4 class="text-muted">20. jūnijs 2018</h4>

            <button class="btn btn-lg btn-primary">Skatīt</button>
        </div>

        <div class="col-5">
            <div class="container calendar">
                <div class="row">
                    <h3 class="text-center">Maijs 2018</h3>
                </div>

                <div class="row">
                    <div class="col">Pr.</div>
                    <div class="col">Ot.</div>
                    <div class="col">Tr.</div>
                    <div class="col">Ce.</div>
                    <div class="col">Pk.</div>
                    <div class="col">Se.</div>
                    <div class="col">Sv.</div>
                </div>

                <div class="row">
                    <div class="col text-muted">29</div>
                    <div class="col text-muted">30</div>
                    <div class="col">1</div>
                    <div class="col">2</div>
                    <div class="col">3</div>
                    <div class="col">4</div>
                    <div class="col">5</div>
                </div>
                
                <div class="row">
                    <div class="col">6</div>
                    <div class="col">7</div>
                    <div class="col">8</div>
                    <div class="col">9</div>
                    <div class="col">10</div>
                    <div class="col">11</div>
                    <div class="col">12</div>
                </div>
                
                <div class="row">
                    <div class="col">13</div>
                    <div class="col">14</div>
                    <div class="col">15</div>
                    <div class="col">16</div>
                    <div class="col">17</div>
                    <div class="col">18</div>
                    <div class="col">19</div>
                </div>
                
                <div class="row">
                    <div class="col">20</div>
                    <div class="col">21</div>
                    <div class="col">22</div>
                    <div class="col">23</div>
                    <div class="col">24</div>
                    <div class="col">25</div>
                    <div class="col">26</div>
                </div>
                
                <div class="row">
                    <div class="col">27</div>
                    <div class="col">28</div>
                    <div class="col">29</div>
                    <div class="col">30</div>
                    <div class="col">31</div>
                    <div class="col"></div>
                    <div class="col"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection