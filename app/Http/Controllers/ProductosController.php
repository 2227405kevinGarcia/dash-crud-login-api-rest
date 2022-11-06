<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();
        return view('producto.index')->with('productos',$productos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('producto.create', compact('categorias'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $productos = new Producto();
        $productos->nombre = $request->get('nombre');
        $productos->caracteristica = $request->get('caracteristica');
        $productos->genero = $request->get('genero');
        $productos->stock = $request->get('stock');
        $productos->precio = $request->get('precio');
        $productos->categoria_id = $request->get('categoria_id');
        $productos->imagen = $request->get('imagen');
        $productos->save();

        return redirect('/productos');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);

        if ($producto == null) {
            return redirect()->route('productos');
        }

        $categorias = Categoria::all();
        return view('producto.edit', compact('producto', 'categorias'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $producto = Producto::find($id);
        $producto->nombre = $request->get('nombre');
        $producto->caracteristica = $request->get('caracteristica');
        $producto->genero = $request->get('genero');
        $producto->stock = $request->get('stock');
        $producto->precio = $request->get('precio');
        $producto->imagen = $request->get('imagen');
        $producto->categoria_id = $request->get('categoria_id');
        $producto->save();

        return redirect('/productos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::find($id);        
        $producto->delete();

        return redirect('/productos');

    }
}
