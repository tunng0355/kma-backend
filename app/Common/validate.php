<?php
function getValidate($type){
    $arr_checkVali = array();
    switch ($type){
        case VALIDATE_MESSAGE:
            $arr_checkVali[0] = [
                "message" => "required",
                "type" => "required|max:255",
                "idUserInbox"=> "required|max:255",
                "roomId" =>  "required|max:255",
            ];
            $arr_checkVali[1] = [
                "message.required" => "message_required",
                "type.required" => "type_required",
                "idUserInbox.required"=> "idUserInbox_required",
                "roomId.required" =>  "roomId_required",
            ];
            break;
        case VALIDATE_REGISTER:
            $arr_checkVali[0] = [
                "email" => "required|max:255",
                "userName" => "required|max:21",
                "fullName" => "required|max:25",
                "codeStudent" => "required|max:8",
                "password" => "required|max:21",
                "birthday" => "required",
                "gender" => "required",
            ];
            $arr_checkVali[1] = [
                "email.required" => "message_required1",
                "email.max" => "email_than_limit_255",
                "userName.required" => "message_required2",
                "userName.max" => "user_name_than_limit_255",
                "fullName.required" => "message_required3",
                "fullName.max" => "full_name_than_limit_255",
                "codeStudent.required" => "message_required4",
                "codeStudent.max" => "code_student_than_limit_255",
                "password.required" => "message_required5",
                "password.max" => "password_than_limit_255",
                "birthday.required" => "message_required6",
                "gender.required" => "message_required7",
            ];
            break;
        case VALIDATE_SEND_CODE:
            $arr_checkVali[0] = [
                "sendCode" => "required|max:6",
                "type" => "required|max:21",
                "userName" => "required|max:21",
            ];
            $arr_checkVali[1] = [
                "sendCode.required" => "message_required1",
                "sendCode.max" => "message than limit",
                "type.required" => "message_required2",
                "type.max" => "message than limit 21",
                "userName.required" => "message_required2",
                "userName.max" => "message than limit 21",
            ];
            break;
        case VALIDATE_LIST_CHAT:
            $arr_checkVali[0] = [
                "userId" => "required",
            ];
            $arr_checkVali[1] = [
                "userId.required" => "userId_required",
            ];
            break;
        case VALIDATE_POST:
            $arr_checkVali[0] = [
                "type" => "required",
            ];
            $arr_checkVali[1] = [
                "type.required" => "type_required",
            ];
            break;
        case VALIDATE_LIKE_NEW_FEED:
            $arr_checkVali[0] = [
                "postId" => "required",
                "typeLike" => "required",
            ];
            $arr_checkVali[1] = [
                "postId.required" => "postId_required",
                "typeLike.required" => "typeLike_required",
            ];
            break;
        case VALIDATE_POST_COMMENT:
            $arr_checkVali[0] = [
                "postId" => "required",
                "message" => "required",
            ];
            $arr_checkVali[1] = [
                "postId.required" => "postId_required",
                "message.required" => "message_required",
            ];
            break;
            default:
            $arr_checkVali = [];
    }
    return $arr_checkVali;
}
?>
