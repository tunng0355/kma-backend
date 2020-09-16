<?php

namespace App\Http\Controllers;

use App\UserInfo;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getListFriends(Request $request){
        $limit           = $request->limit ? $request->limit : LIMIT_LIST_FRIENDS;
        $offset          = $request->offset ? $request->offset : 0;
        $searchText      = $request->searchText ? $request->searchText : "%";
        $listFriends     = UserInfo::where('fullName', 'like', '%'.$searchText.'%')
                         ->offset($offset)->limit($limit)->get();
        return response()->json(\getResponse(getResponseListFriends($listFriends), META_CODE_SUCCESS, SEND_EMAIL_SUCCESS));
    }
}
