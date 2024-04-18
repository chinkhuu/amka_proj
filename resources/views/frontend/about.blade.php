@extends('layouts.app')

@section('content')

<div class="big-banner">
    <img src="{{asset("uploads/big-pic.jpg")}}" alt="" width="100%">
    <div class="banner-txt">
        <h4>
            Aami Taami Squad
        </h4>
        <h2>
            Learn About <br> Our Team
        </h2>
    </div>
</div>
<div class="about-section ">
    <div class="container ">
        <div class="row ">
            <div class="col-md-6">
                <div class="accent-line"></div>
                <div class="about-txt">
                    <h2>
                        About the <br> <span class="brand-span">Aami & Taami Team</span>
                    </h2>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab enim rem illo esse amet modi sed, impedit fugiat accusantium similique quasi aspernatur maiores molestiae iste minima sequi commodi nemo atque perferendis magnam? Eius aliquam assumenda, facilis consequatur incidunt optio sunt minima doloremque repellat blanditiis libero nam molestias accusamus quae a?<br>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni quam amet, inventore saepe autem quo dolores, ratione aliquam neque, modi odio placeat explicabo fuga accusantium voluptatem facere. Qui, possimus aliquam?
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="content-image-wrapper">
                    <div class="content-image">
                        <img src="{{asset("uploads/about.png")}}" alt="" width="100%" class="image">
                    </div>
                    <img src="{{asset("uploads/svg.svg")}}" alt=""  class="about-accent" style="opacity: 1;transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg);transform-style: preserve-3d;">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
