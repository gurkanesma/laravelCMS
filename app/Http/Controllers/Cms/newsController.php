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

    public function remove($id)
    {
        $news=News::where('id',$id)->first();
        $news->delete();
        return redirect()->route('CMS.news.list');

    }
    public function edit($id)
    {
        $news=News::where('id',$id)->first();
        View::share('news',$news);
        return view('CMS.news.edit');
    }
    public function edit_post(Request $request,$id)
    {

        $news=News::where('id',$id)->first();

        if ($request->hasfile('image'))
        {
            $image_path=public_path() . '/images/news/' . $news->img_url;

            unlink($image_path);

            $file=$request->image;
            $file->move(public_path() . '/images/news',$file->getClientOriginalName());
            $news->img_url=$file->getClientOriginalName();
        }
                $news->title=$request->title;
                $news->content=$request->content;
                $news->save();
                return redirect()->route('CMS.news.list');
    }
}


