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
                "email.required" => "message_required",
                "email.max" => "message than limit 255",
                "userName.required" => "message_required",
                "userName.max" => "message than limit 255",
                "fullName.required" => "message_required",
                "fullName.max" => "message than limit 255",
                "codeStudent.required" => "message_required",
                "codeStudent.max" => "message than limit 255",
                "password.required" => "message_required",
                "password.max" => "message than limit 255",
                "birthday.required" => "message_required",
                "gender.required" => "message_required",
            ];
            break;
        default:
            $arr_checkVali = [];
    }
    return $arr_checkVali;
}
?>
