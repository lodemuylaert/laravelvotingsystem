@extends('layouts.backofficeapp1')

@section('content')
    <h1 class="text-center aanmelden pagetitle"> Admin Login</h1>
    <div class="container login" id="centerlogin">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.login.submit') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <div class="input-group{{ $errors->has('name') ? ' has-error' : '' }} col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12">
                    <label class="formlabel" for="name" class="">Naam</label>
                    <input id="name" type="text" class="form-control" name="name" value="" required autofocus>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group{{ $errors->has('password') ? ' has-error' : '' }} col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12">
                    <label class="formlabel" for="password" >Password</label>
                    <input id="password" type="password" class="form-control" name="password" required>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group col-md-4 col-md-offset-4 col-sm-10 col-sm-offset-1 col-xs-12">
                    <button type="submit" class="btn btn-primary full" id="submitlogin">
                        Aanmelden
                    </button>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12">
                    @include('layouts.error')
                </div>
            </div>

        </form>

    </div>
    </div>
    <img src="images\aalst.jpg" class="background-login imgfilter">
@endsection

