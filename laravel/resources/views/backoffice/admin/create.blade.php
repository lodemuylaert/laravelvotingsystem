@extends('layouts.backofficeapp')
@section('buttons')
    <button id="savenewadmin" class="waves-effect waves-light btn-large headerbutton"><i class="material-icons buttonheadericon">done</i>Opslaan</button>
@endsection
@section('pagetitle')
    <h1>Administrator toevoegen</h1>
@endsection
@section('backbutton')
    <a href="{{ redirect()->back()->getTargetUrl() }}" class="btn-floating btn-large waves-effect waves-light red backbutt" title="Terug"><i class="material-icons">play_arrow</i></a>
@endsection
@section('content')
    <form method="post" action="{{ route('admin.administrator.opslaan')}}" id="savenewadminform">
        {{ csrf_field() }}
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 input-field">
                    <label class="labelform" for="administratornaam" >Naam</label>
                    <input  type="text" name="administratornaam" id="administratornaam"></input>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2 input-field textareamargin">
                    <label class="labelform" for="administratoremail">E-mail</label>
                    <input type="text" name="administratoremail" id="administratoremail"></input>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2 input-field textareamargin">
                    <label class="labelform" for="administratorwachtwoord">Wachtwoord</label>
                    <input type="text" name="administratorwachtwoord" id="administratorwachtwoord"></input>
                </div>
            </div>
            @if(Auth::user()->superadmin)
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 input-field textareamargin">
                        <div>
                            <label class="labelform relative" for="administsuperadmin">SuperAdmin</label>
                        </div>
                        <p>
                            <input name="superadmin" value="1" type="radio" id="ja" />
                            <label for="ja">Ja</label>
                        </p>
                        <p>
                            <input name="superadmin" value="0" type="radio" id="neen" />
                            <label for="neen">Neen</label>
                        </p>

                    </div>

                </div>
            @endif



        @if($errors->all())
                <div class="row">
                    <div class="input-field col-md-offset-2">
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

    </form>

@endsection
