<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class homeController extends Controller
{
    public function index()
    {
        $news=News::all(); //News modelinden türetilmiş ve news modelinin tüm içeriğine sahip $news değişkeni oluşturuyoruz.
        View::share('news',$news); //$news dğişkenini index.blade.php view'i ile paylaşıyoruz.
        return view('Front.Home.index');
    }
    public function page($id)
    {
        $menus=Menus::orderBy('order')->get();
        View::share('menus',$menus);

        $menu=Menus::find($id);
        View::share('menu',$menu);

        return view('Front.Layouts.page');
    }

    public function spage($id)
    {
        $menus=Menus::orderBy('order')->get();
        View::share('menus',$menus);

        $menu=SubMenus::find($id);
        View::share('menu',$menu);

        return view('Front.Layouts.subpage');

    }
}
