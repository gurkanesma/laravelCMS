<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Models\Models\Menus;
use App\Models\Models\Models\SubMenus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Symfony\Component\Console\Input\Input;

class menusController extends Controller
    {
        public function index()
        {
            $menus=Menus::all();
            View::share('menus',$menus); //???veritabanında kayıtlı menüleri $menus değişkenine gönderip viewle paylaştık.
            return view('CMS.menu.list');
        }
        public function create()
        {
            return view('CMS.menu.create');
        }
        public function create_post(Request $request)
        {

            $menus=new Menus();
            $menus->title= $request->title;
            $menus->content=$request->content;
            $menus->order=$request->order;

            $menus->save();
            return redirect()->route('CMS.menus.create');
        }
        public function createSub()
        {
            $menus=Menus::all();
            View::share('menus',$menus);
            return view('CMS.menu.createsub');

        }
        public function createSub_post(Request $request)
        {

            $submenus=new SubMenus();
            $submenus->menu_id=$request->menu_id;
            $submenus->title=$request->title;
            $submenus->content=$request->content;
            $submenus->order=$request->order;

            $submenus->save();

            return redirect()->route('CMS.menus.createsub');
        }

        public function remove($id)
        {
            Menus::find($id)->delete();
            SubMenus::where('menu_id',$id)->delete();

            return redirect()->route('CMS.menus.list');

        }
        public function remove_subs($id)
        {
            SubMenus::find($id)->delete();

            return redirect()->route('CMS.menus.list');
        }

        public function edit($id)
        {
             $menus=Menus::find($id);
             View::share('menus',$menus);

             return view('CMS.menu.edit');

        }

        public function edit_post($id, Request $request)
        {
            $menus=Menus::find($id);
            $menus->title=$request->title;
            $menus->content=$request->content;
            $menus->order=$request->order;

            $menus->save();

            return redirect()->route('CMS.menus.list');
        }
         public function editSubs($id)
        {
             $menus=Menus::all();
             $subs=SubMenus::find($id);
             View::share('menus',$menus);
             View::share('subs',$subs);

            return view('CMS.menu.editsub');
        }
        public function editSubs_post($id,Request $request)
        {
             $subs=SubMenus::find($id);
             $subs->menu_id=$request->menu_id;
             $subs->title=$request->title;
             $subs->content=$request->content;
             $subs->order=$request->order;

            $subs->save();
            return redirect()->route('CMS.menus.list');
        }

}
