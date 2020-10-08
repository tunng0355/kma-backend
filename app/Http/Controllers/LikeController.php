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
        $isNewLike = 0;
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
            $isNewLike = 1;
        }
        $postResponse = getResponseNewFeed(Posts::find($postId));
        if($type == 1){
            $dataUserLike = [
                "fullNameLike" => Auth::user()->getUserInfo->fullName,
                "avatarUserLike" => Auth::user()->avatar,
                "userIdLike" => $userId,
                "sendNotify" => $isNewLike
            ];
            sendSocket(array_merge($dataUserLike, $postResponse), CHANNEL_NEW_FEED.$postResponse['userId']);
        }
        return response()->json(\getResponse($postResponse, META_CODE_SUCCESS));
    }
}
