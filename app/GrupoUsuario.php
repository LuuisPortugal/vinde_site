<?php

namespace App;

use App\Traits\UtilTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\AuditingTrait;

class GrupoUsuario extends Model
{
    use SoftDeletes, AuditingTrait, UtilTrait;

    protected $fillable = ['nome', 'texto'];

    public function rotas()
    {
        return $this->belongsToMany(Rotas::class, 'permissao', 'grupo_usuario_id', 'rota_id')->withTimestamps();
    }

    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'grupo_usuarios_id');
    }
}
