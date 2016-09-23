<?php

namespace App;

use App\Traits\UtilTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\AuditingTrait;

class ImagemGaleria extends Model
{
    use SoftDeletes, AuditingTrait, UtilTrait;
}
