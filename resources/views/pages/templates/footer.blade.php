<footer class="page-footer">
    <div class="container" style="width: 85%;">
        <div class="row">
            <div class="col l12 m12 s12">
                <div class="sitemap col l4 m4 s12">
                    <div class="listlinks col l6 m6 s6">
                        <ul>
                            <li>
                                <a class="grey-text text-lighten-3" href="{{ url('/') }}">
                                    Inicio
                                </a>
                            </li>
                            <li>
                                <a class="grey-text text-lighten-3" href="{{ url('empresa') }}">
                                    Quiénes Somos
                                </a>
                            </li>
                            <li>
                                <a class="grey-text text-lighten-3" href="{{ url('categorias') }}">
                                    Productos
                                </a>
                            </li>
                            <li>
                                <a class="grey-text text-lighten-3" href="{{ url('servicios') }}">
                                    Trabajos a Medida
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="listlinks col l6 m6 s6">
                        <ul style="">
                            <li>
                                <a class="grey-text text-lighten-3" href="{{ url('categoriaobras') }}">
                                    Impresión o Satinado
                                </a>
                            </li>
                            <li>
                                <a class="grey-text text-lighten-3" href="{{ url('presupuesto') }}">
                                    Novedades
                                </a>
                            </li>
                            <li>
                                <a class="grey-text text-lighten-3" href="{{ url('contacto') }}">
                                    Contacto
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col l4 m4 s12">
                    <div class="logo_footer center">
                        <img src="{{asset('img/layouts/logo_footer.png')}}"/>
                    </div>
                </div>
                <div class="col l4 m4 s12">
                <div class="l12 m12 s12">
                    
                    <div class="col l1 m1 s1" style="">
                    </div>
                    <div class="col l11 m11 s11" style="">
                        <h5 class="titulo-footer3" style="margin-top: 7%;font-size: 15px;">
                            CRISTAL-MAM
                        </h5>
                    </div>
                </div>
                    <div class="datos_footer col l12 m12 s12">
                        <ul>
                            <li>
                                <div class="items_datos">
                                    <div class="col s1" style="">
                                        <img alt="" class="" src="{{asset('img/layouts/ubicacion.png')}}">
                                        </img>
                                    </div>
                                </div>
                                <div class="items_datos">
                                    <div class="col s11" style="line-height: 18px!important;">
                                        {{$direccion->descripcion}}
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="items_datos">
                                    <div class="col s1" style="">
                                        <img alt="" class="" src="{{asset('img/layouts/telefono.png')}}">
                                        </img>
                                    </div>
                                </div>
                                <div class="items_datos col s11" style="line-height: 29px!important">
                                    {{$telefono->descripcion}}
                                </div>
                            </li>
                            <li>
                                <div class="items_datos">
                                    <div class="col s1" style="">
                                        <img alt="" class="" src="{{asset('img/layouts/mail.png')}}">
                                        </img>
                                    </div>
                                </div>
                                <div class="items_datos">
                                    <div class="col s11" style="line-height: 29px!important;">
                                        {{$email->descripcion}}
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
