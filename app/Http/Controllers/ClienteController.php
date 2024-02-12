<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::get();

        if($clientes){
            return response()->json($clientes, 200, [], JSON_PRETTY_PRINT);
        }

        return response()->json([], 404);
    }

    public function show(Cliente $cliente)
    {
        if($cliente){
            return response()->json($cliente, 200, [], JSON_PRETTY_PRINT);
        }

        return response()->json([], 404);
    }

    public function edit($recnum)
    {
        $cliente = Cliente::find($recnum);

        if($cliente){
            return response()->json($cliente, 200, [], JSON_PRETTY_PRINT);
        }

        return response()->json([], 404);
    }

    public function store(Request $request)
    {
        $cliente = $request->all();

        Cliente::create($cliente);

        return response()->json([], 200, [], JSON_PRETTY_PRINT);
    }

    public function update($recnum, Request $request)
    {
        $cliente = Cliente::find($recnum);

        if($cliente){

            $input = $request->all();

            $cliente['codigo'] = $input['codigo'];
            $cliente['razao_social'] = $input['razao_social'];
            $cliente['tipo'] = $input['tipo'];
            $cliente['cpf_cnpj'] = $input['cpf_cnpj'];

            $cliente->save();

            return response()->json([], 200, [], JSON_PRETTY_PRINT);
        }

        return response()->json([], 404);
    }

    public function destroy($recnum)
    {
        $cliente = Cliente::find($recnum);

        if($cliente){

            $cliente->delete();

            return response()->json([], 200, [], JSON_PRETTY_PRINT);
        }

        return response()->json([], 404);
    }
}
