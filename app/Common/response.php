<?php
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
    $countComment = $item->getComment->count();
    $userPost     = $item->getUser;
    $countLike    = $item->getLike->count();
//    dd(rand(0, $countLike) ,$item->getLike->count(),$item->getLike);
    $nameUserLike = $item->getLike[rand(0, $countLike-1)]->getUser->getUserInfo->fullName;
    $arrMap = ['id','userId','type','isHot', 'caption', 'content','tag'];
    $data = mapDataResponse($arrMap, [], $item);
    return array_merge($data, [
        "avatarUrl" => $userPost->avatar,
        "fullName" => $userPost->getUserInfo->fullName,
        "subjectName" => $item->getSubject->name,
        "totalComment"=> $countComment,
        "totalLike"=> $countLike,
        "userLike"=> $nameUserLike,
        "created_at"=> strtotime($item->created_at),
        "updated_at"=> strtotime($item->updated_at),
    ]);
}
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
