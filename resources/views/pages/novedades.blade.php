@extends('pages.templates.body')
@section('title', 'Maer - Home')
@section('css')
<link href="{{ asset('css/pages/sliders/slider.css') }}" rel="stylesheet"/>
<link href="{{ asset('css/pages/destacados.css') }}" rel="stylesheet"/>
<link href="{{ asset('css/pages/home.css') }}" rel="stylesheet"/>
        <link href="{{ asset('css/page/slider.css') }}" rel="stylesheet">
            <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
            <link href="{{ asset('css/novedad.css') }}" rel="stylesheet">

@endsection
@section('contenido')
<div class="container" style="width: 82%; margin-top: 50px;">   
<div class="row">
  <div class="col l12">
  <h6 style="font-family: 'Montserrat'; color:#F07D00;">ULTIMAS NOTICIAS</h6>
  <h4 style="font-family: 'Montserrat'; color:#F07D00; margin-top: 0px;"><b>Novedades</b></h4>  
  </div>
</div>

<div class="row">
  <div class="col l9 m12 s12">
@foreach($novedades as $novedad)
                
    <div class="row">
            
        <div class="contnovedad col l12 m12 s12">
            <div class="col l4 m4 s12" style="padding-left: 0px;">
            @foreach($novedad->imagenes as $imagen)
                    <div class="imgnovedad"> 
                        <img class="responsive-img" src="{{ asset($imagen->imagen) }}"/>
                    </div>
                    @if($ready == 0)    
                        @break;
                    @endif
            @endforeach
            </div>
            <div class="col l8 m8 s12" style="padding-left: 29px;">
                <div class="titulonovedad">
                    {!! $novedad->nombre !!}
                </div>
                <div class="fechanovedad">
                    {!! $novedad->fecha !!}
                </div>
                <div class="descripcionnovedad">
                    {!! $novedad->descripcion !!}
                </div>
                <div class="flecha">
                    <img class="responsive-img" src="{{ asset("/img/flecha.png") }}"/>
                    <a href="{{ route('novedadesinfo', $novedad->id) }}">
                    <span class="ver">
                    VER MÁS
                    </span>
                </a>
                </div>
            </div>
        </div>
    </div>    
@endforeach
  </div>
  <div class="right col l3 m12 s12">
    <div class="hide-on-med-and-down">
      <nav class="z-depth-0" style="background-color: white; border: 1px solid #DDDDDD">
        <div class="nav-wrapper">
          {!!Form::open(['route'=>'buscar_novedad', 'method'=>'POST'])!!}
            <div style="padding-left: 10px; padding-right: 10px;">
              <div>{!!Form::text('buscar',null,['placeholder'=>'Buscar...', 'required'])!!}</div>            
              <div class="hide">{!!Form::submit('crear', ['class'=>'hidden'])!!}</div>
              <!-- <i class="material-icons">close</i> -->
            </div>
          {!!Form::close()!!} 
        </div>
      </nav>
    </div>
    <div style="padding-top: 40px; padding-bottom: 40px;">
      <div style="border-bottom: 2px solid #595959;">
        <h5 style="padding-left: 5px; color: #F07D00; font-weight: 400; font-size: 22px;">CATEGORIAS</h5>
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