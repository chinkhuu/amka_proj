@extends('layouts.app')

@section('content')

<div class="big-banner">
    <img src="{{asset("uploads/big-pic.jpg")}}" alt="" width="100%">
    <div class="banner-txt">
        <h4>
            Welcome Aami Taami Squad
        </h4>
        <h2>
            Цаг захиалгийн систем
        </h2>
    </div>
</div>
<div class="top-games">
    <div class="container">
        <div class="top-games-title">
            <h2>Top Games</h2>
            <div class="accent-line-small"></div>
        </div>
        <div class="games-wrapper">
            <div class="row">
                <div class="col-md-4">
                    <div class="game-column">
                        <div class="game-block">
                            <img src="{{asset("uploads/val.png")}}" alt="" width="100%" class="game-cover">
                            <img src="{{asset("uploads/val-logo.svg")}}" alt="" width="100%" class="game-logo">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="game-column-center">
                        <div class="game-block">
                            <img src="{{asset("uploads/csgo.png")}}" alt="" width="100%" class="game-cover">
                            <img src="{{asset("uploads/csgo-logo.svg")}}" alt="" width="100%" class="game-logo">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="game-column">
                        <div class="game-block">
                            <img src="{{asset("uploads/dota.jpg")}}" alt="" width="100%" class="game-cover">
                            {{-- <img src="{{asset("uploads/dota-logo.svg")}}" alt="" width="100%" class="game-logo"> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="cta-section">
    <div class="contact">
        <div class="container">
            <div class="cta-block">
                <div class="cta-content-wrapper">
                    <h2 class="cta-heading">Тоглох газар хайсаар л <br>  байна уу?</h2>
                    <p>“Өөрийн боломжтой өдрөөрөө найз нөхөд, хамт олноороо тоглоомын төв хайх шаардлаггүй боллоо.“</p>
                </div>
                <a href="{{ url('book') }}" class="w-button">
                    Захиалах
                </a>
            </div>
        </div>
    </div>
</div>


<div class="feedback">
    <main class="container">
        <div class="container">
            <div class="index-tit">
                <span>Санал Хүсэлт</span>
            </div>
        </div>

        <div class="feedback-body">
            <form action="{{route('feedback.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Нэр</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Нэр энд бичнэ үү" value="{{old('name')}}" required>
                </div>
                <div class="form-group">
                    <label for="email">И-мэйл</label>
                    <input type="email" class="form-control" value="{{old('emsil')}}" id="email" name="email" placeholder="И-мэйл энд бичнэ үү" required>
                </div>
                <div class="form-group">
                    <label for="phone">Утасны дугаар</label>
                    <input type="tel"
                           pattern="[0-9]{8}"
                           title="Утасны дугаарыг зөв бичнэ үү"
                           class="form-control"
                           id="phone"
                           value="{{old('phone')}}"
                           name="phone" placeholder="Утасны дугаараа энд бичнэ үү" required>
                </div>
                <div class="form-group">
                    <label for="title">Гарчиг</label>
                    <input type="text" class="form-control" value="{{old('title')}}" id="title" name="title" placeholder="Гарчиг энд бичнэ үү" required>
                </div>
                <div class="form-group">
                    <label for="explanation">Тайлбар</label>
                    <textarea class="form-control" id="explanation"
                              name="explanation"
                              rows="3"
                              placeholder="Тайлбараа энд дэлгэрэнгүй бичээрэй" required>{{old('explanation')}}</textarea>
                </div>
                <button type="submit" class="w-full p-2 bg-primary/40 hover-transition hover:bg-primary mt-4 font-bold text-lg border-r convertingColorsLinearGradient">Илгээх</button>
            </form>
        </div>
    </main>
</div>


@endsection
