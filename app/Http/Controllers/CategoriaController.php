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
        if (!$request->ajax()) return redirect('/');
        
        $buscar = $request->buscar;
        $criterio = $request->criterio;
        if ($buscar==''){
            $categorias = Categoria::orderBy('id', 'desc')->paginate(2);
        }
        else{
            $categorias = Categoria::where($criterio, 'like', '%'. $buscar . '%')->orderBy('id', 'desc')->paginate(3);
        }
        return [
            'pagination' => [
                'total'        => $categorias->total(),
                'current_page' => $categorias->currentPage(),
                'per_page'     => $categorias->perPage(),
                'last_page'    => $categorias->lastPage(),
                'from'         => $categorias->firstItem(),
                'to'           => $categorias->lastItem(),
            ],
            'categorias' => $categorias
        ];
    }

    public function selectCategoria(Request $request){
        if (!$request->ajax()) return redirect('/');
        $categorias = Categoria::where('condicion','=','1')
        ->select('id','nombre')->orderBy('nombre', 'asc')->get();
        return ['categorias' => $categorias];
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
