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
