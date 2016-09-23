<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(GrupoUsuarioTableSeeder::class);
        $this->call(UsuarioTableSeeder::class);
        $this->call(CategoriaTransacaoTableSeeder::class);
        $this->call(RotasTableSeeder::class);
        $this->call(PermissaoSeeder::class);
    }
}
