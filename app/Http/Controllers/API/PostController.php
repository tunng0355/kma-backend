<?php

namespace App\Http\Controllers\API;

use App\Posts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function myNewFeed(Request $request)
    {
        $limit = $request->limit ? $request->limit : 10;
        $typeFilter = $request->type;
        $postId = $request->postId ? $request->postId : 0;
        $subjectId = $request->subjectId ? $request->subjectId : 0;
        $userId = $request->userId ? $request->userId : 0;
        $condition = filterTypeNewFeed($typeFilter, $subjectId, $postId, $userId);
        $listPost = Posts::where($condition['type'], $condition['operator'], $condition['value'])
            ->orderBy('created_at', 'desc')->take($limit)->get();
        $data = [];
        foreach ($listPost as $post) {
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validator = getValidatorData(VALIDATE_POST, $request);
        if ($validator->fails()) {
            return responseValidate($validator->errors()->first(), []);
        }
        if ($request->type == 1 && !isset($request->images)) {
            return response()->json(\getResponse([], META_CODE_ERROR, IMAGES_REQUIRED), Response::HTTP_BAD_REQUEST);
        }
        $arrKey = ["type", "tag", "subjectId", "caption"];
        $newPost = mapDataModel($arrKey, new Posts(), $request, USER_ID, Auth::user()->id);
        $newPost->content = $this->genderContentPost($request);
        $newPost->save();
        return response()->json(\getResponse(getResponseNewFeed($newPost), META_CODE_SUCCESS, POST_NEW_SUCCESS));
    }

    protected function genderContentPost($request)
    {
        switch ($request->type) {
            case POST_TYPE_STATUS:
                return $request->payload;
            case POST_TYPE_IMAGE:
                $content = "";
                $listImage = $request->images;
                foreach ($listImage as $item) {
                    if (validateImage($item)) {
                        continue;
                    }
                    $content .= ",". uploadImageToStorage($item);
                }
                return ltrim($content, ",");
            default:
                return null;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
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
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
