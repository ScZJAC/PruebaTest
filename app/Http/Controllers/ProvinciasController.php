<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provincia;
use Illuminate\Support\Facades\DB;

class ProvinciasController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 10;
        if (!empty($keyword)) {
            $provincias = Provincia::select('*')                                         
                ->where(function($query) use ($keyword){
                    $query->where('descripcion_provincia', 'LIKE', "%$keyword%");
                })                                     
                ->paginate($perPage);
        } else {
            $provincias = Provincia::select('*')                                                            
                ->paginate($perPage);
        }
        return view('provincias.index', ['provincias' => $provincias]);
    }

    public function create()
    {
        return view('provincias.create');
    }
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            Provincia::create([
                'descripcion_provincia' =>$request['nombre'] ,                                         
            ]);
            DB::commit();          
            return redirect()->route('provincias.create')->with('success','Categoría Registrada!');                    
        } catch (\Error $e) {
            DB::rollback();  
            return back()->with('fail',$e);            
        }
    }
    public function edit($id)
    {
        $provincia = Provincia::findOrFail($id);
        return view('provincias.edit',compact('provincia'));
    }
    public function update(Request $request, $id)
    {
        $provincia = Provincia::find($id);
        $provincia->descripcion_provincia = $request->nombre;
        $provincia->save();
        
        return redirect('/provincias/'.$id.'/edit')->with('success', 'Modificado exitosamente!');
    }
    public function eliminar($id)
    {
        $provincia = Provincia::findOrFail($id);
        $provincia->delete();
        return redirect('/provincias');
    }
}
