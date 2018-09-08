@extends('layouts.app')
@section('content')
    {{--<div class="container partielist">--}}
        {{--<div class="jumbotron">--}}
            {{--<div class="page-header">--}}
                {{--<h1 class="text-center pagetitle">Mijn stem</h1>--}}
            {{--</div>--}}
            {{--@if($userwithvote)--}}
                {{--<p class="text-center pagesubtitle">Je hebt reeds gestemd om <strong>{{ $userwithvote->created_at->format('H.i') }} uur</strong> en kan geen tweede keer stemmen <br> Hier kan je je ingevuld stemformulier bekijken</p>--}}
            {{--@else--}}
                {{--<p class="text-center pagesubtitle">Breng hier je stem uit. Vanaf het moment je op "Stem" drukt is je stem uitgebracht en onomkeerbaar. Overloop het formulier alvorens te stemmen. Na het stemmen kan je nog steeds inloggen met je unieke code voor je stem te herbekijken.</p>--}}
            {{--@endif--}}
        {{--</div>--}}
        {{--@if (count($errors) > 0)--}}
            {{--<div class="alert alert-danger">--}}
                {{--<ul>--}}
                    {{--@foreach ($errors->all() as $error)--}}
                        {{--<li>{{ $error }}</li>--}}
                    {{--@endforeach--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--@endif--}}
        {{--<form  method="POST" action="/Mijnstem">--}}
            {{--{{ csrf_field() }}--}}
            {{--<div class="row">--}}
                {{--@foreach($PartieWithCandidates as $PartiesWithCandidates)--}}

                    {{--<div class=".col-xs-12 col-sm-6 col-md-4">--}}
                        {{--<div class="partij{{ $PartiesWithCandidates->id }} partij">--}}
                            {{--<div class="headerwrap">--}}
                                {{--<input {{ $userwithvote ? 'disabled' : '' }} type="checkbox" {{ $userwithvote && $userwithvote->partie == $PartiesWithCandidates->name ? 'checked' : '' }} name="partieheader[]" value="{{ $PartiesWithCandidates->name }}" class="partijheader partijheader{{ $PartiesWithCandidates->id }} checkbox-round" id="{{ $PartiesWithCandidates->name }}"/> <h2 class="headtext"><label class="votesubtitles" for="{{ $PartiesWithCandidates->name }}">{{ $PartiesWithCandidates->name }}</label></h2>--}}
                                {{--<div class="checkstyle"></div>--}}
                            {{--</div>--}}

                            {{--<ul id="candidatelist">--}}
                                {{--@foreach($PartiesWithCandidates->candidates as $detail)--}}
                                    {{--<li>--}}
                                        {{--<input {{ $userwithvote ? 'disabled' : '' }} type="checkbox" name="candidates[]" value="{{$detail->name }}" class="{{ $PartiesWithCandidates->name }} checkbox-round candidates" id="{{$detail->name}}"/> <label class="voteregualertext    " for="{{$detail->name}}">{{$detail->name}}</label>--}}
                                        {{--<div class="checkstyle"></div>--}}
                                    {{--</li>--}}

                                {{--@endforeach--}}

                            {{--</ul>--}}
                        {{--</div>--}}

                    {{--</div>--}}

                {{--@endforeach--}}
            {{--</div>--}}
            {{--{!! $userwithvote ? '' : '<div class="row"><div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12"><input type="submit" class="votebutton btn btn-primary" value="Breng je stem uit"></div></div>' !!}--}}

        {{--</form>--}}
    {{--</div>--}}




    <div class="container partielist">
            <div v-if="votelist.message !== null" class="container partielist">
                <div class="jumbotron">
                    <div class="page-header">
                        <h1 class="text-center" v-text="votelist.message"></h1>
                    </div>
                    <p class="text-center"></p>
                </div>
            </div>
            <div v-else>
                <div class="jumbotron">
                    <div class="page-header">
                        <h1 class="pagetitle text-center">Mijn stem</h1>
                    </div>
                    <p v-if="votelist.vote !== null" class=" pagesubtitle text-center">Je hebt reeds gestemd om <strong>@{{ votelist.vote.created_at | date }} uur</strong> en kan geen tweede keer stemmen <br> Hier kan je je ingevuld stemformulier bekijken</p>
                    <p v-else class="text-center pagesubtitle">Breng hier je stem uit. Vanaf het moment je op "Stem" drukt is je stem uitgebracht en onomkeerbaar. Overloop het formulier alvorens te stemmen. Na het stemmen kan je nog steeds inloggen met je unieke code voor je stem te herbekijken.</p>
                </div>

                        <form @submit.prevent="submit">
                            {{ csrf_field() }}
                                <a class="btn btn-primarybtn btn-primary checkbovebtn" v-if="votelist.vote !== null"  v-on:click.once="voted">bekijk stem</a>
                                <div  v-bind:class="{ blurvote: votelist.vote }" class="row">
                                    <div v-for="parties in sortByName(votelist.data)" class=".col-xs-12 col-sm-6 col-md-4" v-show="!parties.deleted">

                                        <div class="partij ">
                                            <div class="headerwrap">
                                                <input type="checkbox"  v-model="checkedParties"  :disabled="checkedParties.length >= maxParties && checkedParties.indexOf(parties.name) == -1 || votelist.vote !== null || checkedCandidates.length > 0"  :name="parties.name" :value="parties.name" :class="parties.name"  class="partijheader checkbox-round" :id="parties.name"> <h2 class="headtext"><label :for="parties.name">@{{parties.name}}</label></h2>
                                                <div class="checkstyle"></div>
                                            </div>

                                            <ul id="candidatelist">
                                                <li v-for="candidates in sortByName(parties.candidates)" v-show="!candidates.deleted">
                                                    <input   type="checkbox" v-model="checkedCandidates" :disabled="checkedCandidates.length >= maxCandidates && checkedCandidates.indexOf(candidates.name) == -1 || votelist.vote !== null || checkedParties.length > 0 " v-on:click="firstpartiecheckedmethod(parties.name)" :name="parties.name" :value="candidates.name" :class="candidates.name" class="checkbox-round candidates" :id="candidates.name"/> <label :for="candidates.name">@{{ candidates.name }}</label>
                                                    <div class="checkstyle"></div>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>


                            <div class="row"><div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12"><button  v-if="votelist.vote == null" type="submit" class="votebutton btn btn-primarybtn btn-primary" >Breng je stem uit</button></div></div>
                        </form>

            </div>

    </div>

@endsection
