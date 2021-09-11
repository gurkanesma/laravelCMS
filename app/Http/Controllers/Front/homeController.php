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
}
