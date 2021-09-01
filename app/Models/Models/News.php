<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected  $table='news'; //veritabanndaki news tablosuyla ilişkilendiriyoruz.
    public $timestamps =true;
    protected $fillable=[
        'img_url',
        'title',
        'content',
    ];
}
