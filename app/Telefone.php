<?php

namespace contatos;

use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{

    protected $fillable = array('telefone, contato_id');

    public function contato()
    {
        return $this->belongsTo(Contato::class);
    }

    public function tipoTelefones()
    {
        return $this->belongsTo('contatos\TipoTelefone', 'foreign_key', 'tipo_id');
    }
}
