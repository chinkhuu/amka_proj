@extends('layouts.app')

@section('content')

<div class="pc-show">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="layout-title">
                    <h1>{{$game_center->name}}</h1>
                </div>
                <div class="layout-info1">
                    <div class="text-overflow -item">
                        <i class="bi bi-geo-alt-fill"></i>
                       {{$game_center->address}}
                    </div>
                    <div class="-item">
                        <i class="bi bi-clock"></i>
                        Нээх Цаг: {{$game_center->open_time}}
                    </div>

                    <div class="-item">
                        <i class="bi bi-clock"></i>
                        Хаах Цаг: {{$game_center->close_time}}
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="slider1">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            @forelse($game_center->centerImages as $item)
                                <div class="swiper-slide">
                                    <img class="logo me-auto" src="{{asset($item->image)}}" alt="">
                                </div>
                            @empty
                                <p>No Slider Available</p>
                            @endforelse
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-pagination"></div>
                      </div>
                </div>

                <div style="margin-top: 30px;">
                    <iframe src="{{$game_center->google_map_link}}" width="850" height="450" style="border:0; border-radius: 20px" allowfullscreen=""
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade" ></iframe>
                </div>
            </div>
            <div class="col-md-4">
                <div class="block_box">
                    <div class="specs-com">
                        <br>
                        <div class="specs-com1">
                            {{$game_center->description}}
                        </div>
                    </div>
                </div>

                <div class="block_box">
                                        <div class="list-single-main sidebar">
                                            <i class="bi bi-pc-display-horizontal"></i> <span class="seats">Нийт суудал: {{$game_center->ordinaryRoom->seat_number + $game_center->vipRoom->seat_number * $game_center->vipRoom->room_number }}</span>
                                        </div>
                    <div class="specs-com">
                        <div class="specs-com1">
                            <h5>
                                Заалны компьютерийн үзүүлэлт
                            </h5>
                            <ul>
                                Суудлын тоо: {{$game_center->ordinaryRoom->seat_number}} <br>
                                Үнэ: {{$game_center->ordinaryRoom->price}}

                                {!! $game_center->ordinaryRoom->computer_performance !!}
                            </ul>
                        </div>
                        <br>
                        @if($game_center->vipRoom)
                            <div class="specs-com1">
                                <h5>
                                    VIP өрөөний компьютерийн үзүүлэлт
                                </h5>
                                <ul>
                                    Өрөөний тоо: {{$game_center->vipRoom->room_number}} <br>
                                    Нэг өрөөний суудлын тоо: {{$game_center->vipRoom->seat_number}}  <br>
                                    Үнэ: {{$game_center->vipRoom->price}}

                                    {!! $game_center->vipRoom->computer_performance !!}
                                </ul>
                            </div>
                        @endif


                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
