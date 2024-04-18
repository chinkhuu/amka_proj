@extends('layouts.app')

@section('content')

    <div class="page-banner">
        <img src="{{asset("uploads/big-pic.jpg")}}" alt="" width="100%">
        <div class="banner-txt" style="bottom: 12%;">
            <h4>
                Aami Taami Squad
            </h4>
            <h2>
                Захиалга
            </h2>
        </div>
    </div>
    <div class="book">
        <div class="container">
            <div class="row">
                @foreach($centers as $item)
                    <div class="col-md-6">
                        <div class="book-list">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="pc-img">
                                        <img src="{{asset("$item->image")}}" alt="" width="100%">
                                        <div class="hour">
                                            <p>VIP - {{$item->vipRoom->price}}₮</p>
                                        </div>
                                        <div class="hour1">
                                            <p>Энгийн -  {{$item->ordinaryRoom->price}}₮</p>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="pc-desc">
                                        <h3>
                                            {{$item->name}}
                                        </h3>
                                        <p><i class="bi bi-geo-alt-fill"></i>{{$item->address}}</p>
                                        <a href="{{route('book.show_order', ['id' => $item->id])}}">
                                            Захиалах
                                        </a>
                                        <a href="{{route('book.show',['id' => encrypt($item->id) ])}}" class="a1">
                                            Дэлгэрэнгүй
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
