@extends('pages.templates.body')
@section('title', 'Cristalmam - Home')
@section('css')
<link href="{{ asset('css/pages/slider.css') }}" rel="stylesheet"/>
<link href="{{ asset('css/pages/destacados.css') }}" rel="stylesheet"/>
<link href="{{ asset('css/pages/home.css') }}" rel="stylesheet"/>
<link href="{{ asset('css/pages/lineashome.css') }}" rel="stylesheet"/>
@endsection
@section('contenido')
<div class="carousel carousel-slider center" data-indicators="true">
    @foreach($sliders as $slider)
    <div class="carousel-item" href="">
        <img alt="slider" src="{{ asset($slider->imagen) }}">
            @if(isset($slider->texto)||isset($slider->texto2))
            <div class="caption box-cap" style="">
                <div style="">
                    <div class="slidertext2">
                        {!! $slider->texto !!}
                    </div>
                    <div class="slidertext1">
                        {!! $slider->texto2 !!}
                    </div>
                </div>
            </div>
            @endif
        </img>
    </div>
    @endforeach
</div>
<div class="container" style="width: 84%;margin-top: 3%;">
    <div class="row">
        <div class="col l12 m12 s12">
            <div class="col l12 m12 s12 center" style="margin-bottom: 4%;">
                <span class="titulo_destacados">
                    Productos Destacados
                </span>
            </div>
            @foreach($productos as $producto)
            <div class="col l3 m12 s12">
                <div class="card" style="margin: 0% 7%;">
                    <div class="cuadradas card-image">
                        <a href="{{ route('productoinfo', $producto->id)}}">
                            <img alt="" class="responsive-img" src="{{asset($producto->imagen)}}" style=""/>
                        </a>
                    </div>
                </div>
                <div class="div-nombrehome center" style="    position: relative;">
                    {!!$producto->nombre !!}
                </div>
                <div class="div-nombrecat center">
                    {!!$producto->capacidad !!} ml
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="lineasdecontenido">
    <div class="container" style="width: 84%;">
        <div class="home col s12">
            <div class="row titulo center">
                {!! $home->nombre !!}
            </div>
            <div class="row descripcion center">
                {!! $home->descripcion !!}
            </div>
                    <div class="row contenido center">
                        {!! $home->contenido !!}
                    </div>
                        <div class="boton_home center">
                            <button class="btn waves-effect waves-light z-depth-0" type="submit" name="action">NUESTRA HISTORIA
                                    </button>
                        </div>
                </br>
            </br>
        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
    $('.carousel.carousel-slider').carousel({
            fullWidth: true,
            height: 500,
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
