<?php

namespace App\Http\Controllers;

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
        $user = $request->type ? Auth::user() : User::find($request->userId);
        if(isset($user->id)){
            $user->getUserInfo;
            $user->getUserRate;
            return response()->json(\getResponse($user, META_CODE_SUCCESS, GET_USER_DETAIL_SUCCESS));
        }
        return response()->json(\getResponse([], META_CODE_SUCCESS, GET_USER_DETAIL_ERROR));
    }

}
