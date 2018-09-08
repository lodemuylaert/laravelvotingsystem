@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="jumbotron">
            <div class="page-header ">
                <h1 class="pagetitle text-center" >Verloop stemming</h1>
            </div>
            <p class="text-center pagesubtitle">Er hebben reeds <span class="badge fontinherit">{{ $voted }}</span> personen van de <span class="badge fontinherit">{{ $election->maxvoters }}</span> gestemd voor de {{ $election->name }} </p>

        </div>


    </div>
@endsection
