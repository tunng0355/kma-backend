<?php namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SocketController extends Controller {
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function sendMessage(Request $request){
        $data = [
            "id" => $request->id,
            "userName" => $request->userName,
            "userId" => $request->userId,
            "userEmail" => $request->userEmail,
            "message" => $request->message,
            "createAt" =>  Carbon::now()->timestamp,
        ];
        sendSocket($data, CHAT_CHANNEL);
        return response()->json(\getResponse([], META_CODE_SUCCESS, SEND_EMAIL_SUCCESS));
    }
}
