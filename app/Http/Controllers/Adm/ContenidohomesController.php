<?php

namespace App\Http\Controllers\Adm;

use App\Contenido_home;
use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContenidohomesController extends Controller
{
    //'nombre', 'descripcion', 'contenido', 'imagen', 'link',

    public function create()
    {
        $homes = Contenido_home::all()->first();
        return redirect()->route('homes.edit', $homes->id);
    }

    public function edit($id)
    {
        $homes = Contenido_home::find($id);
        return view('adm.homes.edit')
            ->with('homes', $homes);
    }

    public function update(Request $request, $id)
    {
        $homes              = Contenido_home::find($id);
        $homes->nombre      = $request->nombre;
        $homes->descripcion = $request->descripcion;
        $homes->contenido   = $request->contenido;
        $homes->link        = $request->link;

        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/contenido_home/');
                $request->file('imagen')->move($path, $id . '_' . $file->getClientOriginalName());
                $homes->imagen = 'img/contenido_home/' . $id . '_' . $file->getClientOriginalName();
            }
        }
        $homes->update();

        return view('adm.dashboard');
    }

    public function sliderhome()
    {
        $slider = Slider::Where('seccion', 'home')->first();
        return redirect()->route('editarsliderhome', $slider->id);
    }

    public function editarsliderhome($id)
    {
        $slider = Slider::find($id);
        return view('adm.homes.editarslider')
            ->with('slider', $slider);
    }

}
