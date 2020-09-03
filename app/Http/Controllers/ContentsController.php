<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContent;
use App\Models\Content;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

class ContentsController extends Controller
{
    public function c_index()
    {
        $contents = Content::all();
    
        return view('contents/c_index', [
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
        
        $content->created_at = Carbon::now();
        $content->updated_at = Carbon::now();
        $content->save();

        return redirect()->route('contents.c_index');
    }

    public function edit($id)
    {
        $content = Content::find($id);
        return view('contents/edit',[
        'content' => $content
        ]);
    }

    public function update(int $id, Request $request)
    {        
        $content = Content::find($id);
        $content->name = $request->name;
        $content->catchcopy = $request->catchcopy;
        $content->updated_at = Carbon::now();
        $content->save();

        return redirect()->route('contents.c_index');
    }
    public function show(int $id)
    {
        $content = Content::find($id);
        // $comments = Comment::where('post_id',$id)->get();
        $comments = $content->comments()->get(); //モデルクラスにおけるリレーション
        return view('contents/show',[
        'content' => $content,
        'comments' => $comments
        ]);
    }

    public function destroy($id)
    {
        $content = Content::find($id);
        $content->delete();
        return redirect()->route('contents.c_index');
    }
}

