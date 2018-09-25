<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Http\Requests\NovedadesRequest;
use App\Imgnovedad;
use App\Categoria_novedad;
use App\Novedad;
use App\Producto;
use Illuminate\Http\Request;
use Carbon\Carbon;

class NovedadesController extends Controller
{
    //'nombre', 'fecha', 'descripcion', 'contenido', 'seccion', 'orden', 'imagen1', 'imagen2', 'producto_id',
    public function index()
    {
        $novedades = Novedad::orderBy('categoria_novedad_id', 'ASC')->get();
        return view('adm.novedades.index', compact('novedades'));
    }

    public function create()
    {
        $categorias = Categoria_novedad::OrderBy('nombre', 'ASC')->pluck('nombre', 'id')->all();
        $productos = Producto::orderBy('nombre', 'ASC')->pluck('nombre', 'id')->all();
        return view('adm.novedades.create', compact('productos', 'categorias'));
    }

    public function store(Request $request)
    {
        $novedad                    = new Novedad();
        $novedad->nombre            = $request->nombre;
        $novedad->fecha             = $request->fecha;
        $novedad->descripcion       = $request->descripcion;
        $novedad->contenido         = $request->contenido;
        $novedad->categoria_novedad_id= $request->categoria_novedad_id;
        $novedad->orden             = $request->orden;
        $id              = Novedad::all()->max('id');
        $id++;
        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/novedades/');
                $request->file('imagen')->move($path, $id . '_' . $file->getClientOriginalName());
                $novedad->imagen = 'img/novedades/' . $id . '_' . $file->getClientOriginalName();
            }
        }
        $novedad->save();

        return redirect()->route('novedades.index');
    }

    public function edit($id)
    {
        $novedad = Novedad::find($id);
        $categorias = Categoria_novedad::OrderBy('nombre', 'ASC')->pluck('nombre', 'id')->all();
        $productos = Producto::orderBy('nombre', 'ASC')->pluck('nombre', 'id')->all();
        return view('adm.novedades.edit', compact('novedad', 'categorias', 'productos'));
    }

    public function update(Request $request, $id)
    {
        $novedad                    = Novedad::find($id);
        $novedad->nombre            = $request->nombre;
        $novedad->fecha             = $request->fecha;
        $novedad->descripcion       = $request->descripcion;
        $novedad->contenido         = $request->contenido;
        $novedad->categoria_novedad_id= $request->categoria_novedad_id;
        $novedad->orden             = $request->orden;
        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/novedades/');
                $request->file('imagen')->move($path, $id . '_' . $file->getClientOriginalName());
                $novedad->imagen = 'img/novedades/' . $id . '_' . $file->getClientOriginalName();
            }
        }
        $novedad->save();

        return redirect()->route('novedades.index');
    }

    public function destroy($id)
    {
        $novedad = Novedad::find($id);
        $novedad->delete();
        return redirect()->route('novedades.index');
    }

    //admin de imagenes
    public function imagenes($id)
    {
        $imagenes = Imgnovedad::orderBy('id', 'ASC')->Where('novedad_id', $id)->get();

        $novedad = Novedad::find($id);
        return view('adm.novedades.imagenes')->with(compact('imagenes', 'novedad'));
    }

    public function nuevaimagen(Request $request, $id)
    {

        if ($request->HasFile('file')) {
            foreach ($request->file as $file) {
                $filename = $file->getClientOriginalName();
                $path     = public_path('img/novedad/');
                $file->move($path, $id . '_' . $file->getClientOriginalName());
                $imagen             = new Imgnovedad;
                $imagen->imagen     = 'img/novedad/' . $id . '_' . $file->getClientOriginalName();
                $imagen->orden      = $request->orden;
                $imagen->novedad_id = $id;
                $imagen->save();
            }
        }

        $imagenes = Imgnovedad::orderBy('id', 'ASC')->Where('novedad_id', $id)->get();

        $novedad = Novedad::find($id);
        return view('adm.novedades.imagenes')->with(compact('imagenes', 'novedad'));
    }

    public function destroyimg($id)
    {
        $imagen    = Imgnovedad::find($id);
        $idnovedad = $imagen->novedad_id;
        $imagen->delete();
        $imagenes = Imgnovedad::orderBy('id', 'ASC')->Where('novedad_id', $idnovedad)->get();

        $novedad = Novedad::find($idnovedad);
        return view('adm.novedades.imagenes')->with(compact('imagenes', 'novedad'));
    }

}
