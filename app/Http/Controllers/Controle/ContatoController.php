<?php

namespace App\Http\Controllers\Controle;

use App\Contato;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContatoController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $contatos = Contato::orderBy('nome', 'asc')->get();
        return view('controle.contato.index', compact('contatos'));
    }

    /**
     * @param Contato|null $contato
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function formulario(Contato $contato)
    {
        $route = $contato->id ? ['controle.contato.editar', $contato] : ['controle.contato.salvar'];
        return view('controle.contato.formulario', compact(['contato', 'route']));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function salvar(Request $request)
    {
        $input = $request->except('_token');

        if (Contato::create($input))
            return redirect()->route('controle.contato.visualizar')->with('error', false);
        return redirect()->route('controle.contato.formulario')->withInput()->with('error', true);
    }

    /**
     * @param Request $request
     * @param Contato $contato
     * @return \Illuminate\Http\RedirectResponse
     */
    public function editar(Request $request, Contato $contato)
    {
        $input = $request->except('__token');

        if ($contato->update($input))
            return redirect()->route('controle.contato.visualizar')->with('error', false);
        return redirect()->route('controle.contato.formulario', $contato->id)->with('error', true);
    }


    /**
     * @param Request $request
     * @param Contato $contato
     * @return \Illuminate\Http\RedirectResponse
     */
    public function excluir(Contato $contato)
    {
        if ($contato->delete())
            return redirect()->route('controle.contato.visualizar')->with('error', false);
        return redirect()->route('controle.contato.visualizar')->with('error', true);
    }

}
