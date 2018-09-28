<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */
// PAGINAS
Route::get('/', 'PaginasController@home')->name('inicio');

//PRODUCTOS FILTRADOS POR CATEGORIAS
Route::get('productos/{id}', 'PaginasController@productos')->name('productos');

//INFO DE PRODUCTO
Route::get('productoinfo/{id}', 'PaginasController@productoinfo')->name('productoinfo');

/*******************ADMIN************************/
Route::prefix('adm')->group(function () {

    Route::get('/', 'Adm\AdminController@dashboard')->name('dashboard');

    /*------------BANNERS----------------*/
    Route::resource('banners', 'Adm\BannersController');

    /*------------SISTEMAS----------------*/
    Route::resource('categorias', 'Adm\CategoriasController');

    /*------------PRODUCTOS----------------*/
    Route::resource('productos', 'Adm\ProductosController');
    /*------------Imagen----------------*/
    Route::get('producto/{producto_id}/imagenes/', 'Adm\ProductosController@imagenes')->name('imgproducto.lista'); //index del modulo imagenes
    //agregar nuevas imagenes de productos
    Route::post('producto/nuevaimagen/{id}', 'Adm\ProductosController@nuevaimagen')->name('imgproducto.nueva'); //es el store de las imagenes
    Route::delete('imgproducto/{id}/destroy', [
        'uses' => 'Adm\ProductosController@destroyimg',
        'as'   => 'imgproducto.destroy',
    ]);

    /*------------CATEGORIA NOVEDADES----------------*/
    Route::resource('categorianovedades', 'Adm\CategorianovedadesController');

    /*------------NOVEDADES----------------*/
    Route::resource('novedades', 'Adm\NovedadesController');

    /*------------Imagen----------------*/
    Route::get('novedad/{novedad_id}/imagenes/', 'Adm\NovedadesController@imagenes')->name('imgnovedad.lista'); //index del modulo imagenes
    //agregar nuevas imagenes de productos
    Route::post('novedad/nuevaimagen/{id}', 'Adm\NovedadesController@nuevaimagen')->name('imgnovedad.nueva'); //es el store de las imagenes
    Route::delete('imgnovedad/{id}/destroy', [
        'uses' => 'Adm\NovedadesController@destroyimg',
        'as'   => 'imgnovedad.destroy',
    ]);

    /*------------EMPRESAS----------------*/
    Route::resource('empresas', 'Adm\EmpresasController');

    /*------------SERVICIOS----------------*/
    Route::resource('servicios', 'Adm\ServiciosController');

    /*------------DATOS----------------*/
    Route::resource('datos', 'Adm\DatosController');

    /*------------METADATOS----------------*/
    Route::resource('metadatos', 'Adm\MetadatosController');  
    
    /*------------SECCION TRABAJO----------------*/
    Route::resource('trabajo', 'Adm\ContenidotrabajoController');

    /*------------CONTENIDO HOMES----------------*/
    Route::resource('homes', 'Adm\ContenidohomesController');

    /*------------SLIDERS----------------*/
    Route::resource('sliders', 'Adm\SlidersController');

    /*------------HOME SLIDERS----------------*/
    Route::get('sliderhome', 'Adm\ContenidohomesController@sliderhome')->name('sliderhome');
    Route::get('editarsliderhome/{id}', 'Adm\ContenidohomesController@editarsliderhome')->name('editarsliderhome');

    /*------------IMPRESIONES----------------*/
    Route::resource('impresiones', 'Adm\ImpresionesController');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
