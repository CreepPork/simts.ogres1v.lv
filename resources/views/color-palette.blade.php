@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>Color Palette</h2>

        <hr>

        <h3>Alerts</h3>

        <div class="alert alert-primary" role="alert">
            This is a primary alert—check it out!
        </div>

        <div class="alert alert-secondary" role="alert">
            This is a secondary alert—check it out!
        </div>

        <div class="alert alert-success" role="alert">
            This is a success alert—check it out!
        </div>
        
        <div class="alert alert-danger" role="alert">
            This is a danger alert—check it out!
        </div>
        
        <div class="alert alert-warning" role="alert">
            This is a warning alert—check it out!
        </div>

        <div class="alert alert-info" role="alert">
            This is a info alert—check it out!
        </div>

        {{-- Light should not be used in this project! --}}
        {{-- <div class="alert alert-light" role="alert">
            This is a light alert—check it out!
        </div> --}}

        <div class="alert alert-dark" role="alert">
            This is a dark alert—check it out!
        </div>

        <hr>

        <div class="container">
            <div class="row">
                <h3>Normal Buttons</h3> 
            </div>

            <div class="row">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary">Primary</button>
                    <button type="button" class="btn btn-secondary">Secondary</button>
                    <button type="button" class="btn btn-success">Success</button>
                    <button type="button" class="btn btn-danger">Danger</button>
                    <button type="button" class="btn btn-warning">Warning</button>
                    <button type="button" class="btn btn-info">Info</button>
                    {{-- Light should not be used in this project! --}}
                    {{-- <button type="button" class="btn btn-light">Light</button> --}}
                    <button type="button" class="btn btn-dark">Dark</button>
                </div>
            </div>

            <hr>

            <div class="row">
                <h3>Outline Buttons</h3>
            </div>

            <div class="row">
                <div class="btn-group">
                    <button type="button" class="btn btn-outline-primary">Primary</button>
                    <button type="button" class="btn btn-outline-secondary">Secondary</button>
                    <button type="button" class="btn btn-outline-success">Success</button>
                    <button type="button" class="btn btn-outline-danger">Danger</button>
                    <button type="button" class="btn btn-outline-warning">Warning</button>
                    <button type="button" class="btn btn-outline-info">Info</button>
                    {{-- Light should not be used in this project! --}}
                    {{-- <button type="button" class="btn btn-outline-light">Light</button> --}}
                    <button type="button" class="btn btn-outline-dark">Dark</button>
                </div>
            </div>

            <hr>

            <div class="row">
                <h3>Large Block Buttons</h3>
            </div>

            <div class="row">
                <button type="button" class="btn btn-lg btn-block btn-primary">Primary</button>
                <button type="button" class="btn btn-lg btn-block btn-secondary">Secondary</button>
                <button type="button" class="btn btn-lg btn-block btn-success">Success</button>
                <button type="button" class="btn btn-lg btn-block btn-danger">Danger</button>
                <button type="button" class="btn btn-lg btn-block btn-warning">Warning</button>
                <button type="button" class="btn btn-lg btn-block btn-info">Info</button>
                <button type="button" class="btn btn-lg btn-block btn-dark">Dark</button>
            </div>

            <hr>

            <div class="row">
                <h3>Large Outline Block Buttons</h3>
            </div>

            <div class="row">
                <button type="button" class="btn btn-lg btn-block btn-outline-primary">Primary</button>
                <button type="button" class="btn btn-lg btn-block btn-outline-secondary">Secondary</button>
                <button type="button" class="btn btn-lg btn-block btn-outline-success">Success</button>
                <button type="button" class="btn btn-lg btn-block btn-outline-danger">Danger</button>
                <button type="button" class="btn btn-lg btn-block btn-outline-warning">Warning</button>
                <button type="button" class="btn btn-lg btn-block btn-outline-info">Info</button>
                <button type="button" class="btn btn-lg btn-block btn-outline-dark">Dark</button>
            </div>
        </div>
    </div>
    
@endsection