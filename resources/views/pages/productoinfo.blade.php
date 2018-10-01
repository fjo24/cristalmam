@extends('pages.templates.body')
@section('title', 'Productos')
@section('css')
<link href="{{ asset('css/pages/productos.css') }}" rel="stylesheet">
<link href="{{ asset('css/pages/slider.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/nouislider/nouislider.css') }}">
    @endsection
@section('contenido')
    <div class="container" style="width: 87%;">
        <div class="row">
            <div class="bloque col l12 m12 s12">
                <div class="col l8 m8 s12">
                    <div class="col l4 m4 s12 center">
                        <div class="categorias">
                            Seleccione la categoria
                        </div>
                        @foreach($categorias as $categoria)
                            @if($categoria->id==$cat)
                        <div class="activa_categoria">
                            <a href="{{ route('productos', $categoria->id) }}">
                                <img alt="" src="{{asset($categoria->imagen)}}"/>
                            </a>
                        </div>
                        @else
                        <div class="imagen_categoria">
                            <a href="{{ route('productos', $categoria->id) }}">
                                <img alt="" src="{{asset($categoria->imagen)}}"/>
                            </a>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    <div class="col l8 m8 s12">
                        <div class="filtradopor col l12 m12 s12">
                                Filtrado por
                        </div>
                        <div class="col l12 m12 s12">
                            <div class="s2capacidad left">
                                Capacidad de llenado
                            </div>
                        </div>
                        <div class="col l12 m12 s12">
                            <div id="test-slider"></div>
                        </div>
                        <div class="col l12 m12 s12">
                            <div class="productos left">
                                Seleccione el producto
                            </div>
                        </div>
                        <div class="col l12 m12 s12">
                            @foreach($productos as $producto)
                            @if($producto->id==$p->id)
                            <div class="col l6 s12 m6">
                                <div class="div-product">
                                    <a class="center" href="{{ route('productoinfo', $producto->id, $categoria->id) }}">
                                        <div class="efecto" style="opacity: 1;">
                                        </div>
                                        <img alt="" class="responsive-img" src="{{asset($producto->imagen)}}" style=""/>
                                        <div class="snombre">
                                            {!!$producto->nombre !!}
                                        </div>
                                        <div class="scapacidad">
                                            {!!$producto->capacidad !!} ml
                                        </div>
                                    </a>
                                </div>
                            </div>
                            @else
                            <div class="col l6 s12 m6">
                                <div class="div-product">
                                    <a class="center" href="{{ route('productoinfo', $producto->id, $categoria->id) }}">
                                        <div class="efecto">
                                            <span class="central">
                                                Ingresar
                                            </span>
                                        </div>
                                        <img alt="" class="responsive-img" src="{{asset($producto->imagen)}}" style=""/>
                                        <div class="snombre">
                                            {!!$producto->nombre !!}
                                        </div>
                                        <div class="scapacidad">
                                            {!!$producto->capacidad !!} ml
                                        </div>
                                    </a>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col l4 m4 s12" style="margin-top: 4%;">
                    <div class="col l12 m12 s12">
                        <div class="carousel carousel-slider center" data-indicators="true" style="height: 325px!important;width: 50%;margin-left: 25%;">
                            @foreach($p->imagenes as $imagen)
                                <div class="carousel-item" href="" style="height: 100%;">
                                    <img alt="slider" src="{{ asset($imagen->imagen) }}"/>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col l12 m12 s12">
                        <div class="nombreinfo">
                            {{ $p->nombre }}
                        </div>
                    </div>
                    @isset($p->capacidad)
                    <div class="col l12 m12 s12" style="margin-top: 6%;">
                        <div class="caracteristica col l6 m6 s6">
                            Capacidad
                        </div>
                        <div class="dato col l6 m6 s6">
                            {{ $p->capacidad }}ml
                        </div>
                    </div>
                    @endisset
                    @isset($p->codigo)
                    <div class="col l12 m12 s12">
                        <div class="caracteristica col l6 m6 s6">
                            Código
                        </div>
                        <div class="dato col l6 m6 s6">
                            {{ $p->codigo }}
                        </div>
                    </div>
                    @endisset
                    @isset($p->altura)
                    <div class="col l12 m12 s12">
                        <div class="caracteristica col l6 m6 s6">
                            Altura
                        </div>
                        <div class="dato col l6 m6 s6">
                            {{ $p->altura }} mm
                        </div>
                    </div>
                    @endisset
                    @isset($p->diametro)
                    <div class="col l12 m12 s12">
                        <div class="caracteristica col l6 m6 s6">
                            Diámetro
                        </div>
                        <div class="dato col l6 m6 s6">
                            {{ $p->diametro }}"
                        </div>
                    </div>
                    @endisset
                    @isset($p->caja)
                    <div class="col l12 m12 s12">
                        <div class="caracteristica col l6 m6 s6">
                            Caja
                        </div>
                        <div class="dato col l6 m6 s6">
                            {{ $p->caja }} unidades
                        </div>
                    </div>
                    @endisset
                    @isset($p->tipo_boca)
                    <div class="col l12 m12 s12">
                        <div class="caracteristica col l6 m6 s6">
                            Tipo de Boca
                        </div>
                        <div class="dato col l6 m6 s6">
                            {{ $p->tipo_boca }}
                        </div>
                    </div>
                    @endisset
                    @isset($p->diametro_boca)
                    <div class="col l12 m12 s12">
                        <div class="caracteristica col l6 m6 s6">
                            Diámetro de Boca
                        </div>
                        <div class="dato col l6 m6 s6">
                            {{ $p->diametro_boca }} ml
                        </div>
                    </div>
                    @endisset
                    <div class="col l12 m12 s12" style="margin-top: 3%;">
                        <div class="detalleinfo left">
                            Detalles
                        </div>
                    </div>
                    <div class="col l12 m12 s12">
                        <div class="imgdetalleinfo">
                            <img alt="slider" src="{{ asset($p->imagen_detalle) }}"/>
                        </div>
                    </div>
                    <div class="col l12 m12 s12">
                        <div class="boton_consultar">
                            <button class="btn waves-effect waves-light z-depth-0" type="submit" name="action">Consultar
                                    </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    
@section('js')
    <script type="text/javascript">

    $('.carousel.carousel-slider').carousel({
            fullWidth: true,
            height: 300,
            indicators: true
        });

    $(document).ready(function() {
    var slider = document.getElementById('slider');
    noUiSlider.create(slider, {
    start: [20, 80],
    connect: true,
    step: 1,
    range: {
        'min': 0,
        'max': 100
   },
   format: wNumb({
     decimals: 0
   })
  });
});
        $(document).ready(function(){
    $('.collapsible').collapsible();
  });
    </script>
    @endsection
</link>
