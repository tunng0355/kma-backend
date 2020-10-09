<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function getListCommentPost(Request $request)
    {
        if (!($postId = $request->postId)) {
            return response()->json(\getResponse([], META_CODE_ERROR, ""));
        }
        $limit = $request->limit ? $request->limit : 10;
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
        $indexLoad = $request->key ? $request->key : 0;
        $postId = $request->postId;
        $comment->userId = $userId;
        $comment->postId = $postId;
        $comment->active = ACTIVE;
        $comment->content = $request->message;
        $comment->save();
        $comment->key = $indexLoad;
        $dataResult = getResponseComment($comment);
        sendSocket($dataResult, CHANNEL_COMMENT_FEED . $postId);
        $listUserIdComment = Comment::where('postId', $postId)->where('userId', '!=', $userId)
                            ->distinct()->pluck('userId')->toArray();
        foreach ($listUserIdComment as $id) {
            sendNotifySocket($comment->toArray(), $id, "sdsd");
        }
        return response()->json(\getResponse($dataResult, META_CODE_SUCCESS));
    }
}
