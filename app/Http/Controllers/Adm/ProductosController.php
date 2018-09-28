<?php

namespace App\Http\Controllers\Adm;

use App\Categoria;
use App\Http\Controllers\Controller;
use App\Imgproducto;
use App\Modelo;
use App\Producto;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function index()
    {
        $ready     = 0;
        $productos = producto::orderBy('nombre', 'ASC')->get();
        return view('adm.productos.index', compact('productos', 'ready'));
    }

    public function create()
    {
        $categorias = Categoria::orderBy('nombre', 'ASC')->pluck('nombre', 'id')->all();
        return view('adm.productos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $producto                   = new Producto();
        $producto->nombre           = $request->nombre;
        $producto->codigo           = $request->codigo;
        $producto->descripcion      = $request->descripcion;
        $producto->capacidad        = $request->capacidad;
        $producto->meta_descripcion = $request->meta_descripcion;
        $producto->meta_keywords    = $request->meta_keywords;
        $producto->destacado        = $request->destacado;
        $producto->categoria_id     = $request->categoria_id;
        $producto->orden            = $request->orden;
        $id                         = Producto::all()->max('id');
        $id++;
        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/productos/');
                $request->file('imagen')->move($path, $id . '_' . $file->getClientOriginalName());
                $producto->imagen = 'img/productos/' . $id . '_' . $file->getClientOriginalName();
            }
        }
        if ($request->hasFile('imagen_detalle')) {
            if ($request->file('imagen_detalle')->isValid()) {
                $file = $request->file('imagen_detalle');
                $path = public_path('img/productos/');
                $request->file('imagen_detalle')->move($path, $id . '_' . $file->getClientOriginalName());
                $producto->imagen_detalle = 'img/productos/' . $id . '_' . $file->getClientOriginalName();
            }
        }
        $producto->save();

        return redirect()->route('productos.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $producto     = Producto::find($id);
        $categorias   = Categoria::orderBy('nombre', 'ASC')->pluck('nombre', 'id')->all();
        return view('adm.productos.edit', compact('categorias', 'productos', 'rubros', 'modelos', 'aplicaciones', 'categoria_preguntas', 'relacionados', 'producto'));
    }

    public function update(Request $request, $id)
    {
        $producto                   = Producto::find($id);
        $producto->nombre           = $request->nombre;
        $producto->codigo           = $request->codigo;
        $producto->descripcion      = $request->descripcion;
        $producto->capacidad        = $request->capacidad;
        $producto->meta_descripcion = $request->meta_descripcion;
        $producto->meta_keywords    = $request->meta_keywords;
        $producto->destacado        = $request->destacado;
        $producto->categoria_id     = $request->categoria_id;
        $producto->orden            = $request->orden;
        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/productos/');
                $request->file('imagen')->move($path, $id . '_' . $file->getClientOriginalName());
                $producto->imagen = 'img/productos/' . $id . '_' . $file->getClientOriginalName();
            }
        }
        if ($request->hasFile('imagen_detalle')) {
            if ($request->file('imagen_detalle')->isValid()) {
                $file = $request->file('imagen_detalle');
                $path = public_path('img/productos/');
                $request->file('imagen_detalle')->move($path, $id . '_' . $file->getClientOriginalName());
                $producto->imagen_detalle = 'img/productos/' . $id . '_' . $file->getClientOriginalName();
            }
        }
        $producto->save();
        return redirect()->route('productos.index');
    }

    public function destroy($id)
    {
        $producto = producto::find($id);
        $producto->delete();
        return redirect()->route('productos.index');
    }

    //admin de imagenes
    public function imagenes($id)
    {
        $imagenes = Imgproducto::orderBy('id', 'ASC')->Where('producto_id', $id)->get();
        $producto = producto::find($id);
        return view('adm.productos.imagenes')->with(compact('imagenes', 'producto'));
    }

    public function nuevaimagen(Request $request, $id)
    {
        if ($request->HasFile('file')) {
            foreach ($request->file as $file) {
                $filename = $file->getClientOriginalName();
                $path     = public_path('img/producto/');
                $file->move($path, $id . '_' . $file->getClientOriginalName());
                $imagen              = new Imgproducto;
                $imagen->imagen      = 'img/producto/' . $id . '_' . $file->getClientOriginalName();
                $imagen->producto_id = $id;
                $imagen->save();
            }
        }
        $imagenes = Imgproducto::orderBy('id', 'ASC')->Where('producto_id', $id)->get();

        $producto = producto::find($id);
        return view('adm.productos.imagenes')->with(compact('imagenes', 'producto'));
    }

    public function destroyimg($id)
    {
        $imagen = Imgproducto::find($id);
        $idpro  = $imagen->producto_id;
        $imagen->delete();
        $imagenes = Imgproducto::orderBy('id', 'ASC')->Where('producto_id', $idpro)->get();

        $producto = producto::find($idpro);
        return view('adm.productos.imagenes')->with(compact('imagenes', 'producto'));
    }

}