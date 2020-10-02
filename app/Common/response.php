<?php

use App\RoomChat;
use Illuminate\Support\Facades\Validator;

function getResponeMessage($item){
    $user = $item->getUser;
    return [
        "id" => $item->id,
        "message" => $item->message,
        "type" => $item->type,
        "userId" => $item->userId,
        "react" => $item->react,
        "countReact" => $item->count_react,
        "createdAt" => strtotime($item->created_at),
        "userEmail" => $user->email,
        "avatarUrl" => $user->avatar,
        "userName" => $user->name,
    ];
}

function getResponseNewFeed($item){
//    $countComment = $item->getComment->count();
    $userPost     = $item->getUser;
//    $listComment  = \App\Comment::where('postId', $item->id)->orderBy('created_at', 'desc')->take($limitComment)->get();
//    $dataComment  = [];
//    foreach ($listComment as $comment){
//        $dataComment[] = getResponseComment($comment);
//    }
//    $nameUserLike = $countLike ? $item->getLike[rand(0, $countLike-1)]->getUser->getUserInfo->fullName : null;
    $arrMap = ['id','userId','type','isHot', 'caption', 'content','tag','totalComment','totalLike'];
    $data = mapDataResponse($arrMap, [], $item);
    return array_merge($data, [
        "avatarUrl" => $userPost->avatar,
        "fullName" => $userPost->getUserInfo->fullName,
        "subjectName" => $item->subjectId ?  $item->getSubject->name : null,
        "userLike"=> "name user like",
        "created_at"=> strtotime($item->created_at),
        "updated_at"=> strtotime($item->updated_at),
    ]);
}

function getResponseComment($comment){
    $arrMap = ['id','userId','childId','isHot', 'content', 'postId'];
    $countLikeComment = \App\Like::where('commentId', $comment->id)->count();
    $data = mapDataResponse($arrMap, [], $comment);
    return array_merge($data, [
        "avatarUrl" => $comment->getUser->avatar,
        "fullName" => $comment->getUser->getUserInfo->fullName,
        "countLike" => $countLikeComment,
        "created_at"=> strtotime($comment->created_at),
        "updated_at"=> strtotime($comment->updated_at),
    ]);
}

function getResponseListFriends($listInfo, $userId){
    $arrMap = ['userId','fullName',AVATAR_FOREIGN];
    $data = [];
    foreach ($listInfo as $infoItem){
        $data[] = array_merge(mapDataResponse($arrMap, [], $infoItem), [
           "countMessage"=> getCountMessage($infoItem->userId, $userId),
           "content"=> "",
        ]);
    }
    return $data;
}

function getCountMessage($userIdSend, $userIdView){
    $romChat    = RoomChat::where('listId', 'like', $userIdSend.','.$userIdView)
        ->orWhere('listId', 'like', $userIdView.','.$userIdSend)->first();
    return isset($romChat) ? \App\Message::where('roomId', $romChat->id)->where('indexLoad', '>', '0')
                                           ->where('userId', $userIdSend)->count() : 0;
};

//function getResponseFriendMessage($infoItem, $userId){
//    $data = mapDataResponse($arrMap, [], $infoItem);
//    return array_merge($data, [
//            "avatarUrl" => $comment->getUser->avatar,
//            "fullName" => $comment->getUser->getUserInfo->fullName,
//            "countLike" => $countLikeComment,
//            "created_at"=> strtotime($comment->created_at),
//            "updated_at"=> strtotime($comment->updated_at),
//    ]);
//}

function formEmailConfirmCode($code){
    $title = '<h4 class="email-title">Chào mừng bạn đến với hệ thống</h4>';
    $description = '<p>Mã xác nhận của bạn là: <b>'.$code.'</b></p>';
    return $title.$description;
}

function responseValidate($typeValidate, $request){
    $validate = getValidate($typeValidate);
    $validator = Validator::make($request->all(), $validate[0],$validate[1]);
    if($validator->fails()) {
        return response()->json(\getResponse([], META_CODE_ERROR, $validator->errors()->first()));
    }
}

?>
