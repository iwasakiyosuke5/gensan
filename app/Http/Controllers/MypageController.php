<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kaizenProposal;

class MypageController extends Controller
{
    public function create()
    {
        $posts = kaizenProposal::where('user_id',auth()->id())->orderBy('idKP','desc')->paginate(5);
        return view('mypage',compact('posts'));
    }
}
