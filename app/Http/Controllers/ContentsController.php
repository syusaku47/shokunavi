<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContent;
use App\Http\Requests\EditContent;
use App\Models\Content;
use App\Models\Menu;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ContentsController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth', array('except' => 'index'));
    // }

    public function user_index(Request $request)
    {
        $search = $request->input('search');

        // 検索フォーム
        $query = DB::table('contents');

        //もしキーワードがあったら
        if($search !== null){
            //全角スペースを半角に
            $search_split = mb_convert_kana($search,'s');

            //空白で区切る
            $search_split2 = preg_split('/[\s]+/', $search_split,-1,PREG_SPLIT_NO_EMPTY);

            //単語をループで回す
            foreach($search_split2 as $value)
            {
            $query->where('name','like','%'.$value.'%');
            }
        };
        
        $query->select('id','name','catchcopy','recommend','image','updated_at');
        $query->orderBy('updated_at', 'desc');
        $contents = $query->paginate(20);

        return view('contents/user_index', [
            'contents' => $contents,
        ]);
    }

    public function index(Request $request)
    {
        $contents = Content::all();
        $contents = DB::table('contents')
        ->select('id','name','catchcopy','recommend','image','updated_at')
        ->orderBy('updated_at','desc')
        ->paginate(20);
    
        return view('contents/index', [
            'contents' => $contents,
        ]);
    }
    public function showCreateForm()
    {
        return view('contents/create');
    }

    public function create(CreateContent $request)
    {
        $content = new Content();
        $content->name = $request->name;
        $content->image = 'default.jpg';
        $content->catchcopy = $request->catchcopy;
        $content->customer_id = 1;
        $content->recommend = $request->recommend;
        $content->created_at = Carbon::now();
        $content->updated_at = Carbon::now();
        $content->save(); 
        
        $i=0;
        foreach ($request->num as $val) {
            $menu = new Menu();
            $menu->food = $request->food[$i];
            $menu->drink = $request->drink[$i];
            $menu->content_id = $content->id;
            $menu->created_at = Carbon::now();
            $menu->updated_at = Carbon::now();
            $menu->save();
            $i++;
        }
        
        return redirect()->route('contents.index');
    }

    public function showEditForm($id)
    {
        $content = Content::find($id);
        $menus = $content->menus()->get();

        return view('contents/edit',[
        'content' => $content,
        'menus' => $menus
        ]);
        
    }

    public function edit(int $id, EditContent $request)
    {      
        if ($file = $request->image) {
            $fileName = time() . $file->getClientOriginalName();
            $target_path = public_path('uploads/');
            $file->move($target_path, $fileName);
        } else {
            $fileName = "";
        }

        $content = Content::find($id);
        $content->name = $request->name;
        $content->catchcopy = $request->catchcopy;
        $content->recommend = $request->recommend;
        $content->image = $fileName;
        $content->updated_at = Carbon::now();
        $content->save();

        $menus = $content->menus()->get();
        $i=0;
        foreach ($menus as $menu) {
            $menu->food = $request->food[$i];
            $menu->drink = $request->drink[$i];
            $menu->updated_at = Carbon::now();
            $menu->save();
            $i++;
        }

        return redirect()->route('contents.index');
    }

    public function show(int $id)
    {
        $content = Content::find($id);
        $menus = $content->menus()->get();

        return view('contents/show',[
        'content' => $content,
        'menus' => $menus
        ]);
    }

    public function user_show(int $id)
    {
        $content = Content::findOrFail($id); // findOrFail 見つからなかった時の例外処理
        $like = $content->likes()->where('user_id', Auth::user()->id)->first();
        $menus = $content->menus()->get();

        return view('contents.user_show')->with(array('content' => $content, 'like' => $like, 'menus'=>$menus));
            // return view('contents/user_show',[
            // 'content' => $content,
            // 'menus' => $menus
            // ]);
    }

    public function destroy($id)
    {
        $content = Content::find($id);
        $content->delete();
        return redirect()->route('contents.index');
    }
}

