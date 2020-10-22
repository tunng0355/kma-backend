<?php

use App\Events\RedisEvent;
use Illuminate\Support\Facades\Storage;

/**
 * $chat = Message::all()->take(-10);
 * $chat = Message::orderBy('created_at', 'desc')->take(10)->get();
 */
//$active = $request->has('active')? 1 : 0;
//$updated = DB::table('products')
//    ->where('id', '=', $id)
//    ->update([
//        'name'       => $request->input('name'),
//        'price'      => $request->input('price'),
//        'content'    => $request->input('content'),
//        'image_path' => $request->input('image_path'),
//        'active'     => $active,
//        'updated_at' => \Carbon\Carbon::now()
//    ]);

function mapDataModel($arr, $model, $request, $custom_key = "", $id_key = 0)
{
    foreach ($arr as $value) {
        $model->$value = is_numeric($request->$value) ? (int)$request->$value : $request->$value;
    }
    if ($custom_key) {
        $model->$custom_key = $id_key;
    }
    return $model;
}

function mapDataResponse($arr, $data, $model)
{
    foreach ($arr as $value) {
        if ($value == AVATAR_FOREIGN) {
            $data['avatarUrl'] = $model->getUser->avatar;
            continue;
        }
        $data[$value] = $model->$value ? $model->$value : "";
    }
    return $data;
}

function getResponse($data, $code, $msg = "")
{
    return ["meta" => ["code" => $code, "msg" => $msg], "data" => $data];
}

function sendSocket($data, $channel)
{
    event(
        new RedisEvent(["data" => $data], $channel)
    );
}

function mapData($s_value, $data)
{
    $arr = explode(",", $s_value);
    $result = [];
    foreach ($arr as $value) {
        $result[$value] = $data[$value];
    }
    dd($result);
}

function changeTitle($str, $strSymbol = '-', $case = MB_CASE_LOWER)
{// MB_CASE_UPPER / MB_CASE_TITLE / MB_CASE_LOWER
    $str = trim($str);
    if ($str == "") return "";
    $str = str_replace('"', '', $str);
    $str = str_replace("'", '', $str);
    $str = stripUnicode($str);
    $str = mb_convert_case($str, $case, 'utf-8');
    $str = preg_replace('/[\W|_]+/', $strSymbol, $str);
    return $str;
}

function stripUnicode($str)
{
    if (!$str) return '';
    //$str = str_replace($a, $b, $str);
    $unicode = array(
        'a' => 'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ|å|ä|æ|ā|ą|ǻ|ǎ',
        'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ|Å|Ä|Æ|Ā|Ą|Ǻ|Ǎ',
        'ae' => 'ǽ',
        'AE' => 'Ǽ',
        'c' => 'ć|ç|ĉ|ċ|č',
        'C' => 'Ć|Ĉ|Ĉ|Ċ|Č',
        'd' => 'đ|ď',
        'D' => 'Đ|Ď',
        'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|ë|ē|ĕ|ę|ė',
        'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ|Ë|Ē|Ĕ|Ę|Ė',
        'f' => 'ƒ',
        'F' => '',
        'g' => 'ĝ|ğ|ġ|ģ',
        'G' => 'Ĝ|Ğ|Ġ|Ģ',
        'h' => 'ĥ|ħ',
        'H' => 'Ĥ|Ħ',
        'i' => 'í|ì|ỉ|ĩ|ị|î|ï|ī|ĭ|ǐ|į|ı',
        'I' => 'Í|Ì|Ỉ|Ĩ|Ị|Î|Ï|Ī|Ĭ|Ǐ|Į|İ',
        'ij' => 'ĳ',
        'IJ' => 'Ĳ',
        'j' => 'ĵ',
        'J' => 'Ĵ',
        'k' => 'ķ',
        'K' => 'Ķ',
        'l' => 'ĺ|ļ|ľ|ŀ|ł',
        'L' => 'Ĺ|Ļ|Ľ|Ŀ|Ł',
        'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|ö|ø|ǿ|ǒ|ō|ŏ|ő',
        'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ|Ö|Ø|Ǿ|Ǒ|Ō|Ŏ|Ő',
        'Oe' => 'œ',
        'OE' => 'Œ',
        'n' => 'ñ|ń|ņ|ň|ŉ',
        'N' => 'Ñ|Ń|Ņ|Ň',
        'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|û|ū|ŭ|ü|ů|ű|ų|ǔ|ǖ|ǘ|ǚ|ǜ',
        'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự|Û|Ū|Ŭ|Ü|Ů|Ű|Ų|Ǔ|Ǖ|Ǘ|Ǚ|Ǜ',
        's' => 'ŕ|ŗ|ř',
        'R' => 'Ŕ|Ŗ|Ř',
        's' => 'ß|ſ|ś|ŝ|ş|š',
        'S' => 'Ś|Ŝ|Ş|Š',
        't' => 'ţ|ť|ŧ',
        'T' => 'Ţ|Ť|Ŧ',
        'w' => 'ŵ',
        'W' => 'Ŵ',
        'y' => 'ý|ỳ|ỷ|ỹ|ỵ|ÿ|ŷ',
        'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ|Ÿ|Ŷ',
        'z' => 'ź|ż|ž',
        'Z' => 'Ź|Ż|Ž'
    );
    foreach ($unicode as $khongdau => $codau) {
        $arr = explode("|", $codau);
        $str = str_replace($arr, $khongdau, $str);
    }
    return $str;
}

function randomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randstring = '';
    for ($i = 0; $i < $length; $i++) {
        $randstring .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randstring;
}

function getValueOnZero($number)
{
    return $number < 10 ? "0$number" : $number;
}

function renderArrayModalToString($modalPluck)
{
    return implode(",", $modalPluck->toArray());
}

function filterTypeNewFeed($typeFilter, $subjectId, $postId, $userId)
{
    $isSubject = $typeFilter == POST_TYPE_SUBJECT;
    switch ($typeFilter) {
        case POST_TYPE_IMAGE:
        case POST_TYPE_VIDEO:
            $arr_condition = [
                'type' => 'type',
                'operator' => "=",
                'value' => $typeFilter,
            ];
            break;
        case POST_TYPE_SUBJECT:
        case POST_TYPE_ONLY_ID:
            $arr_condition = [
                'type' => $isSubject ? SUBJECTID_VAR : 'id',
                'operator' => "=",
                'value' => $isSubject ? $subjectId : $postId,
            ];
            break;
        case POST_TYPE_ONLY_TEXT:
            $arr_condition = [
                'type' => 'type',
                'operator' => "=",
                'value' => POST_TYPE_STATUS,
            ];
            break;
        case POST_TYPE_ONLY_USER:
            $arr_condition = [
                'type' => 'userId',
                'operator' => "=",
                'value' => $userId,
            ];
            break;
        case POST_TYPE_HOST:
            $arr_condition = [
                'type' => 'isHot',
                'operator' => ">",
                'value' => 0,
            ];
            break;
        default:
            $arr_condition = [
                'type' => 'type',
                'operator' => ">=",
                'value' => 0,
            ];
    }
    return $arr_condition;

};

function uploadImageToStorage($image){
    $fullPath = UPLOAD_DIR.strtotime(date(FORMAT_CURRENT_TIME)).randomString(20);
    Storage::disk('s3')->put($fullPath, file_get_contents($image), 'public');
    return Storage::disk('s3')->url($fullPath);
}

function removeImageStorage($url){
    if(strpos($urlRemove = $url, "".ENV_S3) == 0){
        $path = str_replace(ENV_S3, "", $urlRemove);
        Storage::disk('s3')->delete(UPLOAD_DIR.$path);
    };
}

?>
