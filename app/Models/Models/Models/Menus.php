<?php

namespace App\Models\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{
    protected $table='menu';
    protected $timestamps='true';
    protected $fillable[
         'title',
         'content',
         'order',
        ];
    public function subMenu()
    {
        return $this->hasMany('App\Models\Models\SubMenus','menu_id','id');
    }

    use HasFactory;
}
