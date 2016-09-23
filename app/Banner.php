<?php

namespace App;

use App\Traits\UtilTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\AuditingTrait;

class Banner extends Model
{
    use SoftDeletes, AuditingTrait, UtilTrait;

    function f()
    {
        $this->getInstanceIfNotNull();
    }
}
