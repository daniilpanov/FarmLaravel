<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use HasFactory;

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public function image()
    {
        return $this->belongsTo(Image::class, 'image_id', 'id');
    }

    public function isActive()
    {
        return isset($_GET['category']) && $_GET['category'] == $this->alias;
    }
}
