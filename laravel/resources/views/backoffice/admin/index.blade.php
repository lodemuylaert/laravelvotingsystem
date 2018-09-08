@extends('layouts.backofficeapp')
@section('buttons')
    <a class="waves-effect waves-light btn-large headerbutton" href="{{ route('admin.administrator.nieuw') }}"><i class="material-icons buttonheadericon">add</i>Nieuwe Administrator</a>
@endsection
@section('pagetitle')
    <h1>Administrators</h1>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="collection">
                    @foreach($administrators->sortby('name',SORT_NATURAL|SORT_FLAG_CASE) as $administrator)
                        @if(!Auth::user()->superadmin && $administrator->softdeleted  )
                        @else
                            <li class="collection-item avatar {!! $administrator->softdeleted ? 'softdeletedaddministrator':'' !!}">
                                <img src="https://randomuser.me/api/portraits/men/{{ $administrator->id }}.jpg" alt="" class="circle">
                                <p>{{ $administrator->name }}<br>
                                    {!! $administrator->superadmin ? '<span class="red-text">Superadministrator</span>' : 'Administrator' !!}
                                </p>
                                <span class="title">{{ $administrator->email }}</span>
                                @if(Auth::user()->superadmin)
                                    @if(Auth::user()->id == $administrator->id)
                                    @else
                                        <form method="post" id="formdeleteadmin{!! $administrator->id !!}" action="{{ route('admin.administrator.verwijderen',['id' => $administrator->id])}}" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <a class="anchorwithouthref secondary-content" onclick="event.preventDefault();document.getElementById('formdeleteadmin{!! $administrator->id !!}').submit();">
                                                <i class="material-icons">delete</i>
                                            </a>
                                        </form>
                                    @endif
                                @endif
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
