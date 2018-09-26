<?php

namespace App\Http\Controllers\Adm;

use Illuminate\Http\Request;
use App\Impresion;
use App\Http\Controllers\Controller;

class ImpresionesController extends Controller
{
    public function index()
    {
        $impresiones = Impresion::orderBy('id', 'ASC')->get();
        return view('adm.impresiones.index', compact('impresiones'));
    }

    public function create()
    {
        return view('adm.impresiones.create');
    }

    public function store(Request $request)
    {
        $impresion         = new Impresion();
        $impresion->titulo = $request->titulo;
        $impresion->descripcion = $request->descripcion;
        $impresion->imagen = $request->imagen;
        $impresion->orden  = $request->orden;
        $id              = Impresion::all()->max('id');
        $id++;
        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/impresion/imagen/');
                $request->file('imagen')->move($path, $id . '_' . $file->getClientOriginalName());
                $impresion->imagen = 'img/impresion/imagen/' . $id . '_' . $file->getClientOriginalName();
            }
        }
        $impresion->save();
        return redirect()->route('impresiones.index');
    }

    public function edit($id)
    {
        $impresion = Impresion::find($id);
        return view('adm.impresiones.edit', compact('impresion'));
    }

    public function update(Request $request, $id)
    {
        $impresion         = Impresion::find($id);
        $impresion->titulo = $request->titulo;
        $impresion->descripcion = $request->descripcion;
        $impresion->imagen = $request->imagen;
        $impresion->orden  = $request->orden;

        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/impresion/imagen/');
                $request->file('imagen')->move($path, $id . '_' . $file->getClientOriginalName());
                $impresion->imagen = 'img/impresion/imagen/' . $id . '_' . $file->getClientOriginalName();
            }
        }
        $impresion->save();
        return redirect()->route('impresiones.index');
    }

    public function destroy($id)
    {
        $impresion = Impresion::find($id);
        $impresion->delete();
        return redirect()->route('impresiones.index');
    }
}
