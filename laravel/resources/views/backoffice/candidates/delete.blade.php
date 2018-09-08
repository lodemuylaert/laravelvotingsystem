@extends('layouts.backofficeapp')
@section('buttons')
    <a class="waves-effect waves-light btn-large headerbutton" id="deletecandidate">Ja</a>
    <a class="waves-effect waves-light btn-large headerbutton" href="{{ route('admin.partijen') }}">Neen</a>
@endsection
@section('pagetitle')
    <h1>Verwijderen kandidaat</h1>
@endsection
@section('backbutton')
    <a href="{{ redirect()->back()->getTargetUrl() }}" class="btn-floating btn-large waves-effect waves-light red backbutt" title="Terug"><i class="material-icons">play_arrow</i></a>
@endsection
@section('search')

@endsection
@section('content')
    <form method="post" action="{{ route('admin.kandidaten.verwijder',['id' => $candidate->id]) }} " id="deletecandidateform" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div >
                        <blockquote><h4>Ben je zeker dat je <span class="red-text ">{{ $candidate->name }}</span> wilt verwijderen ?</h4></blockquote>
                    </div>
                </div>
            </div>
        </div>
    </form>


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
