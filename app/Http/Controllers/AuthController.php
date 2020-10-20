<?php

namespace App\Http\Controllers;

use App\FriendsFollow;
use App\Mail\MailNotify;
use App\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\User;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = getValidatorData(VALIDATE_REGISTER, $request);
        if ($validator->fails()) {
            return responseValidate($validator->errors()->first(), []);
        }
        $user           = new User();
        $user->email    = $request->email;
        $user->password = bcrypt($request->password);
        $user->sendCode= rand(100000, 999999);
        $user->codeStudent = $request->codeStudent;
        $user->userName = $request->userName;
        $user->save();
        $arr      = ["fullName", "birthday", "gender"];
        $userInfo = mapDataModel($arr, new UserInfo(), $request, "userId", $user->id);
        $userInfo->sologan = `Xin chào tên tôi là "`.$request->fullName.`", hãy cùng chia sẻ cho nhau những điều thú vị và bổ ích nhé 😍🥰😘🥳`;
        $userInfo->save();
        Mail::to($user->email)->send(new MailNotify(formEmailConfirmCode($user->sendCode), CONFIRM_REGISTER));
        return response()->json(\getResponse($user, META_CODE_SUCCESS, MSG_REGISTER_SUCCESS));
    }

    public function confirmSendCode(Request  $request){
        $validator = getValidatorData(VALIDATE_SEND_CODE, $request);
        if ($validator->fails()) {
            return responseValidate($validator->errors()->first(), []);
        }
        $user = User::where("userName",'like',$request->userName)->first();
        if($user->sendCode == $request->sendCode){
            $user->status = USER_ACTIVE;
            $user->sendCode = null;
            $user->save();
            $friendsFollow = new FriendsFollow();
            $friendsFollow->userId = $user->id;
            $friendsFollow->save();
            return response()->json(\getResponse($user, META_CODE_SUCCESS, $request->type));
        }
        return response()->json(\getResponse([], META_CODE_ERROR, SEND_CODE_ERROR));
    }

    public function checkEmptyRegister(Request $request){
        $value = $request->value;
        $type = $request->type;
        if(!$type){
            return response()->json(\getResponse([], META_CODE_ERROR, ERROR_TYPE));
        }
        $user = User::where($type,'like',$value)->first();
        return response()->json(\getResponse([], isset($user) ? META_CODE_ERROR : META_CODE_SUCCESS, $type));
    }

    public function login(Request $request)
    {
        $uniqueUser = $request->uniqueUser;
        $password = $request->password;
        $condition_1 = ['userName' => $uniqueUser, 'password' => $password];
        $condition_2 = ['codeStudent' => $uniqueUser, 'password' => $password];

        if (!($token = JWTAuth::attempt($condition_1)) && !($token = JWTAuth::attempt($condition_2))) {
            return response()->json(\getResponse([], META_CODE_ERROR, MSG_LOGIN_FAIL));
        }

        $remember_token       = explode(".", $token);
        $user                 = User::where('userName','like',$condition_1['userName'])
                               ->orWhere('codeStudent', 'like', $condition_2['codeStudent'])->first();

        if($user->status != USER_ACTIVE){
            return response()->json(\getResponse(['token' => '', 'userInfo' => $user, 'type'=> $user->role], META_CODE_SUCCESS, LOGIN_NEW));
        }

        $user->remember_token = $remember_token[2];
        $user->save();
        $user->getUserInfo;
        return response()->json(\getResponse(['token' => $token, 'userInfo' => $user, 'type'=> $user->role], META_CODE_SUCCESS, LOGIN_ACTIVE));
    }

    public function user(Request $request)
    {
        $user = Auth::user();
        if ($user) {
            $token = $request->bearerToken();
            $user->getUserInfo;
            return response()->json(\getResponse(['token' => $token, 'userInfo' => $user, 'type'=> $user->role], META_CODE_SUCCESS, LOGIN_ACTIVE));
        }

        return response(null);
    }

    public function changePassword(Request $request)
    {
        $user = Auth::user();

        if ($user) {
            $input = $request->all();
            $validator = Validator::make($input, [
                'password'     => 'required | max:255',
                'passwordNew'     => 'required | max:27 | min:6',
                'passwordConfirm' => 'required | max:27 | min:6',
                'email'           => 'required | email',
            ]);
            if($validator->fails() || $input['password'] == $input['passwordNew'] || $input['passwordNew'] != $input['passwordConfirm']){
                return response()->json(\getResponse([], META_CODE_ERROR, MSG_CHANGE_PASSWORD_VALIDATE));
            }
            $credentials = $request->only('email', 'password');
            if (!($token = JWTAuth::attempt($credentials))) {
                return response()->json(\getResponse([], META_CODE_ERROR, MSG_CHANGE_PASSWORD_PASS_FAIL));
            }
            $userNew           = Auth::user();
            $userNew->password = bcrypt($request->passwordNew);
            $userNew->save();
            return response()->json(\getResponse($user, META_CODE_SUCCESS, MSG_CHANGE_PASSWORD_SUCCESS));
        }

        return response(null);
    }

    public function logout(Request $request) {
        $this->validate($request, ['token' => 'required']);

        try {
            JWTAuth::invalidate($request->input('token'));
            return response()->json(\getResponse(LOGOUT_SUCCESS, META_CODE_SUCCESS, LOGOUT_SUCCESS));
        } catch (JWTException $e) {
            return response()->json('Failed to logout, please try again.');
        }
    }

    public function refresh()
    {
        return response(JWTAuth::getToken());
    }
}
