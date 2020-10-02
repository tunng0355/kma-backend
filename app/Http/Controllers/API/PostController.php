<?php

namespace App\Http\Controllers\API;

use App\Posts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{


    public function myNewFeed(Request $request){
        $limit = $request->limit ? $request->limit : 5;
//        $limitComment = $request->limitComment ? $request->limitComment : 10;
        $listPost  = Posts::orderBy('created_at', 'desc')->take($limit)->get();
        foreach ($listPost as $post){
            $data[] = getResponseNewFeed($post);
        }
        return response()->json(\getResponse($data, META_CODE_SUCCESS));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $listPost = Posts::all();
//        dd($listPost);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validate = getValidate(VALIDATE_POST);
        $validator = Validator::make($request->all(), $validate[0],$validate[1]);
        if($validator->fails()){
            return response()->json(\getResponse([], META_CODE_ERROR, $validator->errors()->first()), Response::HTTP_BAD_REQUEST);
        }else if($request->type == 1 && !isset($request->payload)){
            return response()->json(\getResponse([], META_CODE_ERROR, PAYLOAD_REQUIRED), Response::HTTP_BAD_REQUEST);
        }
        $arrKey = ["type", "tag", "subjectId", "caption"];
        $newPost = mapDataModel($arrKey, new Posts(),$request, USER_ID, Auth::user()->id);
        $newPost->content = $this->genderContentPost($request);
        $newPost->save();
        return response()->json(\getResponse(getResponseNewFeed($newPost), META_CODE_SUCCESS, POST_NEW_SUCCESS));
    }

    protected function genderContentPost($request){
        switch ($request->type){
            case POST_TYPE_STATUS:
                return $request->payload;
            case POST_TYPE_IMAGE:
                return  null;
                break;
            default: return null;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Posts::find($id);
        dd($post);
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
