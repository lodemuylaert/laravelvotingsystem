@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="jumbotron">
            <div class="page-header ">
                <h1 class="text-center pagetitle">Partijen</h1>
            </div>
            <p class="text-center pagesubtitle">Hier kan je de verschillende partijen overlopen</p>

        </div>
                <div class="row" v-for="partijen in partijen">

                        <div class="col-sm-12 col-md-3" v-if="partijen.id % 2 == 0">
                            <div class="">
                                <img :src="partijen.imgurl" class="center-block">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-9" style="height: 200px;" v-if="partijen.id % 2 == 0">
                            <div class="align-middle">
                                <h2 class="pagesubtitle">@{{ partijen.name }}</h2>
                                <p class="text-left regulartext">
                                    @{{ partijen.description }}
                                </p>
                            </div>
                        </div>



                        <div class="col-sm-12 col-md-9" style="height: 200px;" v-if="partijen.id % 2 != 0">
                            <div>
                                <h2 class="text-right pagesubtitle">@{{ partijen.name }}</h2>
                                <p class="text-right regulartext">
                                    @{{ partijen.description }}
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3" v-if="partijen.id % 2 != 0">
                            <div class="">
                                <img :src="partijen.imgurl" class="center-block">
                            </div>
                        </div>


                    <div class="row" v-for="partijen in partijen">

                        <div class="col-sm-12 col-md-3">
                            <div class="">
                                <img :src="partijen.imgurl" class="center-block">
                            </div>
                        </div>
                    </div>
                </div>
        </div>
@endsection
