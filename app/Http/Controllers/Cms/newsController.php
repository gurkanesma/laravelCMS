<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Models\News;

use Illuminate\Support\Facades\View;
use Symfony\Component\Console\Input\Input;


class newsController extends Controller
{
    public function index()
    {
        $news=News::all();
        View::share('news',$news);
        return view('CMS.news.list');
    }
    public function create()
    {
        return view('CMS.news.create');
    }
    public function create_post(Request $request)
    {

        $news= new News();

//        $news -> fill($request->all()); //tüm isteklerin hepsini tek seferde kaydeder.

        $news->title=$request->title;
        $news->content=$request->content;

        if ($request->hasFile('image'))
        {
            $file=$request->image;
            $file->move(public_path() . '/images/news',$file->getClientOriginalName());
            $news->img_url=$file->getClientOriginalName();
        }

        $news->save();
        return redirect()->route('CMS.news.create');

    }
}
