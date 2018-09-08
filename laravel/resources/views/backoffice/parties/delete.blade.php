@extends('layouts.backofficeapp')
@section('buttons')
    <a class="waves-effect waves-light btn-large headerbutton" id="deletepartie">Ja</a>
    <a class="waves-effect waves-light btn-large headerbutton" href="{{ route('admin.partijen') }}">Neen</a>
@endsection
@section('pagetitle')
    <h1>Verwijderen Partij</h1>
@endsection
@section('backbutton')
    <a href="{{ redirect()->back()->getTargetUrl() }}" class="btn-floating btn-large waves-effect waves-light red backbutt" title="Terug"><i class="material-icons">play_arrow</i></a>
@endsection
@section('search')

@endsection
@section('content')
    <form method="post" action="{{ route('admin.partijen.verwijder',['id' => $partie->id]) }} " id="deletepartieform" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="container">
            <div class="row">
                <div class="input-field col-md-8 col-md-offset-2">
                    <div >
                        <blockquote><h4>Ben je zeker dat je <span class="red-text">{{ $partie->name }}</span> wilt verwijderen inclusief met de kandidaten?</h4></blockquote>
                    </div>
                </div>
            </div>
        </div>
    </form>


    @if($errors->all())
        <div class="row">
            <div class="input-field col-md-8 col-md-offset-2">
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
