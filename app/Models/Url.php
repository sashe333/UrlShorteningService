<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = [
        'url',
        'url_short',
        'short_url_access_count'
    ];
}
