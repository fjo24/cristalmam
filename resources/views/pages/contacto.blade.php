@extends('pages.templates.body')
@section('title', 'VLM - Contacto')
@section('css')
<link href="{{ asset('css/pages/contacto.css') }}" rel="stylesheet">
    @endsection
@section('contenido')
    <!-- body -->
    <main>
        <iframe allowfullscreen="" frameborder="0" height="450" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3280.6995532778806!2d-58.39929338543824!3d-34.68753156944331!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bccce99c207ab3%3A0xcfd7aefb0e331c33!2sCristalmam+S.+A.!5e0!3m2!1ses-419!2sar!4v1538340541944" style="border:0" width="100%">
        </iframe>
        <section class="contacto">
            <div class="container">
                <div class="row">
                    <div class="col l12 m12 s12 center" style="color: black">
                        <span class="complete">
                            Complete el formulario a continuación y nuestro equipo se contactará a la brevedad
                        </span>
                    </div>
                    <div class="col l4 m4 s12" style="color: black">
                        <div class="datos_footer col l12 m12 s12">
                            <ul>
                                <li>
                                    <div class="col l12 m12 s12" style="margin: 7% 0%;">
                                        <div class="col l1 m1 s1" style="padding: 0;padding-top: 8px">
                                            <img alt="" class="" src="{{asset('img/layouts/ubicacion.png')}}"/>
                                        </div>
                                        <div class="left col l11 m11 s11" style="line-height: 18px!important;">
                                        	<div class="left">
                                            	{{$direccion->descripcion}}
                                        	</div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="col l12 m12 s12" style="margin: 7% 0%;">
                                        <div class="col l1 m1 s1" style="padding: 0;padding-top: 8px">
                                            <img alt="" class="" src="{{asset('img/layouts/telefono.png')}}"/>
                                        </div>
                                        <div class="left col l11 m11 s11" style="line-height: 29px!important">
                                        	<div class="left">
                                            	{{$telefono->descripcion}}
                                        	</div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="col l12 m12 s12" style="margin: 7% 0%;">
                                        <div class="col l1 m1 s1" style="padding: 0;padding-top: 8px">
                                            <img alt="" class="" src="{{asset('img/layouts/mail.png')}}">
                                            </img>
                                        </div>
                                        <div class="left col l11 m11 s11" style="line-height: 29px!important;">
                                        	<div class="left" style="color: #06007E;font-weight: 600;">
                                            	info@cristalmam.com.ar
                                        	</div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col m8 s12 l8">
                        {!!Form::open(['route'=>'enviarmailcontacto', 'method'=>'POST'])!!}
						{{ csrf_field() }}
                        <div class="row">
                            <div class="input-field col m6 s12" style="color: #595959">
                                {!!Form::text('nombre',null,['class'=>'', 'placeholder'=>'Nombre'])!!}
                                <label for="nombre">
                                </label>
                            </div>
                            <div class="input-field col m6 s12" style="color: #595959">
                                {!!Form::text('apellido',null,['class'=>'', 'placeholder'=>'Apellido'])!!}
                                <label for="apellido">
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col m6 s12" style="color: #06007E">
                                {!!Form::email('email',null,['class'=>'', 'placeholder'=>'Email'])!!}
                                <label for="email">
                                </label>
                            </div>
                            <div class="input-field col m6 s12" style="color: black">
                                {!!Form::text('telefono',null,['class'=>'', 'placeholder'=>'Telefono'])!!}
                                <label for="telefono">
                                </label>
                            </div>
                        </div>
                        <div class="row no-margin">
                            <div class="input-field col m6 s12" style="color: black">
                                <label for="mensaje">
                                </label>
                                {!!Form::textarea('mensaje', null, ['class'=>'materialize-textarea', 'placeholder'=>'Mensaje'])!!}
                            </div>
                            <div class="col s6">
                                <div class="g-recaptcha" data-sitekey="6LfT-GQUAAAAALDE4kKAhJAYX2I10Ve1PwtaXBQV" required="">
                                </div>
                                <br>
                                    <button class="btn waves-effect waves-light z-depth-0" name="action" style="background-color: #89B8E6;height: 38px;    width: 100px;color: white;font-weight: 500;    font-family: 'Asap', sans-serif;border-radius: 3px;" type="submit">
                                        Enviar
                                    </button>
                                </br>
                            </div>
                        </div>
                    </div>
                </div>
                {!!Form::close()!!}
            </div>
        </section>
        @endsection

@section('js')
        <script src="https://www.google.com/recaptcha/api.js?hl=es">
        </script>
        <script type="text/javascript">
            $('.logo').click(() => {
            window.location.href = "";
        });
        </script>
        @endsection
    </main>
</link>