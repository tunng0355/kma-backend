<?php
function getValidate($type){
    $arr_checkVali = array();
    switch ($type){
        case VALIDATE_MESSAGE:
            $arr_checkVali[0] = [
                "message" => "required|max:255",
                "type" => "required"
            ];
            $arr_checkVali[1] = [
                "message.required" => "message_required",
                "message.max" => "message_than_limit_255",
                "type.required" => "type_required",
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
                "email.max" => "message than limit 255",
                "userName.required" => "message_required2",
                "userName.max" => "message than limit 255",
                "fullName.required" => "message_required3",
                "fullName.max" => "message than limit 255",
                "codeStudent.required" => "message_required4",
                "codeStudent.max" => "message than limit 255",
                "password.required" => "message_required5",
                "password.max" => "message than limit 255",
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
        default:
            $arr_checkVali = [];
    }
    return $arr_checkVali;
}
?>
