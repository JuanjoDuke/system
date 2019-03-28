<?php

namespace App\Http\Controllers;
//use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Categoria;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //if(!$request->ajax())return redirect('/');
        //return DB::table('categorias')->paginate(2); //si se borra no es necesario use Illuminate\Support\Facades\DB;
        //return Categoria::paginate(2);
        $categoria=Categoria::paginate(2);
        return[
            'pagination'=>[
                'total'     =>$categoria->total(),
                'current_page'     =>$categoria->currentPage(),
                'per_page'     =>$categoria->perPage(),
                'last_Page'     =>$categoria->lastPage(),
                'from'     =>$categoria->firstItem(),
                'to'     =>$categoria->lastItem(),
            ],
            'categorias' => $categoria
        ];
    }

   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$request->ajax())return redirect('/');
       $categoria=new Categoria();
       $categoria->fill($request->all());
       //$categoria->condicion='1';
       $categoria->save();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if(!$request->ajax())return redirect('/');
       $categoria=Categoria::findOrFail($request->id);
       $categoria->fill($request->all());
       $categoria->condicion='1';
       $categoria->save();
      /* $categoria->nombre = $request->nombre;
       $categoria->descripcion = $request->descripcion;
       $categoria->condicion='1';
       $categoria->save();
       */

    }
 /*   public function desactivar(Request $request)
    {
        $categoria=Categoria::findOrFail($request->id);
        $categoria->condicion='0';
        $categoria->save();
    }
    public function activar(Request $request)
    {
        $categoria=Categoria::findOrFail($request->id);
        $categoria->condicion='1';
        $categoria->save();
    }

    */
    public function cambiarCondicion(Request $request)
    {
        if(!$request->ajax())return redirect('/');
        $categoria=Categoria::findOrFail($request->id);
        $categoria->condicion = !$categoria->condicion;
        $categoria->save();
    }
  
}
