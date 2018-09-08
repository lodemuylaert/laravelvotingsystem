@extends('layouts.backofficeapp')
@section('buttons')
    <button id="savenewpartie" class="waves-effect waves-light btn-large headerbutton"><i class="material-icons buttonheadericon">done</i>Opslaan</button>
@endsection
@section('pagetitle')
    <h1>Nieuwe partij</h1>
@endsection
@section('backbutton')
    <a href="{{ redirect()->back()->getTargetUrl() }}" class="btn-floating btn-large waves-effect waves-light red backbutt" title="Terug"><i class="material-icons">play_arrow</i></a>
@endsection
@section('content')
    <div class="container">
    <form method="POST" action="{{ route('admin.partijen.nieuw') }} " id="savenewpartieform" enctype="multipart/form-data">

        {{ csrf_field() }}
                <div class="row">
                    <div class="col m8">
                        <div class="input-field ">
                            <div >
                                <label class="labelform" for="first_name">Naam Partij</label>
                                <input  id="first_name" name="partijnaam" type="text" class="validate">
                            </div>
                        </div>
                        <div class="textareamargin input-field">
                            <label class="labelform" for="textarea1">Beschrijving partij</label>
                            <textarea id="textarea1" name="partijbeschrijving" class="materialize-textarea" data-length="350"></textarea>

                        </div>
                    </div>
                    <div class="file-field input-field col m4 center">
                        <div class="file-field input-field ">
                            <img id="outputnew" src="" width="200" height="200">
                        </div>
                        <div class="btn initialfloat">
                            <span>Open foto</span>
                            <input id="outputbuttonnew" type="file" name="afbeelding" accept="image/png">
                        </div>
                        <div class="hidden file-path-wrapper">
                            <input  class="file-path validate " type="text">
                        </div>
                    </div>
                </div>
    </form>
        @if($errors->all())
            <div class="row">
                <div class="input-field col m12">
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
