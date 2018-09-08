@extends('layouts.backofficeapp')
@section('buttons')
    <button id="savenewvoter" class="waves-effect waves-light btn-large headerbutton"><i class="material-icons buttonheadericon">done</i>Opslaan</button>
@endsection
@section('backbutton')
    <a href="{{ redirect()->back()->getTargetUrl() }}" class="btn-floating btn-large waves-effect waves-light red backbutt" title="Terug"><i class="material-icons">play_arrow</i></a>
@endsection
@section('pagetitle')
    <h1>Nieuwe stemmer</h1>
@endsection
@section('content')
    <div class="container">
        <form method="POST" action="{{ route('admin.stemmers.nieuw') }} " id="savenewvoterform" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="row">
                <div class="input-field col m8 offset-m2">
                    <div >
                        <input  id="first_name" name="naam" type="text" class="validate">
                        <label class="labelform" for="first_name">Naam stemmer</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="input-field col m8 offset-m2">
                    <div>
                        <input id="email" name="email" type="text" class="validate" >
                        <label class="labelform" for="email">E-mail</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="input-field col m8 offset-m2">
                    <div>
                        <input id="rijksregister" name="rijksregister" type="text" class="validate" >
                        <label class="labelform" for="rijksregister">Rijksregister nummer</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="input-field col m8 offset-m2">
                    <div>
                        <label class="labelform noabs">Geboortedatum</label>
                        <input id="geboortedatum" name="geboortedatum" type="date" class="datepicker validate" >
                    </div>
                </div>
            </div>

        </form>

        @if($errors->all())
            <div class="row">
                <div class="input-field col m8 offset-m2">
                    <div class="card-panel red">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
