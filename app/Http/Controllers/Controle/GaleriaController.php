<?php

namespace App\Http\Controllers\Controle;

use App\Galeria;
use App\Http\Controllers\Controller;
use App\ImagemGaleria;
use App\Upload;
use Illuminate\Http\Request;


class GaleriaController extends Controller
{
    public function __construct()
    {
        $this->destino = [
            'caminho' => storage_path() . '/data/galeria/', ##criar pasta se tiver upload
            'resolucao' => [0 => [150, 150], 1 => [500, 500], 2 => [800, 800]],
        ];
    }

    public function index()
    {
        $this->verificaPermissao('galeria.visualizar');
        $galerias = Galeria::orderBy('nome', 'asc')->get();

        return view('controle.galeria.index', compact('galerias'));
    }

    public function edit(Galeria $galeria = null)
    {
        $data = [];

        if (isset($galeria->id)) {
            $this->verificaPermissao('galeria.alterar');
            array_push($data, 'galeria');
        } else {
            $this->verificaPermissao('galeria.cadastrar');
        }

        return view('controle.galeria.edit', compact($data));
    }

    public function salvar(Request $request, Galeria $galeria = null)
    {
        $input = $request->except('_token');

        if ($galeria->id) {
            $this->verificaPermissao('galeria.alterar');
            if ($galeria->update($input)) {
                return redirect()->route('controle.galeria.index')->with('error', false);
            }

        } else {
            $this->verificaPermissao('galeria.cadastrar');
            $galeria = Galeria::create($input);
            return redirect()->route('controle.galeria.index')->with('error', false);
        }

        if (!$galeria->id) {
            return redirect()->back()->withInput()->with('error', true);
        }

    }

    public function imagens(Galeria $galeria)
    {
        return view('controle.galeria.imagens', compact('galeria'));
    }

    public function upload(Request $request, Veiculo $veiculo)
    {
        $input = $request->except('_token');
        $imagem = $request->file('imagem');

        if (isset($imagem) && count($imagem)) {
            $background = '100, 100, 100, 0';
            $input['nome'] = Upload::salva($imagem, $this->destino, true, $background);
            ImagemGaleria::create($input);
        }

        echo json_encode(['success' => true]);
        exit;
    }

    public function destaque(Request $request)
    {
        $input = $request->except('_token');
        $imagem = VeiculoImagem::find($input['id']);
        VeiculoImagem::where('veiculo_id', $imagem->veiculo_id)->update(['destaque' => 0]);
        $imagem->update($input);
        exit;
    }

    public function legenda(Request $request)
    {
        $input = $request->except('_token');
        $response['success'] = true;
        try {
            $imagem = VeiculoImagem::find($input['id'])->update(['legenda' => $input['legenda']]);
        } catch (\Exception $e) {
            $response['success'] = false;
        }
        echo json_encode($response);
        exit;
    }

    public function excluirImagem(VeiculoImagem $imagem)
    {
        $this->verificaPermissao('veiculo.excluir');

        $imagemAntiga = $imagem->nome;
        $veiculo = Veiculo::find($imagem->veiculo_id);

        if ($imagem and $imagem->delete()) {
            Upload::deleta($imagemAntiga, $this->destino);
            return redirect()->route('controle.veiculo.imagem', $veiculo)->with('msg', 'Operação realizada com sucesso')->with('error', false);
        }

        return redirect()->route('controle.veiculo.imagem', $veiculo)->with('msg', 'Não foi possível efetuar a operação')->with('error', true);
    }


    public function excluir(Galeria $galeria)
    {
        $this->verificaPermissao('galeria.excluir');

        if ($galeria and $galeria->delete()) {
            return redirect()->route('controle.galeria.index')->with('error', false);
        }
        return redirect()->route('controle.galeria.index')->with('error', true);
    }

}
