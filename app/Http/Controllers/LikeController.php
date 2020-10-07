<?php

namespace App\Http\Controllers;

use App\Like;
use App\Posts;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LikeController extends Controller
{
    public function handleLikeNewFeed(Request $request)
    {
        $validator = getValidatorData(VALIDATE_LIKE_NEW_FEED, $request);
        if ($validator->fails()) {
            return responseValidate($validator->errors()->first(), []);
        }
        $postId = $request->postId;
        $type = $request->typeLike;
        $userId = Auth::user()->id;
        $likeNow = Like::where('userId', $userId)->where('postId', $postId)->first();

        if (isset($likeNow->id)) {
            $likeNow->active = $type;
            $likeNow->save();
        } else {
            $likeNew = new Like();
            $likeNew->userId = $userId;
            $likeNew->postId = $postId;
            $likeNew->active = $type;
            $likeNew->save();
        }
        $post = Posts::find($postId);
        $dataUserLike = [
            "fullName" => Auth::user()->getUserInfo->fullName,
            "userId" => $userId,
            "postId" => $postId,
            "type" => $post->type,
            "caption" => $post->caption,
            "content" => $post->content,
        ];
        sendSocket($dataUserLike, CHANNEL_NEW_FEED.$post->userId);
        return response()->json(\getResponse(getResponseNewFeed($post), META_CODE_SUCCESS));
    }
}
