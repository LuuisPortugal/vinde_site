<?php

namespace App;

use App\Traits\UtilTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use OwenIt\Auditing\AuditingTrait;

class Usuario extends Authenticatable
{
    use SoftDeletes, AuditingTrait, UtilTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['grupo_usuario_id', 'nome', 'email', 'password', 'cpf'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function grupo_usuario()
    {
        return $this->belongsTo(GrupoUsuario::class);
    }
}
