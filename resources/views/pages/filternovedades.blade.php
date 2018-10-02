@extends('pages.templates.body')
@section('title', 'Maer - Home')
@section('css')
<link href="{{ asset('css/pages/sliders/slider.css') }}" rel="stylesheet"/>
<link href="{{ asset('css/pages/destacados.css') }}" rel="stylesheet"/>
<link href="{{ asset('css/pages/home.css') }}" rel="stylesheet"/>
<link href="{{ asset('css/pages/novedades.css') }}" rel="stylesheet">

@endsection
@section('contenido')
<div class="container" style="width: 82%; margin-top: 50px;">   
<div class="row">
  <div class="col l9 m12 s12" style="margin-top: 2%;">
@foreach($novedades as $novedad)          
@if($novedad->categoria_novedad_id==$categoria->id) 
    <div class="row" style="    margin-bottom: 8%;">  
            <div class="col l2 m2 s12 center" style="padding-left: 0px;background-color: #ECECEC;">
              <span style="color: #004782;font-size: 21px;">{{ $novedad->categoria_novedad->nombre }}</span>
            </div>   
            <div class="col l10 m10 s12" style="">
            </div>       
        <div class="contnovedad col l12 m12 s12">
            <div class="col l4 m4 s12" style="padding-left: 0px;">
                <div class="imgnovedad"> 
                    <img class="responsive-img" src="{{ asset($novedad->imagen) }}"/>
                </div>
            </div>
            <div class="col l8 m8 s12" style="padding-left: 29px;">
                <div class="fechanovedad">
                    {!! $novedad->fecha !!}
                </div>
                <div class="titulonovedad">
                    {!! $novedad->nombre !!}
                </div>
                <div class="descripcionnovedad">
                    {!! $novedad->contenido !!}
                </div>
                <div class="flecha">
                    <img class="responsive-img" src="{{ asset("/img/flecha.png") }}"/>
                    <a href="{{ route('novedad', $novedad->id) }}">
                    <span class="ver">
                    VER MÁS
                    </span>
                </a>
                </div>
            </div>
        </div>
    </div>    
        @endif
@endforeach
  </div>
  <div class="right col l3 m12 s12">
    <div style="padding-top: 40px; padding-bottom: 40px;">
      <div style="border-bottom: 2px solid #595959;">
        <h5 style="padding-left: 5px; color: #004684; font-weight: 400; font-size: 22px;">CATEGORIAS</h5>
      </div>
      <div style="padding-top: 15px;">
        @foreach($categorias as $categoria)
        <div style="padding-left: 5px;  font-size: 18px; padding-bottom: 10px; ">
          <a href="{{route('filter', $categoria->id)}}" style="color: #3F3F3F;">» {{($categoria->nombre)}}</a>
        </div>
        @endforeach
      </div>
    </div>
  </div>
  
</div>
</div>

@endsection

    <script type="text/javascript" src="{{ asset('js/jquery/jquery.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/materialize/materialize.min.js') }}"></script>
@section('js')

<script type="text/javascript">
 $(document).ready(function(){
  $('.dropdown-trigger').dropdown({
    constrainWidth: false,
    closeOnClick: false
  });
   });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.sidenav').sidenav();
  });
</script>

@endsection