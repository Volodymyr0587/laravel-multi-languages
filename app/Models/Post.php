<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Post extends Model
{
    use HasFactory;
    protected $guarder = [];

    public function desc(): HasOne
    {
        return $this->hasOne(PostDesc::class)->where('lang', '=', app()->getLocale());
    }
}
