<?php

use App\Rotas;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RotasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::statement('TRUNCATE rotas');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $rotas = [
            [
                'nome' => 'default.visualizar',
                'metodo' => 'get',
                'url' => '/',
                'destino' => 'DefaultController@index',
                'restrito' => false
            ],
            [
                'nome' => 'auth.formulario',
                'metodo' => 'get',
                'url' => 'auth/formulario',
                'destino' => 'Auth\AuthController@formulario',
                'restrito' => false
            ],
            [
                'nome' => 'auth.login',
                'metodo' => 'post',
                'url' => 'auth/login',
                'destino' => 'Auth\AuthController@login',
                'restrito' => false
            ],
            [
                'nome' => 'auth.logout',
                'metodo' => 'get',
                'url' => 'auth/logout',
                'destino' => 'Auth\AuthController@logout',
                'restrito' => true
            ],
            [
                'nome' => 'controle.rota',
                'metodo' => 'get',
                'url' => 'controle/rota/{nome}',
                'destino' => 'Controle\HomeController@rota',
                'restrito' => true
            ],
            [
                'nome' => 'controle.home.visualizar',
                'metodo' => 'get',
                'url' => 'controle',
                'destino' => 'Controle\HomeController@index',
                'restrito' => true
            ],

            //Grupo de Usu�rios
            [
                'nome' => 'controle.grupousuario.visualizar',
                'metodo' => 'get',
                'url' => 'controle/grupousuario',
                'destino' => 'Controle\GrupoUsuarioController@index',
                'restrito' => true,
                'categoria_transacao_id' => 1
            ],
            [
                'nome' => 'controle.grupousuario.formulario',
                'metodo' => 'get',
                'url' => 'controle/grupousuario/formulario/{grupousuario?}',
                'destino' => 'Controle\GrupoUsuarioController@formulario',
                'restrito' => true,
                'categoria_transacao_id' => 1
            ],
            [
                'nome' => 'controle.grupousuario.salvar',
                'metodo' => 'post',
                'url' => 'controle/grupousuario/salvar',
                'destino' => 'Controle\GrupoUsuarioController@salvar',
                'restrito' => true,
                'categoria_transacao_id' => 1
            ],
            [
                'nome' => 'controle.grupousuario.editar',
                'metodo' => 'post',
                'url' => 'controle/grupousuario/editar/{grupousuario}',
                'destino' => 'Controle\GrupoUsuarioController@editar',
                'restrito' => true,
                'categoria_transacao_id' => 1
            ],
            [
                'nome' => 'controle.grupousuario.excluir',
                'metodo' => 'get',
                'url' => 'controle/grupousuario/excluir/{grupousuario}',
                'destino' => 'Controle\GrupoUsuarioController@excluir',
                'restrito' => true,
                'categoria_transacao_id' => 1
            ],

            //Usu�rios
            [
                'nome' => 'controle.usuario.visualizar',
                'metodo' => 'get',
                'url' => 'controle/usuario',
                'destino' => 'Controle\UsuarioController@index',
                'restrito' => true,
                'categoria_transacao_id' => 2
            ],
            [
                'nome' => 'controle.usuario.formulario',
                'metodo' => 'get',
                'url' => 'controle/usuario/formulario/{usuario?}',
                'destino' => 'Controle\UsuarioController@formulario',
                'restrito' => true,
                'categoria_transacao_id' => 2
            ],
            [
                'nome' => 'controle.usuario.salvar',
                'metodo' => 'post',
                'url' => 'controle/usuario/salvar',
                'destino' => 'Controle\UsuarioController@salvar',
                'restrito' => true,
                'categoria_transacao_id' => 2
            ],
            [
                'nome' => 'controle.usuario.editar',
                'metodo' => 'post',
                'url' => 'controle/usuario/editar/{usuario}',
                'destino' => 'Controle\UsuarioController@editar',
                'restrito' => true,
                'categoria_transacao_id' => 2
            ],
            [
                'nome' => 'controle.usuario.excluir',
                'metodo' => 'get',
                'url' => 'controle/usuario/excluir/{usuario}',
                'destino' => 'Controle\UsuarioController@excluir',
                'restrito' => true,
                'categoria_transacao_id' => 2
            ],

            //Permiss�es
            [
                'nome' => 'controle.permissao.visualizar',
                'metodo' => 'get',
                'url' => 'controle/permissao/{grupousuario?}',
                'destino' => 'Controle\PermissaoController@index',
                'restrito' => true,
                'categoria_transacao_id' => 3
            ],
            [
                'nome' => 'controle.permissao.editar',
                'metodo' => 'post',
                'url' => 'controle/permissao/editar/{grupousuario}',
                'destino' => 'Controle\PermissaoController@editar',
                'restrito' => true,
                'categoria_transacao_id' => 3
            ],

            //Log
            [
                'nome' => 'controle.log.visualizar',
                'metodo' => 'get',
                'url' => 'controle/log',
                'destino' => 'Controle\LogController@index',
                'restrito' => true,
                'categoria_transacao_id' => 4
            ],
            [
                'nome' => 'controle.log.formulario',
                'metodo' => 'get',
                'url' => 'controle/log/formulario/{log?}',
                'destino' => 'Controle\LogController@formulario',
                'restrito' => true,
                'categoria_transacao_id' => 4
            ],
            [
                'nome' => 'controle.log.salvar',
                'metodo' => 'post',
                'url' => 'controle/log/salvar',
                'destino' => 'Controle\LogController@salvar',
                'restrito' => true,
                'categoria_transacao_id' => 4
            ],
            [
                'nome' => 'controle.log.editar',
                'metodo' => 'post',
                'url' => 'controle/log/editar/{log}',
                'destino' => 'Controle\LogController@editar',
                'restrito' => true,
                'categoria_transacao_id' => 4
            ],
            [
                'nome' => 'controle.log.excluir',
                'metodo' => 'get',
                'url' => 'controle/log/excluir/{log}',
                'destino' => 'Controle\LogController@excluir',
                'restrito' => true,
                'categoria_transacao_id' => 4
            ],

            //Contato
            [
                'nome' => 'controle.contato.visualizar',
                'metodo' => 'get',
                'url' => 'controle/contato',
                'destino' => 'Controle\ContatoController@index',
                'restrito' => true,
                'categoria_transacao_id' => 5
            ],
            [
                'nome' => 'controle.contato.formulario',
                'metodo' => 'get',
                'url' => 'ccontrole/contato/formulario/{contato?}',
                'destino' => 'Controle\ContatoController@formulario',
                'restrito' => true,
                'categoria_transacao_id' => 5
            ],
            [
                'nome' => 'controle.contato.salvar',
                'metodo' => 'post',
                'url' => 'controle/contato/salvar',
                'destino' => 'Controle\ContatoController@salvar',
                'restrito' => true,
                'categoria_transacao_id' => 5
            ],
            [
                'nome' => 'controle.contato.editar',
                'metodo' => 'post',
                'url' => 'controle/contato/editar/{contato}',
                'destino' => 'Controle\ContatoController@editar',
                'restrito' => true,
                'categoria_transacao_id' => 5
            ],
            [
                'nome' => 'controle.contato.excluir',
                'metodo' => 'get',
                'url' => 'controle/contato/excluir/{contato}',
                'destino' => 'Controle\ContatoController@excluir',
                'restrito' => true,
                'categoria_transacao_id' => 5
            ],

            //Galeria
            [
                'nome' => 'controle.galeria.visualizar',
                'metodo' => 'get',
                'url' => 'controle/galeria',
                'destino' => 'Controle\GaleriaController@index',
                'restrito' => true,
                'categoria_transacao_id' => 6
            ],
            [
                'nome' => 'controle.galeria.formulario',
                'metodo' => 'get',
                'url' => 'controle/galeria/formulario/{galeria?}',
                'destino' => 'Controle\GaleriaController@formulario',
                'restrito' => true,
                'categoria_transacao_id' => 6
            ],
            [
                'nome' => 'controle.galeria.salvar',
                'metodo' => 'post',
                'url' => 'controle/galeria/salvar',
                'destino' => 'Controle\GaleriaController@salvar',
                'restrito' => true,
                'categoria_transacao_id' => 6
            ],
            [
                'nome' => 'controle.galeria.editar',
                'metodo' => 'post',
                'url' => 'controle/galeria/editar/{galeria}',
                'destino' => 'Controle\GaleriaController@editar',
                'restrito' => true,
                'categoria_transacao_id' => 6
            ],
            [
                'nome' => 'controle.galeria.excluir',
                'metodo' => 'get',
                'url' => 'controle/galeria/excluir/{galeria}',
                'destino' => 'Controle\GaleriaController@excluir',
                'restrito' => true,
                'categoria_transacao_id' => 6
            ],

            //Ger�ncia de Fotos
            [
                'nome' => 'controle.gerenciarfotos.visualizar',
                'metodo' => 'get',
                'url' => 'controle/gerenciarfotos',
                'destino' => 'Controle\GaleriaController@index',
                'restrito' => true,
                'categoria_transacao_id' => 7
            ],
            [
                'nome' => 'controle.gerenciarfotos.formulario',
                'metodo' => 'get',
                'url' => 'controle/gerenciarfotos/formulario/{gerenciarfotos?}',
                'destino' => 'Controle\GaleriaController@formulario',
                'restrito' => true,
                'categoria_transacao_id' => 7
            ],
            [
                'nome' => 'controle.gerenciarfotos.salvar',
                'metodo' => 'post',
                'url' => 'controle/gerenciarfotos/salvar',
                'destino' => 'Controle\GaleriaController@salvar',
                'restrito' => true,
                'categoria_transacao_id' => 7
            ],
            [
                'nome' => 'controle.gerenciarfotos.editar',
                'metodo' => 'post',
                'url' => 'controle/gerenciarfotos/editar/{gerenciarfotos}',
                'destino' => 'Controle\GaleriaController@editar',
                'restrito' => true,
                'categoria_transacao_id' => 7
            ],
            [
                'nome' => 'controle.gerenciarfotos.excluir',
                'metodo' => 'get',
                'url' => 'controle/gerenciarfotos/excluir/{gerenciarfotos}',
                'destino' => 'Controle\GaleriaController@excluir',
                'restrito' => true,
                'categoria_transacao_id' => 7
            ],

            //Banner
            [
                'nome' => 'controle.banner.visualizar',
                'metodo' => 'get',
                'url' => 'controle/banner',
                'destino' => 'Controle\BannerController@index',
                'restrito' => true,
                'categoria_transacao_id' => 8
            ],
            [
                'nome' => 'controle.banner.formulario',
                'metodo' => 'get',
                'url' => 'controle/banner/formulario/{banner?}',
                'destino' => 'Controle\BannerController@formulario',
                'restrito' => true,
                'categoria_transacao_id' => 8
            ],
            [
                'nome' => 'controle.banner.salvar',
                'metodo' => 'post',
                'url' => 'controle/banner/salvar',
                'destino' => 'Controle\BannerController@salvar',
                'restrito' => true,
                'categoria_transacao_id' => 8
            ],
            [
                'nome' => 'controle.banner.editar',
                'metodo' => 'post',
                'url' => 'controle/banner/editar/{banner}',
                'destino' => 'Controle\BannerController@editar',
                'restrito' => true,
                'categoria_transacao_id' => 8
            ],
            [
                'nome' => 'controle.banner.excluir',
                'metodo' => 'get',
                'url' => 'controle/banner/excluir/{banner}',
                'destino' => 'Controle\BannerController@excluir',
                'restrito' => true,
                'categoria_transacao_id' => 8
            ]##NOVASROTAS##
        ];

        foreach ($rotas as $rota) {
            Rotas::create($rota);
        }
    }
}
