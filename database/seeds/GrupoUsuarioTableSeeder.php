<?php

use App\GrupoUsuario;
use Illuminate\Database\Seeder;

class GrupoUsuarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::statement('TRUNCATE grupo_usuarios');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        GrupoUsuario::create([
            'nome' => 'Desenvolvedor',
            'texto' => 'Todas as permissões do sistemas liberadas'
        ]);

        GrupoUsuario::create([
            'nome' => 'Adminstrador',
            'texto' => 'Permissões de gerência do sistemas liberadas'
        ]);
    }
}
