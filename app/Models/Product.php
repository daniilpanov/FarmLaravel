<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    /**
     * @return HasMany
     */
    public function images(): HasMany
    {
        return $this->hasMany(Image::class, 'product_id', 'id')
            ->where('visible', '=', true);
    }

    public function page()
    {
        return $this->belongsTo(Page::class, 'page_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Catalog::class, 'category_id', 'id');
    }

    public function full_alias()
    {
        return ($this->category?->alias ?? '')
            . '/' . ($this->page?->alias ?? '');
    }
}
