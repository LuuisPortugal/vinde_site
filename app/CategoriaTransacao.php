<?php

namespace App;

use App\Traits\UtilTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\AuditingTrait;

class CategoriaTransacao extends Model
{
    use SoftDeletes, AuditingTrait, UtilTrait;
    protected $fillable = ['id', 'nome', 'ordem', 'slug'];

    public function rotas()
    {
        return $this->hasMany(Rotas::class, 'categoria_transacao_id');
    }
}
