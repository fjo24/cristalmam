@extends('pages.templates.body')
@section('title', 'VLM - Empresa')
@section('css')
<link href="{{ asset('css/pages/slider.css') }}" rel="stylesheet"/>
<link href="{{ asset('css/pages/empresa.css') }}" rel="stylesheet"/>
<link href="{{ asset('css/pages/banner.css') }}" rel="stylesheet">
    @endsection
@section('contenido')
    <div class="seccion-banner" style="height: 500px;background: url({!! $banner->imagen !!});">
        <div class="btexto" style="padding-top: 14%!important;">
            <div class="tbanner left" style="font-size: 42px;font-weight: 300;padding-left: 8%;width: 100%;">
                {!! $banner->texto1 !!}
            </div>
            <br>
                <div class="tbanner left" style="font-size: 74px;padding-left: 8%;width: 100%;margin-top: -1%;">
                    {!! $banner->texto2 !!}
                </div>
            </br>
        </div>
    </div>
    <div class="container" style="width: 90%">
        <div class="row toptab">
            <div class="col s12 m7 l7">
                <div class="nombre_empresa">
                    {!! $empresa->nombre !!}
                </div>
                <hr class="linea_titulo">
                    <div class="descripcion_empresa">
                        <i>
                            {!! $empresa->descripcion !!}
                        </i>
                    </div>
                    <div class="contenido_empresa">
                        {!! $empresa->contenido !!}
                    </div>
                </hr>
            </div>
            <div class="col s12 m5 l5" style="">
                <div class="responsive-img imagen_empresa">
                    <img src="{{asset($empresa->imagen)}}"/>
                </div>
            </div>
        </div>
    </div>
    @endsection

@section('js')
    <script type="text/javascript">
        $('.slider').slider({
        indicators: true,
        height: 588,
    });
    </script>
    @endsection
</link>