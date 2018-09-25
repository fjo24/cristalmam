@extends('adm.layouts.frame')

@section('titulo', 'Nuevo producto')

@section('contenido')
        @if(count($errors) > 0)
<div class="col s12 card-panel red lighten-4 red-text text-darken-4">
    <ul>
        @foreach($errors->all() as $error)
        <li>
            {!!$error!!}
        </li>
        @endforeach
    </ul>
</div>
@endif
        @if(session('success'))
<div class="col s12 card-panel green lighten-4 green-text text-darken-4">
    {{ session('success') }}
</div>
@endif
<div class="row">
    <div class="col l12 s12">
        {!!Form::open(['route'=>'productos.store', 'method'=>'POST', 'files' => true])!!}
        <div class="input-field col l6 s12">
                {!!Form::label('Nombre:')!!}
                        {!!Form::text('nombre', null , ['class'=>'', ''])!!}
            </div> 
            <div class="input-field col l6 s12">
                {!!Form::label('Codigo:')!!}
                        {!!Form::text('codigo', null , ['class'=>'', ''])!!}
            </div>
            <div class="input-field col l6 s12">
                {!!Form::label('Capacidad:')!!}
                        {!!Form::text('capacidad', null , ['class'=>'', ''])!!}
            </div>
            <div class="file-field input-field col l6 s12">
            {!! Form::label('Categoria') !!}<br />
                {!! Form::select('categoria_id', $categorias, null, ['class' => 'form-control', 'placeholder' => 'Categoria', 'required']) !!}
            </div>
            <div class="input-field col l6 s12">
                {!!Form::label('Descripcion corta:')!!}
                        {!!Form::text('meta_descripcion', null , ['class'=>'', ''])!!}
            </div>
            <div class="input-field col l6 s12">
                {!!Form::label('Palabra clave:')!!}
                        {!!Form::text('meta_keywords', null , ['class'=>'', ''])!!}
            </div>
            <div class="input-field col l6 s12">
                {!!Form::label('Orden:')!!}
                        {!!Form::text('orden', null , ['class'=>'', ''])!!}
            </div>
            <div class="file-field input-field col l6 s12">
                <div class="btn">
                    <span>
                        Imagen 
                    </span>
                    {!! Form::file('imagen_detalle') !!}
                </div>
                <div class="file-path-wrapper">
                    {!! Form::text('imagen_detalle',null, ['class'=>'file-path']) !!}
                    {!!Form::label('Recomendado: 240px - 412px')!!}
                </div>
            </div>
        <div class="input-field col l6 s12">
        {!! Form::label('destacado?') !!}<br />
            {!! Form::select('destacado', ['1' => 'si', '2' => 'no'], null, ['class' => 'form-control', 'placeholder' => 'Producto destacado?']) !!}
        </div>
        <label class="col l12 s12" for="descripcion">
            Descripcion
        </label>
        <div class="input-field col l12 s12">
            <textarea class="materialize-textarea" id="descripcion" name="descripcion" required="">
            </textarea>
        </div>
        <div class="col l12 s12 no-padding">
            <button class="boton btn-large right" name="action" type="submit">
                Crear
            </button>
        </div>
        {!!Form::close()!!}
    </div>
</div>
<script src="//cdn.ckeditor.com/4.9.2/full/ckeditor.js">
</script>
@endsection
@section('js')
<script type="text/javascript">
    CKEDITOR.replace('descripcion');
    CKEDITOR.config.height = '150px';
    CKEDITOR.config.width = '100%';
    
$(document).ready(function(){
    $('select').formSelect();
  });
</script>
@endsection
