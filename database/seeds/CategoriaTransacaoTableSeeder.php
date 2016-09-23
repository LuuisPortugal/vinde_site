<?php

use App\CategoriaTransacao;
use Illuminate\Database\Seeder;

class CategoriaTransacaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::statement('TRUNCATE categoria_transacaos');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $categorias = [
            ['id' => 1, 'nome' => 'Grupo de Usuário'],
            ['id' => 2, 'nome' => 'Usuário'],
            ['id' => 3, 'nome' => 'Permissão'],
            ['id' => 4, 'nome' => 'Log'],
            ['id' => 5, 'nome' => 'Contato', 'ordem' => 1, 'slug' => 'controle.contato.visualizar'],
            ['id' => 6, 'nome' => 'Galeria', 'ordem' => 2, 'slug' => 'controle.galeria.visualizar'],
            ['id' => 7, 'nome' => 'Gerência de fotos', 'ordem' => 3, 'slug' => 'controle.galeria.visualizar'],
            ['id' => 8, 'nome' => 'Banner', 'ordem' => 4, 'slug' => 'controle.banner.visualizar']##NOVACATEGORIATRANSACAO##
        ];

        foreach ($categorias as $categoria) {
            CategoriaTransacao::create($categoria);
        }
    }
}
