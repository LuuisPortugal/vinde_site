<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Intervention\Image\Facades\Image;
use OwenIt\Auditing\AuditingTrait;

class Upload extends Model
{
    use SoftDeletes, AuditingTrait, \UtilTrait;

    public static function salva($imagens, $destino, $white = true, $background = '255, 255, 255, 0') #se white true, insere fundo branco
    {
        # os arquivos serão salvos dentro da /storage/data/

        $pastas = ['p', 'm', 'g'];

        foreach ($destino['resolucao'] as $i => $resolucao) {
            $destinos[$pastas[$i]] = ['caminho' => $destino['caminho'] . $pastas[$i] . '/'];
            if (count($resolucao)) {
                $destinos[$pastas[$i]]['w'] = $resolucao[0];
                $destinos[$pastas[$i]]['h'] = $resolucao[1];
            }
        }

        if (isset($imagens)) {
            foreach ($imagens as $imagem) {
                $source = $imagem->getRealPath();
                list($w, $h) = getimagesize($source);
                $nome = str_slug(pathinfo($imagem->getClientOriginalName(), PATHINFO_FILENAME));
                $extensao = $imagem->getClientOriginalExtension();

                $novoNome = $nome . '_' . rand(1000, 9999) . '.' . $extensao;
                if (isset($destinos)) {
                    foreach ($destinos as $tamanho => $pasta) {
                        try {
                            $img = Image::make($source)
                                ->resize(isset($pasta['w']) ? $pasta['w'] : $w, isset($pasta['h']) ? $pasta['h'] : $h, function ($constraint) {
                                    $constraint->aspectRatio();
                                });

                            if ($white && ($tamanho == 'p')) {
                                $img->resizeCanvas($pasta['w'], $pasta['h'], 'center', false, explode(', ', $background));
                            }

                            $img->save($pasta['caminho'] . $novoNome);
                        } catch (\Exception $e) {
                            dd($e);
                            return false;
                        }
                    }
                    return $novoNome;
                }
            }
        }
        return null;
    }

    public static function deleta($imagem, $destino)
    {

        # os arquivos serão salvos dentro da /storage/data/

        $destinos = [
            'p' => ['caminho' => $destino['caminho'] . 'p/'],
            'm' => ['caminho' => $destino['caminho'] . 'm/'],
            'g' => ['caminho' => $destino['caminho'] . 'g/']
        ];

        if (isset($destinos)) {
            foreach ($destinos as $pasta) {
                @unlink($pasta['caminho'] . $imagem);
            }
        }
    }

}
