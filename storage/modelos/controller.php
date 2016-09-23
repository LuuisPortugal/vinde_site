<?php

namespace App\Http\Controllers\Controle;

use Illuminate\Http\Request;

App\##Nome##;
use App\Http\Controllers\Controller;

class ##Nome##Controller extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $##nome##s = ##Nome##::orderBy('nome', 'asc')->get();
        return view('controle.##nome##.index', compact('##nome##s'));
    }

    /**
     * @param ##Nome##|null $##nome##
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function formulario(##Nome## $##nome##){
        $route = $##nome##->id ? ['controle.##nome##.editar', $##nome##] : ['controle.##nome##.salvar'];
        return view('controle.##nome##.formulario', compact(['##nome##', 'route']));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function salvar(Request $request)
{
    $input = $request->except('_token');

    if (##Nome##::create($input))
    return redirect()->route('controle.##nome##.visualizar')->with('error', false);
    return redirect()->route('controle.##nome##.formulario')->withInput()->with('error', true);
}

    /**
     * @param Request $request
     * @param ##Nome## $##nome##
     * @return \Illuminate\Http\RedirectResponse
     */
    public function editar(Request $request, ##Nome## $##nome##)
    {
        $input = $request->except('__token');

        if ($##nome##->update($input))
            return redirect()->route('controle.##nome##.visualizar')->with('error', false);
        return redirect()->route('controle.##nome##.formulario', $##nome##->id)->with('error', true);
    }


    /**
     * @param Request $request
     * @param ##Nome## $##nome##
     * @return \Illuminate\Http\RedirectResponse
     */
    public function excluir(##Nome## $##nome##)
{
    if ($##nome##->delete())
            return redirect()->route('controle.##nome##.visualizar')->with('error', false);
    return redirect()->route('controle.##nome##.visualizar')->with('error', true);
}

}
