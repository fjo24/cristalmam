{{-- BARRA PRINCIPAL --}}
<nav class="principal">
    <div class="container" style="width: 95%;">
        <div class="row">
            <div class="col l12 m12 s12 center" style="height: 45px;">
                <div class="col l3 m3 s12">
                    <a class="" style="">
                            <a href="{{ url('/') }}">
                        <div class="logo_header">
                                <img alt="" class="img_logo" src="{{asset('img/logo_principal.png')}}"/>
                        </div>
                            </a>
                    </a>
                </div>
                <div class="col l9 m9 s12">
                    <div class="col l12 m12 s12">
                        <div class="right menu_header">
                            <ul class="item-left center hide-on-med-and-down">
                                <li class="items_head">
                                    <img alt="" class="img_logo" src="{{asset('img/layouts/mail.png')}}">
                                </img>
                                </li>
                                <li class="items_head">
                                    <a href="{{ url('/empresa') }}">
                                        {{$email->descripcion}}
                                    </a>
                                </li>
                                <li class="items_head">
                                    <img alt="" class="img_logo" src="{{asset('img/layouts/telefono.png')}}"/>
                                </li>
                                <li class="items_head">
                                    <a href="{{ url('/contacto') }}">
                                       {{$telefono->descripcion}}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col l12 m12 s12">
                    <div class="menu_header">
                        <ul class="item-left center hide-on-med-and-down">
                            @if($activo=='empresa')
                            <li class="items_header">
                                <a class="activo" href="{{ url('/empresa') }}">
                                    Quienes Somos
                                </a>
                            </li>
                            @else
                            <li class="items_header">
                                <a href="{{ url('/empresa') }}">
                                    Quienes Somos
                                </a>
                            </li>
                            @endif
                                @if($activo=='productos')
                            <li class="items_header">
                                <a class="activo" href="{{ url('/quiero') }}" style="">
                                    Productos
                                </a>
                            </li>
                            @else
                            <li class="items_header">
                                <a href="{{ route('productos', 1) }}" style="">
                                    Productos
                                </a>
                            </li>
                            @endif
                            @if($activo=='trabajos')
                            <li class="items_header">
                                <a class="activo" href="{{ url('/trabajos') }}">
                                    Trabajos a Medida
                                </a>
                            </li>
                            @else
                            <li class="items_header">
                                <a href="{{ url('/trabajos') }}">
                                    Trabajos a Medida
                                </a>
                            </li>
                            @endif
                            @if($activo=='impresion')
                            <li class="items_header">
                                <a class="activo" href="{{ url('/impresion') }}">
                                    Impresión y Satinado
                                </a>
                            </li>
                            @else
                            <li class="items_header">
                                <a href="{{ url('/impresion') }}">
                                    Impresión y Satinado
                                </a>
                            </li>
                            @endif
                            @if($activo=='novedades')
                            <li class="items_header">
                                <a class="activo" href="{{ url('/pagenovedades') }}">
                                    Novedades
                                </a>
                            </li>
                            @else
                            <li class="items_header">
                                <a href="{{ url('/pagenovedades') }}">
                                    Novedades
                                </a>
                            </li>
                            @endif
                            @if($activo=='contacto')
                            <li class="items_header">
                                <a class="activo" href="{{ url('/contacto') }}">
                                    Contacto
                                </a>
                            </li>
                            @else
                            <li class="items_header">
                                <a href="{{ url('/contacto') }}">
                                    Contacto
                                </a>
                            </li>
                            @endif
                            <li class="items_header" style="">
                                <a class="lupa modal-trigger" data-target="modalbuscador" style="padding-top: 21px;">
                                    <img alt="" src="{{asset('img/lupa.png')}}">
                                    </img>
                                </a>
                            </li>
                        </ul>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
{{-- Para moviles --}}
<ul class="sidenav" id="slide-out" style="position: absolute;color: #7D0045;">
    <ul class="collapsible collapsible-accordion">
        <li class="bold">
            <a class="principalmovil collapsible-header waves-effect waves-admin" href="{{ url('/') }}">
                <span class="side">
                    INICIO
                </span>
                <i class="material-icons">
                    home
                </i>
            </a>
        </li>
        <li class="bold">
            <a class="principalmovil collapsible-header waves-effect waves-admin" href="{{ url('/empresa') }}">
                <i class="material-icons">
                    group
                </i>
                EMPRESA
            </a>
        </li>
    </ul>
</ul>
{{-- Para moviles fin--}}
