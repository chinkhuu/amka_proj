@extends('layouts.app')

@section('content')

<div class="page-banner">
    <img src="{{asset("uploads/big-pic.jpg")}}" alt="" width="100%">
    <div class="banner-txt" style="bottom: 12%;">
        <h4>
            Aami Taami Squad
        </h4>
        <h2>
            Meet our legends
        </h2>
    </div>
</div>
<div class="legends">
    <div class="container">
        <div class="legends-title">
            <h2>
                Mongolz
            </h2>
            <div class="divider"></div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <div class="legend-player">
                    <div class="legend-img">
                        <img src="{{asset("uploads/blitz.webp")}}" alt="" width="100%">
                    </div>
                    <div class="team-detail">
                        <h5>
                            Blitz
                        </h5>
                        <div class="subheading-small-white">
                            In Game Leader
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="legend-player">
                    <div class="legend-img">
                        <img src="{{asset("uploads/techno.webp")}}" alt="" width="100%">
                    </div>
                    <div class="team-detail">
                        <h5>
                            Techno4k
                        </h5>
                        <div class="subheading-small-white">
                            Entry Fragger
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="legend-player">
                    <div class="legend-img">
                        <img src="{{asset("uploads/senzu.webp")}}" alt="" width="100%">
                    </div>
                    <div class="team-detail">
                        <h5>
                            Senzu
                        </h5>
                        <div class="subheading-small-white">
                            Rifler
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="legend-player">
                    <div class="legend-img">
                        <img src="{{asset("uploads/mzinho.webp")}}" alt="" width="100%">
                    </div>
                    <div class="team-detail">
                        <h5>
                            Mzinho
                        </h5>
                        <div class="subheading-small-white">
                            Rifler
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="legend-player">
                    <div class="legend-img">
                        <img src="{{asset("uploads/910.webp")}}" alt="" width="100%">
                    </div>
                    <div class="team-detail">
                        <h5>
                            910
                        </h5>
                        <div class="subheading-small-white">
                            Awper
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <div class="container">
        <div class="legends-title" style="margin-top: 50px">
            <h2>
                Atox
            </h2>
            <div class="divider"></div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <div class="legend-player">
                    <div class="legend-img">
                        <img src="{{asset("uploads/dobu.webp")}}" alt="" width="100%">
                    </div>
                    <div class="team-detail">
                        <h5>
                            Dobu
                        </h5>
                        <div class="subheading-small-white">
                            Rifler
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="legend-player">
                    <div class="legend-img">
                        <img src="{{asset("uploads/kabal.webp")}}" alt="" width="100%">
                    </div>
                    <div class="team-detail">
                        <h5>
                            Kabal
                        </h5>
                        <div class="subheading-small-white">
                            In Game Leader
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="legend-player">
                    <div class="legend-img">
                        <img src="{{asset("uploads/miq.webp")}}" alt="" width="100%">
                    </div>
                    <div class="team-detail">
                        <h5>
                            Miq
                        </h5>
                        <div class="subheading-small-white">
                            Rifler
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="legend-player">
                    <div class="legend-img">
                        <img src="{{asset("uploads/accuracy.webp")}}" alt="" width="100%">
                    </div>
                    <div class="team-detail">
                        <h5>
                            AccuracyTg
                        </h5>
                        <div class="subheading-small-white">
                            Awper
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="legend-player">
                    <div class="legend-img">
                        <img src="{{asset("uploads/zesta.webp")}}" alt="" width="100%">
                    </div>
                    <div class="team-detail">
                        <h5>
                            Zesta
                        </h5>
                        <div class="subheading-small-white">
                            Rifler
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
