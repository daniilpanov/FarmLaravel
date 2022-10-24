<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;


    public function getStr($attributes = [])
    {
        $attr_str = "src=\"" . $this->path() . "\" alt=\"$this->alt\"";

        foreach ($attributes as $name => $value) {
            $attr_str .= " $name=\"$value\"";
        }

        return "<img $attr_str />";
    }

    public function path()
    {
        return asset("storage/$this->path");
    }

    public function __toString()
    {
        return $this->getStr();
    }
}
