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
        return response()->json(\getResponse($searchByUser->listHistory, META_CODE_SUCCESS, GET_HISTORY_SEARCH_SUCCESS));
    }

    public function handleSearch(Request $request)
    {
        $validator = getValidatorData(VALIDATE_HANDLE_SEARCH, $request);
        if ($validator->fails()) {
            return responseValidate($validator->errors()->first(), []);
        }
        $searchText = $request->searchText;
        $searchByUser = $this->getSearchByUser(Auth::user()->id);
        $listHistory = explode(',', $searchByUser->listHistory);
        if (($count = count($listHistory)) <= 9) {
            $listHistory[$count] = $searchText;
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
            "listHistory" => $listHistory
        ], META_CODE_SUCCESS, GET_HISTORY_SEARCH_SUCCESS));

    }

    protected function getSearchByUser($userId)
    {
        return Search::where('userId', $userId)->first();
    }
}
