@extends('layouts.backofficeapp')
@section('buttons')
    <a class="waves-effect waves-light btn-large headerbutton" href="{{ route('admin.stemmers.nieuw') }}"><i class="material-icons buttonheadericon">add</i>Nieuwe Stemmer</a>
@endsection
@section('pagetitle')
    <h1>Stemmers</h1>
@endsection
@section('search')
    <form class="" method="get" action="{{ route('admin.stemmers') }}" >
        <div class="input-field">
            <input id="search" type="text" name="keyword" naclass="validate">
            <label for="search"><i class="material-icons">search</i></label>
            <submit></submit>
        </div>

    </form>
@endsection
@section('content')
    {!! $keyword ? '<p class="inline">Zoekterm: '.$keyword.'</p>' : '' !!}
    {!! $keyword ? '<a href="/admin/stemmers">Filter resetten</a>' : '' !!}

        <!-- Table -->
        <table class="table">
            <thead>
                <tr>
                    <td>@sortablelink('id', 'Id')</td>
                    <td>@sortablelink('name', 'Naam')</td>
                    <td>@sortablelink('vote', 'Gestemd')</td>
                    <td>Datum</td>
                    <td>@sortablelink('vote.created_at', 'Uur')</td>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->vote ? 'Ja' : 'Neen' }}</td>
                    <td>{{ $user->vote ? $user->vote->created_at->format('d-m-Y') : '' }}</td>
                    <td>{{ $user->vote ? $user->vote->created_at->format('H:i:s') : '' }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $users->links() }}

@endsection
