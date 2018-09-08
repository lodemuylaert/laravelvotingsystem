@extends('layouts.backofficeapp')
@section('buttons')
    <a class="waves-effect waves-light btn-large headerbutton" id="editpartie"><i class="material-icons buttonheadericon">done</i>Opslaan</a>
@endsection
@section('pagetitle')
    <h1>Wijzigen partij</h1>
@endsection
@section('backbutton')
    <a href="{{ redirect()->back()->getTargetUrl() }}" class="btn-floating btn-large waves-effect waves-light red backbutt" title="Terug"><i class="material-icons">play_arrow</i></a>
@endsection
@section('search')

@endsection
@section('content')
    <div class="container">
        <form method="post" action="{{ route('admin.partijen.wijzig',['id' => $partie->id]) }} " id="editpartieform" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col m8">
                    <div class="input-field">
                        <div >
                            <input  id="partiename" name="partiename" type="text" class="validate" value="{{ $partie->name }}">
                            <label class="labelform" for="partiename">Partijnaam</label>
                        </div>
                    </div>
                    <div class="textareamargin input-field">
                        <label class="labelform" for="partiedescription">Partijbeschrijving</label>
                        <textarea id="partiedescription" name="partiedescription" class="materialize-textarea" >{{ $partie->description }}</textarea>

                    </div>
                </div>

                <div class="file-field input-field col m4 center">
                    <div class="file-field input-field ">
                        <img id="output" src="\{{ $partie->imgurl }}" width="200" height="200">
                    </div>
                    <div class="btn initialfloat">
                        <span>Foto Wijzigen</span>
                        <input id="outputbutton" type="file" name="afbeelding" value="" accept="image/png">
                    </div>
                    <div class="file-path-wrapper hidden">
                        <input class="file-path validate" type="text">
                    </div>
                </div>

            </div>

        </form>
    </div>
    @if($errors->all())
        <div class="row">
            <div class="input-field col s5 offset-s2">
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
@endsection
