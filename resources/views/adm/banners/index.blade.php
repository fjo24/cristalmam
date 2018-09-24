@extends('adm.layouts.frame')

@section('titulo', 'Listado de Banners')

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
        <table class="highlight bordered">
            <thead>
                <td>
                    Imagen
                </td>
                <td>
                    Seccion
                </td>
                <td class="text-right">
                    Acciones
                </td>
            </thead>
            <tbody>
                @foreach($banners as $banner)
                <tr>
                    <td>
                        <img alt="seccion" height="150" src="{{ asset($banner->imagen) }}" width="400"/>
                    </td>
                    <td>
                        {{ $banner->seccion }}
                    </td>
                    <td class="text-right">
                        <a href="{{ route('banners.edit', $banner->id) }}">
                            <i class="material-icons">
                                create
                            </i>
                        </a>
                        {!!Form::open(['class'=>'en-linea', 'route'=>['banners.destroy', $banner->id], 'method' => 'DELETE'])!!}
                        <button class="submit-button" onclick="return confirm('¿Realmente deseas borrar el banner?')" type="submit">
                            <i class="material-icons red-text">
                                cancel
                            </i>
                        </button>
                        {!!Form::close()!!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
