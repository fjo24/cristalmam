@extends('pages.templates.body')
@section('title', 'Impresión o Satinado')
@section('css')
<link href="{{ asset('css/pages/banner.css') }}" rel="stylesheet"/>
<link href="{{ asset('css/pages/consejos.css') }}" rel="stylesheet"/>
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
<?php
        $i=0;
    ?>
<div class="container" style="width: 85%">
    <div class="productos">
        <div style="">
            <div class="row bloquecont">
                <div class="items-cat col l12 s12 m12">
                    <p class="texto-ini">
                        Los Productos Cristal-Mam sean en vidrio que en plastico pueden ser personalizados según diversas tecnicas de decoración y tratamientos.
                    </p>
                </div>
                <div class="servicios" style="align-items: center">
                    <div class="items-servicio row" style="align-items: center;">
                        <div class="col l12 s12 m12">
                            @foreach($items as $consejo)
                            @if($i===0)
                            <div class="bloque-consejos left">
                                <div class="col l6 s12 m6 hide-on-med-and-down">
                                    <img alt="" src="{{asset($consejo->imagen)}}" style="">
                                    </img>
                                </div>
                                <div class="texto col l6 s12 m6">
                                    <div class="titulo">
                                        {!! $consejo->titulo !!}
                                    </div>
                                    <div class="texto1">
                                        {!! $consejo->descripcion !!}
                                    </div>
                                </div>
                            </div>
                            <?php
                                $i++;
                            ?>
                            @else
                            <div class="bloque-consejos left">
                                <div class="texto col l6 s12 m6">
                                    <div class="titulo">
                                        {!! $consejo->titulo !!}
                                    </div>
                                    <div class="texto1">
                                        {!! $consejo->descripcion !!}
                                    </div>
                                </div>
                                <div class="col l6 s12 m6 center hide-on-med-and-down">
                                    <img alt="" src="{{asset($consejo->imagen)}}" style="">
                                    </img>
                                </div>
                            </div>
                            <?php
        $i=0;
    ?>
                            @endif
                            @endforeach
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
