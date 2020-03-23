<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class BaseController extends Controller
{

    protected $classe;

    public function index(Request $request)
    {
        return $this->classe::paginate();
    }

    public function store(Request $request)
    {
        return response()->json($this->classe::create($request->all()), 201);
    }

    public function show($id)
    {
        $recurso = $this->classe::find($id);
        if($recurso == ''){
            return response()->json('', 204);
        }else{
            return $recurso;
        }
    }

    public function update($id, Request $request)
    {
        $recurso = $this->classe::find($id);
        if($recurso == ''){
            return response()->json('Recurso não encontrado', 404);
        }else{
            $recurso->fill(["nome" => $request->nome]);
            $recurso->save();

            return $recurso;
        }
    }

    public function destroy($id)
    {
        $recurso = $this->classe::destroy($id);
        if($recurso === 0){
            return response()->json('Recurso não encontrado', 404);
        }else{
            return response()->json('', 204);
        }
    }
}
