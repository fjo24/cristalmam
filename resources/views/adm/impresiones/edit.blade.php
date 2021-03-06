@extends('adm.layouts.frame')

@section('titulo', 'Editar')

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
    <div class="col s12">
        {!!Form::model($impresion, ['route'=>['impresiones.update',$impresion->id], 'method'=>'PUT', 'files' => true])!!}
        <div class="row">
            <div class="input-field col l12 s12">
                {!!Form::label('Titulo:')!!}
                        {!!Form::text('titulo', null , ['class'=>'', 'required'])!!}
            </div>
            <div class="input-field col l6 s12">
                {!!Form::label('orden:')!!}
                        {!!Form::text('orden', null , ['class'=>'', 'required'])!!}
            </div>
            <div class="file-field input-field col l6 s12">
                <div class="btn">
                    <span>
                        Imagen
                    </span>
                    {!! Form::file('imagen') !!}
                </div>
                <div class="file-path-wrapper">
                    {!! Form::text('imagen',null, ['class'=>'file-path']) !!}
                </div>
            </div>
            <label class="col l12 s12" for="descripcion">
                Texto
            </label>
            <div class="input-field col l12 s12">
                <textarea class="materialize-textarea" id="descripcion" name="descripcion" required="">
                    {!! $impresion->descripcion !!}
                </textarea>
            </div>
        </div>
        <div class="col l12 s12 no-padding">
            <button class="boton btn-large right" name="action" type="submit">
                Editar
            </button>
        </div>
        {!!Form::close()!!}
    </div>
</div>
@endsection
<script src="//cdn.ckeditor.com/4.9.2/full/ckeditor.js">
</script>
@section('js')
<script type="text/javascript">
    CKEDITOR.replace('descripcion');
    CKEDITOR.config.height = '100px';
    CKEDITOR.config.width = '100%';
</script>
@endsection