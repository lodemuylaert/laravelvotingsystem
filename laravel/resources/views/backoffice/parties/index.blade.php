@extends('layouts.backofficeapp')
@section('pagetitle')
    <h1>Partijen</h1>
@endsection
@section('buttons')
    <a class="waves-effect waves-light btn-large headerbutton" href="{{ route('admin.partijen.nieuw') }}"><i class="material-icons buttonheadericon">add</i>Nieuwe Partij</a>
@endsection
@section('search')

@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="collapsible" data-collapsible="accordion">
                    @foreach($partiesadmin->sortBy('name',SORT_NATURAL|SORT_FLAG_CASE) as $partie)
                        <form id="softedletepartie{!! $partie->id !!}" action="{{ route('admin.partijen.softdelete', ['id' => $partie->id ]) }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        <li>
                            <div class="collapsible-header {!! $partie->deleted == true?'softdeleted border':'' !!}">
                                {{ $partie->name }}
                                <span class="new badge" data-badge-caption="">{{ $partie->candidates->where('deleted', false)->count() }}</span>
                            </div>
                            <div class="listitemactions">
                                @if($partie->deleted == false)
                                    <a href="{{ route('admin.partijen.wijzig', ['id' => $partie->id ]) }}"><i class="material-icons right nomargin">mode_edit</i></a>
                                    <a href="{{ route('admin.partijen.verwijder', ['id' => $partie->id ]) }}" ><i class="material-icons right nomargin harddelete">delete</i></a>
                                    <a class="anchorwithouthref"  onclick="event.preventDefault();document.getElementById('softedletepartie{!! $partie->id !!}').submit();"><i class="material-icons right nomargin ">delete</i></a>
                                @else
                                    <a class="anchorwithouthref" onclick="event.preventDefault();document.getElementById('softedletepartie{!! $partie->id !!}').submit();"><i class="material-icons right nomargin ">delete</i></a>
                                @endif
                            </div>
                            <div class="collapsible-body {!! $partie->deleted == true?'softdeleted':'' !!}">
                                    @foreach($partie->candidates->sortBy('name',SORT_NATURAL|SORT_FLAG_CASE) as $detail)
                                         <form id="softedletecandidate{!! $detail->id !!}" action="{{ route('admin.kandidaten.softdelete', ['id' => $detail->id ]) }}" method="POST" style="display: none;">
                                             {{ csrf_field() }}
                                         </form>
                                        <div class="{!! $detail->deleted == true?'softdeleted':'' !!} candidatedetail">
                                            <p class="inline">{{ $detail->name }}</p>
                                            @if($partie->deleted == true)
                                            @elseif($detail->deleted == true)
                                                <a class="anchorwithouthref" onclick="event.preventDefault();document.getElementById('softedletecandidate{!! $detail->id !!}').submit();">
                                                    <i class="material-icons right ">delete</i>
                                                </a>
                                            @else
                                                <a class="" href="{{ route('admin.kandidaten.wijzig', ['id' => $detail->id ]) }}">
                                                    <i class="material-icons right">mode_edit</i>
                                                </a>
                                                <a class="" href="{{ route('admin.kandidaten.verwijder', ['id' => $detail->id ]) }}">
                                                    <i class="material-icons right harddelete">delete</i>
                                                </a>
                                                <a class="anchorwithouthref" onclick="event.preventDefault();document.getElementById('softedletecandidate{!! $detail->id !!}').submit();">
                                                    <i class="material-icons right ">delete</i>
                                                </a>
                                            @endif
                                        </div>
                                    @endforeach
                                        @if($partie->deleted == true)
                                        @else
                                            <form method="get" action="{{ route('admin.kandidaten.nieuw') }}">
                                                {{ csrf_field() }}
                                                <input name="partie" type="text" value="{{ $partie->name }}" class="hide">
                                                @if($partie->candidates->count() < 30)
                                                <button class="waves-effect waves-light btn newcandidate" type="submit"><i class="material-icons left">add</i> Nieuwe kandidaat </button>
                                                @endif
                                            </form>
                                        @endif
                            </div>
                        </li>
                    @endforeach

                </ul>
            </div>
        </div>
    </div>
@endsection
