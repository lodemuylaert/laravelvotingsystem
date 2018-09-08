@extends('layouts.backofficeapp')
@section('buttons')
    <a class="waves-effect waves-light btn-large headerbutton" id="editcandidate"><i class="material-icons buttonheadericon">done</i>Opslaan</a>
@endsection
@section('pagetitle')
    <h1>Wijzigen kandidaat</h1>
@endsection
@section('backbutton')
    <a href="{{ redirect()->back()->getTargetUrl() }}" class="btn-floating btn-large waves-effect waves-light red backbutt" title="Terug"><i class="material-icons">play_arrow</i></a>
@endsection
@section('search')

@endsection
@section('content')
 <form method="post" action="{{ route('admin.kandidaten.wijzig',['id' => $candidate->id]) }} " id="editcandidateform" enctype="multipart/form-data">
     {{ csrf_field() }}
     <div class="container">
         <div class="row">
             <div class="input-field col-md-8 col-md-offset-2">
                 <div >
                     <input  id="first_name" name="naam" type="text" class="validate" value="{{ $candidate->name }}">
                     <label class="labelform" for="first_name">Naam kandidaat</label>
                 </div>
             </div>
         </div>
         <div class="row">
             <div class="input-field col-md-8 col-md-offset-2">
                 <div>
                     <blockquote><p>{{ $candidate->votes }} stemmen</p></blockquote>
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
