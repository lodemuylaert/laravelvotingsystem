@extends('layouts.backofficeapp')
@section('buttons')
    <a class="waves-effect waves-light btn-large headerbutton" id="PrintVoter">Print</a>
    <a class="waves-effect waves-light btn-large headerbutton" href="{{ route('admin.stemmers.nieuw') }}">Nieuwe stemer</a>
@endsection
@section('pagetitle')
    <h1>Bevestiging stemmer</h1>
@endsection
@section('search')

@endsection
@section('content')
    <div class="container">

            <div class="row">
                <div class="input-field col s4 offset-s1">
                    <div>
                        <div class="contenttoprint">
                            <h4 class="right confirmlabel">Volledige naam :</h4>
                        </div>
                    </div>
                </div>
                <div class="input-field col s7">
                    <div >
                        <div class="contenttoprint">
                            <h4 class="confirmtext ">{{ $voter->name }}</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s4 offset-s1">
                    <div>
                        <h4 class="right confirmlabel">Email :</h4>
                    </div>
                </div>
                <div class="input-field col s7">
                    <div >
                        <h4 class="confirmtext">{{ $voter->email }}</h4>
                    </div>
                </div>
            </div>
        <div class="contenttoprint">
                <div class="row">
                    <div class="input-field col s4 offset-s1">
                        <div>
                            <div class="contenttoprint">
                                <h4 class="right confirmlabel">Wachtwoord :</h4>
                            </div>
                        </div>
                    </div>
                    <div class="input-field col s7">
                        <div >
                            <div class="contenttoprint">
                                <h4 class="confirmtext">{{ $password }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
            <div class="row">
                <div class="input-field col s4 offset-s1">
                    <div>
                        <h4 class="right confirmlabel">Token :</h4>
                    </div>
                </div>
                <div class="input-field col s7">
                    <div >
                        <h4 class="confirmtext">{{ $voter->remember_token }}</h4>
                    </div>
                </div>
            </div>
    </div>

@endsection
