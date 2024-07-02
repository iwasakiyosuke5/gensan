<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\kaizenProposal;

class LikeController extends Controller
{
    public function store(Request $request){
        $post=Like::create([
            'kp_id'=>$request->kp_id,
            'user_id'=>auth()->id(),
        ]);
        kaizenProposal::where('idKP',$request->kp_id)->increment('goodCounts');
        return back();
    }

    public function destroy(Like $like){
        $like->delete();
        kaizenProposal::where('idKP',$like->kp_id)->decrement('goodCounts');
        $like=NULL;
        return back();
    }
}