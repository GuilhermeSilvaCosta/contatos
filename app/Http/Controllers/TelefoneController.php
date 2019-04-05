<?php

namespace contatos\Http\Controllers;

use Request;
use contatos\Telefone;
use contatos\TipoTelefone;

class TelefoneController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function novo($id){
        $telefone = new Telefone();
        $telefone->id = 0;
        $telefone->contato_id = $id;
        $tipos = TipoTelefone::all();
        return view('telefone.formulario')->with(['t' => $telefone, 'tipos' => $tipos]);
    }

    public function edita($id) {
        $telefone = Telefone::find($id);
        $tipos = TipoTelefone::all();
        return view('telefone.formulario')->with(['t' => $telefone, 'tipos' => $tipos]);
    }

    public function salva(){
        $params = Request::all();
        if ($params['id'] == 0){
            $telefone = new Telefone();
            $telefone->telefone = $params['telefone'];
            $telefone->contato_id = $params['contato_id'];
            $telefone->tipo_id = $params['tipo_id'];
            $telefone->save();
        } else {
            $telefoneOld = Telefone::find($params['id']);
            $telefoneOld->telefone = $params['telefone'];
            $telefoneOld->tipo_id = $params['tipo_id'];
            $telefoneOld->save();
        }
        
        return redirect('/mostra/'.$params['contato_id']);
    }

    public function remove($id){
        $telefone = Telefone::find($id);        
        $telefone->delete();
        return redirect('/mostra/'.$telefone->contato_id);
    }
}
