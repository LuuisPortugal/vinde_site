<?php

use App\Permissao;
use App\Rotas;
use Illuminate\Database\Seeder;

class PermissaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissoes = Permissao::where('grupo_usuario_id', '<>', 1)->select('grupo_usuario_id', 'rota_id')->get()->toArray();

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::statement('TRUNCATE permissao');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        foreach ($permissoes as $permissao)
            Permissao::create($permissao);

        $rotas = Rotas::where('restrito', true)->get();
        foreach ($rotas as $rota) {
            Permissao::create([
                'grupo_usuario_id' => 1,
                'rota_id' => $rota->id
            ]);
        }
    }
}
