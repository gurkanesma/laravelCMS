<?php

namespace App\Models\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubMenus extends Model
{
    protected $table='sub_menu'
    public $timestamps='true';
    protected $fillable[
        'menu_id',
        'title',
        'content',
        'order',
        ];
    use HasFactory;
}
