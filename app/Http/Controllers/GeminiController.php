<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gemini\Laravel\Facades\Gemini;
use Illuminate\Support\Str;

class GeminiController extends Controller
{
    public function index()
    {
        return view('create');
    }

    public function entry(Request $request)
    {
        $toGeminiCommand = "# やって欲しいこと\n次のテキストを基に改善提案書を作成してください。\n# 提案書には、次の内容を含めてください。\n- 改善案を箇条書き\n- 改善内容に対するメリットをポジティブな内容で文章にして書いてください。改行も入れてください。\n- 改善提案に対して次にとるべき行動を文章で書いてください\n```\n" . $request->toGeminiText . "\n```";

        $result = [
            'task' => $request->toGeminiText,
            'content' => Str::markdown(Gemini::geminiPro()->generateContent($toGeminiCommand)->text()),
        ];
        return view('create', compact('result'));
        // dd($request);
    }
}
