<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function addNewCommentPost(Request $request)
    {
        $validator = getValidatorData(VALIDATE_POST_COMMENT, $request);
        if ($validator->fails()) {
            return responseValidate($validator->errors()->first(), []);
        }
        $userId = Auth::user()->id;
        $comment = new Comment();
        $comment->userId = $userId;
        $comment->postId = $request->postId;
        $comment->active = ACTIVE;
        $comment->content = $request->message;
        $comment->save();
        sendSocket($comment, CHANNEL_COMMENT_FEED);
        return response()->json(\getResponse($comment, META_CODE_SUCCESS));
    }
}
