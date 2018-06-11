<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use DB;

class ConsultasController extends Controller{

    public function consultas($token, $limit = 10, $order = 'asc'){
        if(TokensController::validateToken($token)){
            $resultado = DB::table('consulta')->orderBy('id', $order);
            return ResponseController::success($resultado->get());
        }else{
            return ResponseController::error(['message'=>'invalid token']);
        }
    }

    public function create(Request $request){
        $consulta = new Consulta;
        $consulta->funcionario_id = $request->funcionario_id;
        $consulta->data = $request->data;
        $consulta->hora = $request->hora;
        $consulta->paciente_id = $request->paciente_id;
        $consulta->save();
        return ResponseController::success();
    }

    public function edit($id, Request $request){
        $consulta = Consulta::findOrFail($id);
        $consulta->funcionario_id = $request->funcionario_id;
        $consulta->data = $request->data;
        $consulta->hora = $request->hora;
        $consulta->paciente_id = $request->paciente_id;
        $consulta->save();
        return ResponseController::success();
    }

    public function remove($id){
        $consulta = Consulta::findOrFail($id);
        $consulta->delete();
        return ResponseController::success();
    }
}
