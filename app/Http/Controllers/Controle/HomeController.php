<?php

namespace App\Http\Controllers\Controle;

use App\CategoriaTransacao;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    public function index()
    {
        return view('controle.home.index');
    }

    public function rota($nome)
    {
        //Da Permissão as Pastas
        chmod(app_path('Http/Controllers/Controle'), 0777);
        chmod(database_path('seeds/'), 0777);
        chmod(database_path('migrations/'), 0777);

        //Cria Categoria
        $ordem = CategoriaTransacao::whereNotNull('slug')->count();
        $indice = CategoriaTransacao::count();
        $modelo_categoria = ",\n\t\t\t['id' => " . ($indice + 1) . ", 'nome' => '" . ucfirst($nome) . "', 'ordem' => " . ($ordem + 1) . ",'slug' => 'controle." . strtolower($nome) . ".visualizar']##NOVACATEGORIATRANSACAO##";
        $categoria_transacao_php = file_get_contents(database_path('seeds/') . "CategoriaTransacaoTableSeeder.php");

        $categoria_transacao_php = str_replace('##NOVACATEGORIATRANSACAO##', $modelo_categoria, $categoria_transacao_php);
        File::put(database_path('seeds/') . "CategoriaTransacaoTableSeeder.php", $categoria_transacao_php);
        Artisan::call('db:seed', ['--class' => 'CategoriaTransacaoTableSeeder']);

        // Cria Rota
        $search = ['##NOME##', '##Nome##', '##nome##', '##CATEGORIATRANSACAO##'];
        $replace = [strtoupper($nome), ucfirst($nome), strtolower($nome), ($indice + 1)];

        $modelo_rota = file_get_contents(storage_path('modelos/') . 'rotas.php');
        $routes_php = file_get_contents(database_path('seeds/') . "RotasTableSeeder.php");

        $modelo_rota = str_replace($search, $replace, $modelo_rota);
        $routes_php = str_replace('##NOVASROTAS##', $modelo_rota, $routes_php);

        File::put(database_path('seeds/') . "RotasTableSeeder.php", $routes_php);
        Artisan::call('db:seed', ['--class' => 'RotasTableSeeder']);
        Artisan::call('db:seed', ['--class' => 'PermissaoSeeder']);

        // Cria Model e Controller
        Artisan::call('make:model', ['name' => ucfirst($nome), '-m' => true]);

        $controller = file_get_contents(storage_path('modelos/') . 'controller.php');
        $controller = str_replace($search, $replace, $controller);
        File::put(app_path('Http/Controllers/Controle/') . ucfirst($nome) . 'Controller.php', $controller);

        // Renova as Permissões
        $permissao = array();
        foreach (Auth::user()->grupo_usuario->rotas as $rota)
            $permissao[] = $rota->nome;
        session(['permissao' => $permissao]);

        return redirect()->route('controle.home.visualizar');
    }
}
