<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\Dato;
use App\Producto;
use App\Banner;
use App\Servicio;
use App\Empresa;
use App\Impresion;
use App\Contenido_trabajo;
use App\Contenido_home;
use Illuminate\Support\Facades\Mail;
use App\Imgempresa;
use App\Categoria;
use App\Destacado_home;

class PaginasController extends Controller
{
    public function home()
    {
        $activo    = 'home';
        $sliders   = Slider::orderBy('orden', 'ASC')->Where('seccion', 'home')->get();
        $productos = Producto::OrderBy('orden', 'ASC')->Where('destacado', 1)->get();
        $home = Contenido_home::all()->first();
        return view('pages.home', compact('sliders','home', 'activo', 'productos', 'ready', 'destacados', 'categorias'));
    }

    public function servicios()
    {
        $activo = 'trabajos';
        $banner = Banner::Where('seccion', 'trabajos')->first();
        $contenido = Contenido_trabajo::all()->first();
        $servicios = Servicio::OrderBy('orden', 'ASC')->get();
        return view('pages.trabajos', compact('banner', 'sliders', 'servicios', 'activo', 'contenido'));
    }

    public function impresion()
    {
        $activo = 'impresion';
        $banner = Banner::Where('seccion', 'impresion')->first();
        $items = Impresion::OrderBy('orden', 'ASC')->get();
        return view('pages.impresion', compact('banner', 'activo', 'items'));
    }

    public function contacto()
    {
        $activo = 'contacto';
        return view('pages.contacto', compact('activo'));
    }

    public function enviarmailcontacto(Request $request)
    {
        $activo   = 'contacto';
        $dato     = Dato::where('tipo', 'mail')->first();
        $nombre   = $request->nombre;
        $telefono = $request->telefono;
        $apellido  = $request->apellido;
        $email    = $request->email;
        $mensaje  = $request->mensaje;
       //     dd($producto);
        Mail::send('pages.emails.contactomail', ['nombre' => $nombre, 'telefono' => $telefono, 'apellido' => $apellido, 'email' => $email, 'mensaje' => $mensaje], function ($message){

            $dato = Dato::where('tipo', 'email')->first();
            $message->from('info@aberturastolosa.com.ar', 'CRISTALMAM');

            $message->to($dato->descripcion);

            //Add a subject
            $message->subject('Consulta desde web');

        });
        if (Mail::failures()) {
            return view('pages.contacto', compact('activo'));
        }
        return back();
    }
    
    public function empresa()
    {
        $activo    = 'empresa';
        $empresa = Empresa::all()->first();
        $banner = Banner::Where('seccion', 'quienes')->first();
        return view('pages.empresa', compact('empresa', 'activo', 'banner'));
    }

    public function productos($id)
    {
        $activo        = 'productos';
        $cat    = Categoria::find($id);
        $categorias     = Categoria::orderBy('orden', 'ASC')->get();
        $productos     = Producto::orderBy('orden', 'ASC')->Where('categoria_id', $id)->get();

        return view('pages.productos', compact('categorias', 'cat', 'productos', 'activo'));
    }

    public function productoinfo($id)
    {
        $activo        = 'productos';
        $p     = Producto::find($id);
        $categoria = Categoria::find($p->categoria_id);
        $cat = $categoria->id;
       // dd($cat);
        $categorias     = Categoria::orderBy('orden', 'ASC')->get();
        $productos     = Producto::OrderBy('orden', 'ASC')->Where('categoria_id', $categoria->id)->get();

        return view('pages.productoinfo', compact('categoria','categorias' ,'productos', 'activo', 'p', 'cat'));
    }

    public function quiero()
    {
        //return ($producto);
        $activo = 'quiero';
        $empresa = Contenido_quiero::all()->first();
        $banner = Banner::Where('seccion', 'quiero')->first();
        return view('pages.quiero', compact('activo', 'banner', 'empresa'));
    }

    public function enviarmailquiero(Request $request)
    {
        $activo   = 'contacto';
        $dato     = Dato::where('tipo', 'mail')->first();
        $nombre   = $request->nombre;
        $telefono = $request->telefono;
        $empresa  = $request->empresa;
        $email    = $request->email;
        $localidad  = $request->localidad;
        $provincia  = $request->provincia;
        $banner = Banner::Where('seccion', 'quiero')->first();
       //     dd($producto);
        Mail::send('pages.emails.quieromail', ['nombre' => $nombre, 'telefono' => $telefono, 'empresa' => $empresa, 'email' => $email, 'localidad' => $localidad, 'provincia' => $provincia], function ($message){

            $dato = Dato::where('tipo', 'email')->first();
            $message->from('info@aberturastolosa.com.ar', 'VLM - Quiero ser distribuidor');

            $message->to($dato->descripcion);

            //Add a subject
            $message->subject('Consulta desde web');

        });
        if (Mail::failures()) {
            return view('pages.quiero', compact('activo', 'banner'));
        }
        return view('pages.quiero', compact('activo', 'banner'));
    }

    public function buscar(Request $request)
    {

        $busqueda = $request->nombre;

        $busca = 1;
        $ready = 0;
        //$metadatos = Metadato::where('section','buscar')->get();
        $activo        = 'productos';
        $todos = 'si';
        $categoria     = Categoria::find(2);

        $productos = Producto::where('nombre', 'like', '%' . $busqueda . '%')->get();
        $todos         = Producto::where('nombre', 'like', '%' . $busqueda . '%')->get();
        $ready = 0;

        return view('pages.busqueda', compact('categorias', 'subcategorias', 'productos', 'productos_directos', 'activo', 'todos', 'ready', 'categoria', 'activo'));

    }
}
