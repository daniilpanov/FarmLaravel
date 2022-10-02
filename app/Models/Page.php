<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Page extends Model
{
    use HasFactory;

    public function content()
    {
        return $this->hasOne(Localization::class, 'page_id')
            ->where('draft', '=', false)
            ->where('lang_code', '=', App::getLocale());
    }

    public function localizations()
    {
        return $this->allLocalizations()->where('draft', '=', false);
    }

    public function allLocalizations()
    {
        return $this->hasMany(Localization::class, 'page_id');
    }
}
