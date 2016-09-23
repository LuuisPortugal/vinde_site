<?php

use App\Usuario;
use Illuminate\Database\Seeder;

class UsuarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::statement('TRUNCATE usuarios');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Usuario::create([
            'grupo_usuario_id' => 1,
            'nome' => 'Denny Augustus',
            'email' => 'dennysaug@gmail.com',
            'password' => bcrypt('root'),
            'cpf' => '986.152.972-15'
        ]);

        Usuario::create([
            'grupo_usuario_id' => 1,
            'nome' => 'Luis Enrique Portugal',
            'email' => 'luisenriquegomesportugal@gmail.com',
            'password' => bcrypt('root'),
            'cpf' => '024.522.612-54'
        ]);
    }
}
