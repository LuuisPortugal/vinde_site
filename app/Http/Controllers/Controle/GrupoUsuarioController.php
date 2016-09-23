<?php

namespace App\Http\Controllers\Controle;

use App\GrupoUsuario;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GrupoUsuarioController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $gruposusuario = GrupoUsuario::orderBy('nome', 'asc')->get();
        return view('controle.grupousuario.index', compact('gruposusuario'));
    }

    /**
     * @param GrupoUsuario|null $grupoUsuario
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function formulario(GrupoUsuario $grupousuario)
    {
        $route = $grupousuario->id ? ['controle.grupousuario.editar', $grupousuario] : ['controle.grupousuario.salvar'];
        return view('controle.grupousuario.formulario', compact(['grupousuario', 'route']));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function salvar(Request $request)
    {
        $input = $request->except('_token');

        if (GrupoUsuario::create($input))
            return redirect()->route('controle.grupousuario.visualizar')->with('error', false);
        return redirect()->route('controle.grupousuario.formulario')->withInput()->with('error', true);
    }

    /**
     * @param Request $request
     * @param GrupoUsuario $grupoUsuario
     * @return \Illuminate\Http\RedirectResponse
     */
    public function editar(Request $request, GrupoUsuario $grupousuario)
    {
        $input = $request->except('__token');

        if ($grupousuario->update($input))
            return redirect()->route('controle.grupousuario.visualizar')->with('error', false);
        return redirect()->route('controle.grupousuario.formulario', $grupousuario->id)->with('error', true);
    }


    /**
     * @param Request $request
     * @param GrupoUsuario $grupoUsuario
     * @return \Illuminate\Http\RedirectResponse
     */
    public function excluir(GrupoUsuario $grupousuario)
    {
        if ($grupousuario->delete())
            return redirect()->route('controle.grupousuario.visualizar')->with('error', false);
        return redirect()->route('controle.grupousuario.visualizar')->with('error', true);
    }

}
