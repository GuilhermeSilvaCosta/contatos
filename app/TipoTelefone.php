<?php

namespace contatos;

use Illuminate\Database\Eloquent\Model;

class TipoTelefone extends Model
{
    protected $fillable = array('tipo');
    public function telefones(){
        return $this->hasMany(Telefone::class);
    }
}
