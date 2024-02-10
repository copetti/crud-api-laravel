<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;


class EmpresaController extends Controller
{
    public function index()
    {
        $empresas = Empresa::get();

        return response()->json($empresas, 200, [], JSON_PRETTY_PRINT);
    }

    public function show(Empresa $empresa)
    {
        if($empresa){
            return response()->json($empresa, 200, [], JSON_PRETTY_PRINT);
        }
    }

    public function edit($recnum)
    {
        $empresa = Empresa::find($recnum);

        if($empresa){
            return response()->json($empresa, 200, [], JSON_PRETTY_PRINT);
        }

        return response()->json([], 404);
    }

    public function store(Request $request)
    {
        $empresa = $request->all();

        Empresa::create($empresa);

        return response()->json([], 200, [], JSON_PRETTY_PRINT);
    }

    public function update($recnum, Request $request)
    {

        $empresa = Empresa::find($recnum);

        if($empresa){

            $input = $request->all();

            $empresa['sigla'] = $input['sigla'];
            $empresa['razao_social'] = $input['razao_social'];
            $empresa->save();

            return response()->json([], 200, [], JSON_PRETTY_PRINT);
        }

        return response()->json([], 404);
    }

    public function destroy($recnum)
    {
        $empresa = Empresa::find($recnum);

        if($empresa){

            $empresa->delete();

            return response()->json([], 200, [], JSON_PRETTY_PRINT);
        }

        return response()->json([], 404);
    }

}
