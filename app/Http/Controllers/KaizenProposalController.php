<?php

namespace App\Http\Controllers;

use App\Models\kaizenProposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KaizenProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = kaizenProposal::all();
        return view('list', compact('posts'));
    }

    public function detail($idKP)
    {
        $post = kaizenProposal::where('idKP', $idKP)->firstOrFail();
        return view('proposalDetail', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'title' => 'required|string|max:255',
            'currentSituation' => 'required|string',
            'proposal' => 'required|string',
            'benefit' => 'required|string',
            'budget' => 'required|string',
        ]);

        // データを保存
        KaizenProposal::create([
            'title' => $request->input('title'),
            'currentSituation' => $request->input('currentSituation'),
            'proposal' => $request->input('proposal'),
            'benefit' => $request->input('benefit'),
            'budget' => $request->input('budget'),
            'user_id' => Auth::user()->id,
            'name' => Auth::user()->name,
            'position' => Auth::user()->position,
            'department' => Auth::user()->department,
            'team' => Auth::user()->team,
            'approvalStage' => 0, // 初期値
            'bossComment' => '', // 空のコメント
            'goodCounts' => 0, // 初期値
        ]);
        return redirect()->back()->with('success', '提案書が作成されました！');
    }

    /**
     * Display the specified resource.
     */
    public function show(kaizenProposal $kaizenProposal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(kaizenProposal $kaizenProposal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, kaizenProposal $kaizenProposal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(kaizenProposal $kaizenProposal)
    {
        //
    }
}
