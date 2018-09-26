<?php

namespace App\Http\Controllers\Adm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contenido_trabajo;

class ContenidotrabajoController extends Controller
{
    public function create()
    {
        $homes = Contenido_trabajo::all()->first();
        return redirect()->route('trabajo.edit', $homes->id);
    }

    public function edit($id)
    {
        $homes = Contenido_trabajo::find($id);
        return view('adm.trabajo.edit')
            ->with('homes', $homes);
    }

    public function update(Request $request, $id)
    {
        $homes              = Contenido_trabajo::find($id);
        $homes->contenido   = $request->contenido;
        $homes->update();

        return view('adm.dashboard');
    }
}
