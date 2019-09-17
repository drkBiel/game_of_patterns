<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
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
        $this->call('UsersTableSeeder');
    }
}

class UsersTableSeeder extends Seeder{
    public function run()    {
        // $this->call(UsersTableSeeder::class);
        DB::insert('insert into users (name,email,tipoUsuario,pontuacao,tempTotal,senha)
        values (?,?,?,?,?,?)',
        array('Joana','joana@gmail.com',1,0,0,bcrypt('321')));
    }
}