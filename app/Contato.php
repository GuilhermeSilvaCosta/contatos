<?php

namespace contatos;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    protected $fillable = array('nome',
        'email', 'facebook', 'linkedin');

    public function telefones(){
        return $this->hasMany(Telefone::class);
    }
}
