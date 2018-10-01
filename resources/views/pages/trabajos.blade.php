@extends('pages.templates.body')
@section('title', 'Trabajos realizados')
@section('css')
<link href="{{ asset('css/pages/banner.css') }}" rel="stylesheet"/>
<link href="{{ asset('css/pages/servicios.css') }}" rel="stylesheet"/>
<link href="{{ asset('css/pages/mantenimiento.css') }}" rel="stylesheet"/>
@endsection
@section('contenido')
<!-- body -->
<div class="seccion-banner" style="height: 200px;background: url({!! $banner->imagen !!});">
    <div class="btexto" style="padding-top: 6%!important;">
        <div class="tbanner center">
            {!! $banner->texto1 !!}
        </div>
    </div>
</div>
<div class="container" style="width: 83%;margin-top: 3%;">
    <div class="contenido_trabajo center">
        {!!$contenido->contenido!!}
    </div>
</div>
<div class="container" style="width: 83%;">
<div class="items-servicio row" style="align-items: center;margin-top: 5%;">
    <div class="col l12 s12 m12">
        @foreach($servicios as $servicio)
        <div class="col l3 s12 m6 center">
            <span class="img-servicio" style="">
                <img alt="" src="{{asset($servicio->imagen)}}">
                </img>
                <div class="nombre_servicio">
                    <p>
                        {!! $servicio->nombre !!}
                    </p>
                </div>
                <div class="texto_servicio">
                    <p>
                        {!! $servicio->descripcion !!}
                    </p>
                </div>
            </span>
        </div>
        @endforeach
    </div>
</div>
</div>
<div class="formulario_servicios">
    <div class="container form_container" style="width: 45%;">
        <div class="row" style="">
            <div class="contenido-mtto col l12">
                <div class="titulo-mtto col l12 center">
                <h1 class="naranja mayus fs36" style="color: #7F7F7F; font-size: 26px; font-family: 'Source Sans Pro', sans-serif;    font-weight: bold;margin-top: 10%;">¿Necesitás Asesoramiento? </h1>
                <div style="font-family: 'Source Sans Pro', sans-serif;margin-top: 20px; margin-bottom: 20px;    font-size: 16px; color: #6F6F6F;background-color: #fafafa;">Contáctenos y le proporcionaremos la información que necesite</div>

                <div class="row">
                    <div class="col s12 l12">
                        {!!Form::open(['route'=>'enviarmailcontacto', 'method'=>'POST'])!!}
                        {{ csrf_field() }}
                            <div class="row">
                                <div class="input-field col l12 m12 s12" style="color: black">
                                    {!!Form::text('nombre',null,['class'=>'', 'placeholder'=>'Nombre'])!!}
                                    <label for="nombre"></label>
                                </div>
                                <div class="input-field col l12 m12 s12" style="color: black">
                                    {!!Form::text('apellido',null,['class'=>'', 'placeholder'=>'Apellido'])!!}
                                    <label for="apellido"></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col l12 m12 s12" style="color: black">
                                    {!!Form::email('email',null,['class'=>'', 'placeholder'=>'Correo electronico'])!!}
                                    <label for="email"></label>
                                </div>
                                <div class="input-field col l12 m12 s12" style="color: black">
                                    {!!Form::text('empresa',null,['class'=>'', 'placeholder'=>'Empresa'])!!}
                                    <label for="empresa"></label>
                                </div>
                            </div>
                            <div class="row no-margin">
                                <div class="input-field col l12 m12 s12" style="color: black">
                                    <label for="mensaje"></label>
                                    {!!Form::textarea('mensaje', null, ['class'=>'materialize-textarea', 'placeholder'=>'Mensaje'])!!}
                                </div>
                                <div class="col s6 center">
                            <div class="g-recaptcha" data-sitekey="6LfT-GQUAAAAALDE4kKAhJAYX2I10Ve1PwtaXBQV" required="">
                                </div>
                                </div>
                                <div class="col s6 center">
                            
                                </div>
                                    <div class="col l12 m12 s12">
                                        <div class="boton_consultar">
                                            <button class="btn waves-effect waves-light z-depth-0" type="submit" name="action">Consultar
                                                    </button>
                                        </div>
                                    </div>
                            </div>
                {!!Form::close()!!}
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
    $('.slider').slider({
        indicators: true,
        height: 450,
    });
</script>
@endsection
