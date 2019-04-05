<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ContatoTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(TipoTelefoneTableSeeder::class);
    }
}

class ContatoTableSeeder extends Seeder {
    public function run()
    {
        DB::insert('insert into contatos 
            (nome, email, facebook, linkedin) 
            values (?,?,?,?)',
            array('Guilherme',
                'tec.guilherme.dsc@gmail.com',
                'https://www.facebook.com/tec.guilherme.dsc',
                'https://www.linkedin.com/in/guilherme-costa-5621b461/'));
    }
}

class UserTableSeeder extends Seeder {
    public function run()
    {
        DB::insert("insert into users 
            (name, email, password, email_verified_at)
            values (?,?,?,current_date)",
            array('Guilherme',
                'tec.guilherme.dsc@gmail.com',
                Hash::make('12345678')));
    }
}

class TipoTelefoneTableSeeder extends Seeder {
    public function run()
    {
        DB::insert("insert into tipo_telefones 
            (tipo)
            values (?)",
            array('Residencial'));
        DB::insert("insert into tipo_telefones 
            (tipo)
            values (?)",
            array('Comercial'));
        DB::insert("insert into tipo_telefones 
            (tipo)
            values (?)",
            array('Celular'));
    }
}