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
                "message.max" => "message than limit 255",
                "type.required" => "type_required",
            ];
            break;
        default:
            $arr_checkVali = [];
    }
    return $arr_checkVali;
}
?>
