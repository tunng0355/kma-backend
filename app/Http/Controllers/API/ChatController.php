<?php

namespace App\Http\Controllers\API;

use App\Message;
use App\RoomChat;
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

    public function getListChat(Request $request)
    {
        $validate = getValidate(VALIDATE_LIST_CHAT);
        $validator = Validator::make($request->all(), $validate[0], $validate[1]);
        if ($validator->fails()) {
            return response()->json(\getResponse([], META_CODE_ERROR, $validator->errors()->first()));
        }
        $userId_1   = Auth::user()->id;
        $limit      = $request->limit ? $request->limit : 15;
        $offset     = $request->offset ? $request->offset : 0;
        $userId_2   = $request->userId;
        $userId_1   = Auth::user()->id;
        $romChat    = RoomChat::where('listId', 'like', $userId_1.','.$userId_2)
                              ->orWhere('listId', 'like', $userId_2.','.$userId_1)->first();
        if (!isset($romChat)){
            return $this->createBoxChat($userId_1, $userId_2);
        }
        $listMessage = Message::where('roomId', $romChat->id)
                                ->offset($offset)->limit($limit)->orderBy('created_at','desc')->get();
        return response()->json(\getResponse(["roomChat" => $romChat, "listChat" => $listMessage], META_CODE_SUCCESS, ROOM_CHAT_NEW));
    }

    protected function createBoxChat($userId_1, $userId_2){
        $newRoomChat = new RoomChat();
        $newRoomChat->listId = $userId_1.','.$userId_2;
        $newRoomChat->save();
        return response()->json(\getResponse(["roomChat" => $newRoomChat, "listChat" => []], META_CODE_SUCCESS, ROOM_CHAT_NEW));
    }

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
        $message = new Message();
        if($request->type == POST_TYPE_STATUS){
            $arr = ['userId','roomId','type','message','indexLoad'];
            $message = mapDataModel($arr, $message, $request);
            $message->save();
        }
        $data = Message::find($message->id);
        sendSocket($data, CHANNEL_ROM.$message->roomId);
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
