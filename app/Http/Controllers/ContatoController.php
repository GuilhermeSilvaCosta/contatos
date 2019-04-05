<?php
namespace contatos\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;
use contatos\Contato;
use contatos\TipoTelefone;
use contatos\Http\Requests\ContatosRequest;
use Mail;

class ContatoController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function lista(){
        $contatos = Contato::all();
        return view('contato.listagem')->with('contatos', $contatos);
    }

    public function mostra(){
        $id = Request::route('id', '0');
        $res = Contato::find($id);
        $tiposTelefone = TipoTelefone::all();
        return view('contato.detalhes')->with(['c' => $res, 'tipos' => $tiposTelefone]);
    }

    public function novo(){
        $contato = new Contato();
        $contato->id = 0;        
        return view('contato.formulario')->with('c', $contato);
    }

    public function edita($id){
        $contato = Contato::find($id);        
        return view('contato.formulario')->with('c', $contato);
    }

    public function salva(ContatosRequest $request){
        $params = $request->all();
        if ($params['id'] == 0){
            $contato = new Contato($params);
            $contato->facebook = $contato->facebook ?? '';
            $contato->save();            
            Mail::raw('Bem vindo!', function($message) use($contato)
            {
                $message->subject('Contatos Laravel!');
                $message->to($contato->email);                
            });
        } else {
            $contatoOld = Contato::find($params['id']);
            $contatoOld->nome = $params['nome'];
            $contatoOld->email = $params['email'];
            $contatoOld->facebook = $params['facebook'] ?? '';
            $contatoOld->linkedin = $params['linkedin'] ?? '';
            $contatoOld->save();
        }

        return redirect('/')->withInput(Request::only('nome'));
    }

    public function remove($id){
        $contato = Contato::find($id);
        $contato->delete();
        return redirect()->action('ContatoController@lista');
    }
}