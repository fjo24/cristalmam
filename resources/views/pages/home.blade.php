@extends('pages.templates.body')
@section('title', 'Cristalmam - Home')
@section('css')
<link href="{{ asset('css/pages/slider.css') }}" rel="stylesheet"/>
<link href="{{ asset('css/pages/destacados.css') }}" rel="stylesheet"/>
<link href="{{ asset('css/pages/home.css') }}" rel="stylesheet"/>
@endsection
@section('contenido')

<div class="container" style="width: 90%;margin-top: 5%;">
    <div class="row" style="margin-bottom: 7%;">
        <div class="col l12 m12 s12">


        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
    $('.carousel.carousel-slider').carousel({
            fullWidth: true,
            height: 561,
            indicators: true
        });

        // move next carousel
        $('.moveNextCarousel').click(function(){
            $('.carousel').carousel('next');
        });

        // move prev carousel
        $('.movePrevCarousel').click(function(){
            $('.carousel').carousel('prev');
        });
    $('.slider').slider({
        indicators: true,
        height: 560,
    });


</script>
@endsection
