<?php

use App\RoomChat;
use App\Message;
use App\Comment;
use App\Like;
use Illuminate\Support\Facades\Validator;

function getResponeMessage($item)
{
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

function getResponseNewFeed($item)
{
    if (isset($item->id)) {
        $userPost = $item->getUser;
        $listUserLike = Like::where('postId', $item->id)->where('active', 1)->pluck('userId');
        $countComment = Comment::where('postId', $item->id)->where('active', 1)->count();
        $nameUserLike = count($listUserLike) > 10 ? $item->getLike[rand(0, count($listUserLike) - 1)]->getUser->getUserInfo->fullName : null;
        $arrMap = ['id', 'userId', 'type', 'isHot', 'caption', 'content', 'tag', 'totalComment', 'totalLike'];
        $data = mapDataResponse($arrMap, [], $item);
        return array_merge($data, [
            "avatarUrl" => $userPost->avatar,
            "fullName" => $userPost->getUserInfo->fullName,
            "subjectName" => $item->subjectId ? $item->getSubject->name : null,
            "userLike" => $nameUserLike,
            "totalComment" => $countComment,
            "totalLike" => count($listUserLike),
            "listUserLike" => renderArrayModalToString($listUserLike),
            "created_at" => strtotime($item->created_at),
            "updated_at" => strtotime($item->updated_at),
        ]);
    }
    return [];

}

function getResponseComment($comment)
{
    $arrMap = ['id', 'userId', 'childId', 'isHot', 'content', 'postId', 'key'];
    $countLikeComment = \App\Like::where('commentId', $comment->id)->count();
    $data = mapDataResponse($arrMap, [], $comment);
    return array_merge($data, [
        "avatarUrl" => $comment->getUser->avatar,
        "fullName" => $comment->getUser->getUserInfo->fullName,
        "countLike" => $countLikeComment,
        "created_at" => strtotime($comment->created_at),
        "updated_at" => strtotime($comment->updated_at),
    ]);
}

function getResponseListFriends($listInfo, $userId)
{
    $data = [];
    foreach ($listInfo as $infoItem) {
        $data[] = array_merge(getResponseListUserInfo($infoItem), [
            "countMessage" => getCountMessage($infoItem->userId, $userId),
            "content" => "",
        ]);
    }
    return $data;
}

function getResponseListUserInfo($infoUser){
    $arrMap = ['userId', 'fullName', AVATAR_FOREIGN];
    return  mapDataResponse($arrMap, [], $infoUser);
}

function getCountMessage($userIdSend, $userIdView)
{
    $romChat = RoomChat::where('listId', 'like', $userIdSend . ',' . $userIdView)
        ->orWhere('listId', 'like', $userIdView . ',' . $userIdSend)->first();
    return isset($romChat) ? Message::where('roomId', $romChat->id)->where('indexLoad', '>', '0')
        ->where('userId', $userIdSend)->count() : 0;
}

;

function formEmailConfirmCode($code)
{
    $title = '<h4 class="email-title">Chào mừng bạn đến với hệ thống</h4>';
    $description = '<p>Mã xác nhận của bạn là: <b>' . $code . '</b></p>';
    return $title . $description;
}

function getValidatorData($typeValidate, $request)
{
    $validate = getValidate($typeValidate);
    return Validator::make($request->all(), $validate[LIST_CONDITION_VALIDATE], $validate[LIST_MSG_VALIDATE]);
}

function responseValidate($msg = "", $arr = [])
{
    return response()->json(\getResponse($arr, META_CODE_ERROR, $msg), 400);
}

//function getResponseDetailRate($listRate){
//    foreach (list)
//}

function sendNotifySocket($data, $userId, $typeNotify)
{
    $data['typeNotify'] = $typeNotify;
    sendSocket($data, CHANNEL_NOTIFY . $userId);
}

?>
