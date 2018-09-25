<?php

namespace App\Http\Controllers\Adm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Categoria_novedad;

class CategorianovedadesController extends Controller
{
    public function index()
    {
        $categorias = Categoria_novedad::orderBy('orden', 'ASC')->get();
        return view('adm.categoria_novedades.index', compact('categorias'));
    }

    public function create()
    {
        return view('adm.categoria_novedades.create');
    }

    public function store(Request $request)
    {

        $categoria              = new Categoria_novedad();
        $categoria->nombre      = $request->nombre;
        $categoria->orden       = $request->orden;
        $categoria->save();
        return redirect()->route('categorianovedades.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {

        $categoria  = Categoria_novedad::find($id);
        return view('adm.categoria_novedades.edit', compact('categoria'));
    }

    public function update(Request $request, $id)
    {
        $categoria = Categoria_novedad::find($id);
        $categoria->nombre = $request->nombre;
        $categoria->orden  = $request->orden;
        $categoria->update();
        return redirect()->route('categorianovedades.index');
    } 

    public function destroy($id)
    {
        $categoria = Categoria_novedad::find($id);
        $categoria->delete();
        return redirect()->route('categorianovedades.index');
    }
}
