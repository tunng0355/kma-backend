<?php

namespace App\Http\Controllers;

use App\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function getListSubject(){
        $listSubject = Subject::all();
        return response()->json(\getResponse($listSubject, META_CODE_SUCCESS, GET_LIST_SUBJECT_SUCCESS));
    }
}
