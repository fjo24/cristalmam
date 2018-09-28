@extends('pages.templates.body')
@section('title', 'Productos')
@section('css')
<link href="{{ asset('css/pages/productos.css') }}" rel="stylesheet">

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
                            @if($categoria==$cat)
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
                            <div class="col l6 s12 m6">
                                <div class="div-product">
                                    <a class="center" href="{{ route('productoinfo', $producto->id) }}">
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
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col l4 m4 s12">
                </div>
            </div>
        </div>
    </div>
    @endsection

@section('js')
    <script type="text/javascript">

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
