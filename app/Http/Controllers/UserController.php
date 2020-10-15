<?php

namespace App\Http\Controllers;

use App\Like;
use App\Posts;
use App\Rate;
use App\User;
use App\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getListFriends(Request $request)
    {
        $limit = $request->limit ? $request->limit : LIMIT_LIST_FRIENDS;
        $offset = $request->offset ? $request->offset : 0;
        $searchText = $request->searchText ? $request->searchText : "%";
        $listFriends = UserInfo::where('fullName', 'like', '%' . $searchText . '%')
            ->join('users', function ($join) {
                $join->on('user_info.userId', '=', 'users.id')
                    ->where('status', '=', 1);
            })
            ->offset($offset)->limit($limit)->orderBy('fullName')->get();
        return response()->json(\getResponse(getResponseListFriends($listFriends, Auth::user()->id), META_CODE_SUCCESS, SEND_EMAIL_SUCCESS));
    }

    public function getUserDetail(Request $request)
    {
        $validator = getValidatorData(VALIDATE_GET_USER_DETAIL, $request);
        if ($validator->fails()) {
            return responseValidate($validator->errors()->first(), []);
        }
        $user = $this->getUser($request->type, $request->userId);
        if (isset($user->id)) {
            $user->getUserInfo;
            return response()->json(\getResponse($user, META_CODE_SUCCESS, GET_USER_DETAIL_SUCCESS));
        }
        return response()->json(\getResponse([], META_CODE_ERROR, GET_USER_DETAIL_ERROR));
    }

    public function getUserDashBoard(Request $request)
    {
        $validator = getValidatorData(VALIDATE_GET_USER_DETAIL, $request);
        if ($validator->fails()) {
            return responseValidate($validator->errors()->first(), []);
        }

        $userId = $request->userId;
        $user = $this->getUser($request->type, $request->userId);
        if (isset($user->id)) {
            $countLikePost = Like::join('posts', function ($join) use ($userId) {
                $join->on('posts.id', '=', 'like.postId')->where('posts.userId', $userId);
            })->count();
            $countLikeComment = Like::join('comment', function ($join) use ($userId) {
                $join->on('comment.id', '=', 'like.commentId')->where('comment.userId', $userId);
            })->count();
            $data = [
                "rateCountAVG" => getAVGRate($userId),
                "totalLike" => $countLikePost + $countLikeComment,
                "totalPoint" => $user->getUserPoint->total,
            ];
            return response()->json(\getResponse($data, META_CODE_SUCCESS, GET_USER_DETAIL_SUCCESS));
        }
        return response()->json(\getResponse([], META_CODE_ERROR, GET_USER_DETAIL_ERROR));
    }

    protected function getUser($type, $userId)
    {
        return $type ? Auth::user() : User::find($userId);
    }
}
