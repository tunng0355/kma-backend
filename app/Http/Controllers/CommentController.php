<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function getListCommentPost(Request $request)
    {
        if(!($postId = $request->postId)){
            return response()->json(\getResponse([], META_CODE_ERROR, ""));
        }
        $limit = $request->limit ? $request->limit : 15;
        $listComment = Comment::where('postId', $postId)->orderBy('created_at', 'desc')->take($limit)->get();
        $data = [];
        foreach ($listComment as $comment) {
            $data[] = getResponseComment($comment);
        }
        return response()->json(\getResponse($data, META_CODE_SUCCESS));
    }
}
