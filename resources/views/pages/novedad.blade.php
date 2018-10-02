@extends('pages.templates.body')
@section('title', 'Novedad')
@section('css')
        <link href="{{ asset('css/page/slider.css') }}" rel="stylesheet">
            <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
@endsection
@section('contenido')

<div class="container" style="width: 74%; margin-top: 10px;     margin-bottom: 3%;">

@foreach($categorias as $categoria)
@if($categoria->id == $novedadI->categoria_novedad_id)

<div class="row" style=" margin-top: 60px;">
  <div class="col l12 m12 s12">
  <div class="col l2 m2 s12 center" style="padding-left: 0px;background-color: #ECECEC;">
              <span style="color: #004782;font-size: 21px;">{{ $novedadI->categoria_novedad->nombre }}</span>
            </div>   
            <div class="col l10 m10 s12" style="">
            </div>
            </div> 
            <div class="col l12 m12 s12">
  <div class="col l9 m12 s12" style="padding-top: 4%;border-top: 4px solid #009688;">
      <div class="center" style="width: 94%;margin: auto;">
        <img class="responsive-img" src="{{asset($novedadI->imagen2)}}" style="height: 343px; width: 100%;">
                <div>
          <div style="padding-top:15px;">
            <div style="padding-left: 8px; font-family: 'Montserrat'; font-size: 14px; color: #434242;font-weight: 500;">
@endif
@endforeach
            </div>
          </div>
          <div style="padding-top: 20px;text-align: left;">
            <div style="font-family: 'Montserrat'; font-size: 16px; color: #185793; font-weight: 500; ">
              {{$novedadI->fecha}}
            </div>
            <div style="font-family: 'Montserrat'; font-size: 28px; color: #185793; font-weight: 600;">
              {!!$novedadI->nombre!!}
            </div>
            <div style="font-family: 'Montserrat'; font-size: 18px; color: #444444; font-weight: 400;">
              {!!$novedadI->contenido!!}
            </div>
            <div style="font-family: 'Montserrat'; font-size: 18px; color: #444444; font-weight: 500;">
              {!!$novedadI->descripcion!!}
            </div>
            <div style="padding-top: 12px; padding-left: 9px;">
            @if($novedadI->producto_id != '')
              <a href="{{ route('manual', $novedadI->producto_id) }}" class="btn btn-ficha" target="_blank" style="background: white;color: #6B6B6B;
    border: 2px solid #6B6B6B;padding-left: 45px; padding-right: 45px; font-weight: 600;font-weight: 500;width: 215px;height: 38px;font-size: 13px!important;    border-radius: 6px;">DESCARGAR PDF</a>
            @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  <div class="right col l3 m12 s12" style="padding-left: 3%;">
    <div style="padding-top: 19px; padding-bottom: 40px;">
      <div style="border-bottom: 2px solid #B0B0B0;">
        <h5 style="padding-left: 5px; color: #185794; font-weight: 400; font-size: 22px;">CATEGOR&IacuteAS</h5>
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