<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\App;

class Page extends Model
{
    public array $children = [];

    use HasFactory;


    public function image()
    {
        return $this->belongsTo(Image::class, 'header_image_id', 'id')
            ->where('visible', '=', true);
    }

    public function content(): HasOne
    {
        return $this->hasOne(Localization::class, 'page_id')
            ->where('draft', '=', false)
            ->where('lang_code', '=', App::getLocale());
    }

    public function localizations(): HasMany
    {
        return $this->allLocalizations()->where('draft', '=', false);
    }

    public function allLocalizations(): HasMany
    {
        return $this->hasMany(Localization::class, 'page_id');
    }

    public function category()
    {
        return $this->belongsTo(Catalog::class, 'category_id', 'id');
    }

    public function product()
    {
        return $this->hasOne(Product::class, 'page_id', 'id');
    }
}
