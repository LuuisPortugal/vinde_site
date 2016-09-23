<?php

namespace App\Http\Controllers\Controle;

use App\CategoriaTransacao;
use App\GrupoUsuario;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PermissaoController extends Controller
{

    public function index(GrupoUsuario $grupousuario)
    {
        $data = ['grupos'];
        $grupos = GrupoUsuario::all()->pluck('nome', 'id')->toArray();

        if ($grupousuario->getInstanceIfNotNull()) {
            $categoria_transacaos = CategoriaTransacao::orderBy('nome')->get();
            $permissao = array();
            foreach ($grupousuario->rotas as $rota)
                $permissao[] = $rota->nome;
            array_push($data, 'grupousuario', 'permissao', 'categoria_transacaos');
        }
        return view('controle.permissao.index', compact($data));
    }

    public function editar(Request $request, GrupoUsuario $grupousuario)
    {

        $permissao = $request->input('permissao', []);
        if ($grupousuario->getInstanceIfNotNull()) {
            if ($grupousuario->rotas()->sync($permissao)) {
                $permissao = array();
                foreach (Auth::user()->grupo_usuario->rotas as $rota)
                    $permissao[] = $rota->nome;
                session(['permissao' => $permissao]);
                return redirect()->route('controle.permissao.visualizar')->with('error', false);
            }
        }
        return redirect()->route('controle.permissao.visualizar', $grupousuario)->with('error', true);
    }
}
