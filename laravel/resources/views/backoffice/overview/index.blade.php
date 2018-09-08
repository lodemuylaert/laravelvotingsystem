@extends('layouts.backofficeapp')
@section('pagetitle')
    <h1>Overzicht</h1>
@endsection
@section('content')
    <div class="container">
        <h4 class="center">Dit is een overzicht van alle stemmen</h4>
        <h4 class="center">Naamstemmen worden toegekend aan de partij</h4>
        <div class="row">
            @foreach($parties as $parties)
                <div class="col s4 overviewcomponents">
                    <h4 class="center "> {{ $parties->name }}<span class="new badge" data-badge-caption="">{{ $votes->where('partie', '==', $parties->name)->count() + $candidates->where('parties_id', $parties->id)->sum('votes') }}</span></h4>
                    <div class="center">
                        <div style="font-family: Arial; font-size: 12px;">

                            <svg class="circle-diagram" width="180" height="180" data-percent="{{ (($votes->where('partie', '==', $parties->name)->count() + $candidates->where('parties_id', $parties->id)->sum('votes'))/$maxamountofvotes)*100 }}" data-stroke-color="#1DB99C" data-stroke-width="30">
                                <circle class="circle-diagram__circle" cx="50%" cy="50%" r="50%"  fill="#D1D1D1" />
                                <circle class="circle-diagram__circle" cx="50%" cy="50%" r="33%"  fill="white" />
                                <path class="circle-diagram__arc" fill="none" />
                                <text class="circle-diagram__text" x="50%" y="33" style="text-anchor: middle; font-size: 13px;"> {{ $votes->where('partie', '==', $parties->name)->count() + $candidates->where('parties_id', $parties->id)->sum('votes') }}  van de {{ $maxamountofvotes }}</text>
                            </svg>
                        </div>
                    </div>
                </div>
            @endforeach
                <div class="col s12 overviewcomponents">
                    <h4 class="center "> Totaal<span class="new badge" data-badge-caption="">{{ $amountofvotes }}</span></h4>
                    <div class="center">
                        <div style="font-family: Arial; font-size: 12px;">
                            <svg class="circle-diagram" width="600" height="600" data-percent="{{ $percentagetotal }}" data-stroke-color="#1DB99C" data-stroke-width="102">
                                <circle class="circle-diagram__circle" cx="50%" cy="50%" r="50%"  fill="#D1D1D1" />
                                <circle class="circle-diagram__circle" cx="50%" cy="50%" r="33%"  fill="white" />
                                <path class="circle-diagram__arc" fill="none" />
                                <text class="circle-diagram__text" x="50%" y="33" style="text-anchor: middle; font-size: 2rem"> {{ $amountofvotes }}  van de {{ $maxamountofvotes }}</text>
                            </svg>
                        </div>
                    </div>
                </div>
        </div>
    </div>

@endsection
