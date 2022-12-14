<?php

namespace App\Http\Controllers;

use App\Search;
use App\Subject;
use App\User;
use App\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function getListSearch()
    {
        $searchByUser = $this->getSearchByUser(Auth::user()->id);
        $data = [];
        if ((isset($searchByUser)) && $searchByUser->listHistory != "") {
            $data = $searchByUser->listHistory;
        } else {
            $search = new Search();
            $search->userId = Auth::user()->id;
            $search->save();
        }
        return response()->json(\getResponse($data, META_CODE_SUCCESS, GET_HISTORY_SEARCH_SUCCESS));
    }

    public function handleSearch(Request $request)
    {
        $validator = getValidatorData(VALIDATE_HANDLE_SEARCH, $request);
        if ($validator->fails()) {
            return responseValidate($validator->errors()->first(), []);
        }
        $searchText = $request->searchText;
        $searchByUser = $this->getSearchByUser(Auth::user()->id);
        if (!isset($searchByUser)) {
            return response()->json(\getResponse([], META_CODE_SUCCESS, NO_RECORD));
        }

        $listHistory = explode(',', $searchByUser->listHistory);
        $found = array_search($searchText, $listHistory);
        if($found){
            unset($listHistory[$found]);
            $listHistory[] = $searchText;
        }else if (($count = count($listHistory)) <= 9 && $listHistory[0] != "") {
            $listHistory[$count] = $searchText;
        } else if($listHistory[0] == "") {
            $listHistory[0] = $searchText;
        } else {
            array_shift($listHistory);
            $listHistory[9] = $searchText;
        }
        $searchByUser->listHistory = implode(',', $listHistory);
        $searchByUser->save();
        $userCodeStudent = User::where('codeStudent', 'like', $searchText)->first();
        $dataListUser = [];
        if (isset($userCodeStudent->id)) {
            $dataListUser[] = getResponseListUserInfo($userCodeStudent->getUserInfo);
        } else {
            $listUserInfo = UserInfo::where('fullName', 'like', '%' . $searchText . '%')
                ->offset(0)->limit(10)->orderBy('fullName')->get();
            foreach ($listUserInfo as $infoUser) {
                $dataListUser[] = getResponseListUserInfo($infoUser);
            }
        }
        $listSubject = Subject::where('name', 'like', '%' . $searchText . '%')->orWhere('tag', 'like', '%' . $searchText . '%')
            ->offset(0)->limit(10)->orderBy('name')->get();
        return response()->json(\getResponse([
            "listUser" => $dataListUser,
            "listSubject" => $listSubject,
            "listHistory" => array_values($listHistory),
        ], META_CODE_SUCCESS, GET_HISTORY_SEARCH_SUCCESS));

    }

    protected function getSearchByUser($userId)
    {
        return Search::where('userId', $userId)->first();
    }
}
