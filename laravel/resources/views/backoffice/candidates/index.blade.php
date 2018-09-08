@extends('layouts.backofficeapp')
@section('buttons')
    <a class="waves-effect waves-light btn-large headerbutton" id="savenecandidate"><i class="material-icons buttonheadericon">done</i>Opslaan</a>
@endsection
@section('pagetitle')
    <h1>Kandidaat toevoegen</h1>
@endsection
@section('backbutton')
    <a href="{{ redirect()->back()->getTargetUrl() }}" class="btn-floating btn-large waves-effect waves-light red backbutt" title="Terug"><i class="material-icons">play_arrow</i></a>
@endsection
@section('content')
    <form method="post" action="{{ route('admin.kandidaten.nieuw')}}" id="savenecandidateform">
        {{ csrf_field() }}
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 ">
                    <label class="labelform" >Partij</label>
                    <select style="display: inherit;" name="partijnaam">
                        <option value="{{ $partij ? $partij->id : '' }}" selected>{{ $partij ? $partij->name : '' }}</option>
                        @foreach($partijen as $partijen)
                            <option value="{{ $partijen->id }}">{{ $partijen->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2 input-field textareamargin">
                    <label class="labelform" for="kandidaatnaam">Kandidaat</label>
                    <input type="text" name="kandidaatnaam" id="kandidaatnaam"></input>
                </div>
            </div>

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
