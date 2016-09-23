<?php

namespace App\Http\Controllers\Controle;

use App\Banner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use OwenIt\Auditing\AuditingTrait;


class BannerController extends Controller
{
    use AuditingTrait;

    public function index()
    {
        $this->verificaPermissao('banner.visualizar');
        $banners = Banner::orderBy('nome', 'asc')->get();

        return view('controle.banner.index', compact('banners'));
    }

    public function edit(Banner $banner = null)
    {
        $data = [];

        if (isset($banner->id)) {
            $this->verificaPermissao('banner.alterar');
            array_push($data, 'banner');
        } else {
            $this->verificaPermissao('banner.cadastrar');
        }

        return view('controle.banner.edit', compact($data));
    }

    public function salvar(Request $request, Banner $banner = null)
    {
        $input = $request->except('_token');

        if ($banner->id) {
            $this->verificaPermissao('banner.alterar');
            if ($banner->update($input)) {
                return redirect()->route('controle.banner.index')->with('error', false);
            }

        } else {
            $this->verificaPermissao('banner.cadastrar');
            $banner = Banner::create($input);
            return redirect()->route('controle.banner.index')->with('error', false);
        }

        if (!$banner->id) {
            return redirect()->back()->withInput()->with('error', true);
        }

    }

    public function excluir(Banner $banner)
    {
        $this->verificaPermissao('banner.excluir');

        if ($banner and $banner->delete()) {
            return redirect()->route('controle.banner.index')->with('error', false);
        }
        return redirect()->route('controle.banner.index')->with('error', true);
    }

}
