<?php
namespace App\Traits;

trait UtilTrait
{
    public function getInstanceIfNotNull($string_null = null, $string_notnull = null)
    {
        if (is_null($string_notnull))
            return isset($this->id) ? $this : $string_null;
        return isset($this->id) ? $string_notnull : $string_null;
    }
}