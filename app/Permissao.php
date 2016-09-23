<?php

namespace App;

use App\Traits\UtilTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\AuditingTrait;

class Permissao extends Model
{
    use SoftDeletes, AuditingTrait, UtilTrait;

    protected $table = 'permissao';
    protected $fillable = ['grupo_usuario_id', 'rota_id'];

    public function rota()
    {
        return $this->belongsTo(Rotas::class, 'rota_id', 'id');
    }

    public function grupo_usuario()
    {
        return $this->belongsTo(GrupoUsuario::class, 'grupo_usuario_id', 'id');
    }
}
