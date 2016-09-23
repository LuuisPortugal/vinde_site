<?php

namespace App;

use App\Traits\UtilTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\AuditingTrait;

class Galeria extends Model
{
    use SoftDeletes, AuditingTrait, UtilTrait;

    protected $fillable = ['nome', 'rede_id', 'data', 'ativo'];

    public function setDataAttribute($data)
    {
        $this->attributes['data'] = Carbon::createFromFormat('d/m/Y', $data)->format('Y-m-d');
    }

    public function getDataAttribute($data)
    {
        return Carbon::createFromFormat('Y-m-d', $data)->format('d/m/Y');
    }
}
