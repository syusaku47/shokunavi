<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Like;
use Auth;
use App\Models\Content;
class LikesController extends Controller
{
    public function store(Request $request, $contentId)
    {
        Like::create(
        array(
            'user_id' => Auth::user()->id,
            'content_id' => $contentId
            )
        );

        $content = Content::findOrFail($contentId);

        return redirect()
            ->action('ContentsController@user_show', $content->id);
    }

    public function destroy($contentId, $likeId) {
        $content = Content::findOrFail($contentId);
        $content->like_by()->findOrFail($likeId)->delete();

        return redirect()
            ->action('ContentsController@user_show', $content->id);
    }
}
