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
        $post = Posts::find($postId);
        $dataResult['countCommentPost'] = $post->getComment->count();
        $dataResult['countLikePost'] = $post->getLike->count();
        sendSocket($dataResult, CHANNEL_COMMENT_FEED . $postId);

        $isMyPostId = $userId != $post->userId;
        $listUserIdComment = Comment::where('postId', $postId)->where('userId', '!=', $userId )
                            ->distinct()->pluck('userId')->toArray();
        $comment->typePost = $post->type;
        $comment->caption = $post->caption;
        $comment->postUserId = $post->userId;
        $comment->avatarUserNotify = Auth::user()->avatar;
        $dataSocketComment = $comment->toArray();

        $found = array_search($post->userId, $listUserIdComment);
        if ($found === false && !$isMyPostId ){
            sendNotifySocket($dataSocketComment, $post->userId, "sdsd");
        }
        foreach ($listUserIdComment as $id) {
            sendNotifySocket($comment->toArray(), $id, "sdsd");
        }
        return response()->json(\getResponse($dataResult, META_CODE_SUCCESS));
    }
}
