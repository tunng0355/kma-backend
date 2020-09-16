<?php

namespace App\Http\Controllers\API;

use App\Posts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{


    public function myNewFeed(Request $request){
        $limit = $request->limit ? $request->limit : 10;
        $limitComment = $request->limitComment ? $request->limitComment : 15;
        $listPost  = Posts::orderBy('created_at', 'desc')->take($limit)->get();
        foreach ($listPost as $post){
            $data[] = getResponseNewFeed($post, $limitComment);
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
