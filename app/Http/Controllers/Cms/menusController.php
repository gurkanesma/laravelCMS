<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class menusController extends Controller
{
    public function create(){
        return view('CMS.menu.create');
    }
}
