<?php

namespace App\Http\Controllers\API;

use App\Message;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $limit = $request->limit ? $request->limit : 10;
        $idChat = $request->idChat ? $request->idChat : 0;
        if($idChat){
            $chat = Message::where('id','<',$idChat)->orderBy('created_at', 'desc')->get();
            $extant = Message::where('id','<',$idChat)->count();
        }else{
            $chat = Message::orderBy('created_at', 'desc')->take($limit)->get();
            $extant = Message::count();
        }
        $data = [];
        foreach ($chat as $item){
            $data[] = getResponeMessage($item);
        }
        return response()->json(\getResponse(["listChat" => $data, "extant" => $extant - $limit], META_CODE_SUCCESS));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validate = getValidate(VALIDATE_MESSAGE);
        $validator = Validator::make($request->all(), $validate[0],$validate[1]);
        if($validator->fails()){
            return response()->json(\getResponse([], META_CODE_ERROR, $validator->errors()->first()), Response::HTTP_BAD_REQUEST);
        }

        $user = Auth::user();
        $message = new Message();
        $message->message = $request->message;
        $message->type = $request->type;
        $message->user_id = $user->id;
        $message->save();
        sendSocket(getResponeMessage($message), CHAT_CHANNEL);
        return response()->json(\getResponse([], META_CODE_SUCCESS, SEND_MESS_SUCCESS));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
