<?php

namespace App\Models;

use App\Http\Kernel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;

    /**
     * @return HasOne
     */
    public function image(): HasOne
    {
        return $this->hasOne(Image::class, 'product_id', 'id')
            ->where('visible', '=', true);
    }

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class, 'page_id', 'id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Catalog::class, 'category_id', 'id');
    }

    public function full_alias(): string
    {
        return ($this->category?->alias ?? '')
            . '/' . ($this->page?->alias ?? '');
    }

    public function cart(): HasOne
    {
        return $this->hasOne(Cart::class, 'product_id', 'id')
            ->where('user_uuid', Kernel::$uuid);
    }
}
