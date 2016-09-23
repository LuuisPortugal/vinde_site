<?php

namespace App\Http\Controllers\Controle;

use App\GrupoUsuario;
use App\Http\Controllers\Controller;
use App\Http\Requests\Controle\UsuarioRequest;
use App\Usuario;


class UsuarioController extends Controller
{

    public function index()
    {
        $usuarios = Usuario::orderBy('nome', 'asc')->get();
        return view('controle.usuario.index', compact('usuarios'));
    }

    function formulario(Usuario $usuario)
    {
        $route = $usuario->getInstanceIfNotNull() ? ['controle.usuario.editar', $usuario] : ['controle.usuario.salvar'];
        $grupos = $grupos = GrupoUsuario::orderBy('nome', 'asc')->get()->lists('nome', 'id')->toArray();
        return view('controle.usuario.formulario', compact(['usuario', 'route', 'grupos']));
    }

    public function salvar(UsuarioRequest $request)
    {
        $input = $request->except('_token');

        if (Usuario::create($input))
            return redirect()->route('controle.usuario.visualizar')->with('error', false);
        return redirect()->route('controle.usuario.formulario')->withInput()->with('error', true);
    }

    public function editar(UsuarioRequest $request, Usuario $usuario)
    {
        $input = $request->except('__token');

        if ($usuario->update($input))
            return redirect()->route('controle.usuario.visualizar')->with('error', false);
        return redirect()->route('controle.usuario.formulario', $usuario->id)->with('error', true);
    }

    public function excluir(Usuario $usuario)
    {
        if ($usuario->delete())
            return redirect()->route('controle.usuario.visualizar')->with('error', false);
        return redirect()->route('controle.usuario.visualizars')->with('error', true);
    }
}
