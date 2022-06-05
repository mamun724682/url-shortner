<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortLink extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'link', 'last_visited'];

    public function getRouteKeyName()
    {
        return 'code';
    }

    public function url_used_times()
    {
        return $this->hasMany(UrlUsed::class, 'short_link_id');
    }
}
