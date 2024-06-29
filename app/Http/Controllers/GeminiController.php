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
        $toGeminiCommand = "# やって欲しいこと\n次のテキストを基に改善提案書を作成してください。\n# 提案書には、次の内容を含めてください。\n- 1.改善案を箇条書き\n- 2.改善内容に対するメリットをポジティブな内容で文章にして書いてください。改行も入れてください。\n- 改善案は'提案内容:'というラベルの後に続けて書いてください。メリットは'メリット:'というラベルの後に続けて書いてください。\n```\n" . $request->toGeminiText . "\n```";
        // Gemini APIのレスポンスを取得
        $response = Gemini::geminiPro()->generateContent($toGeminiCommand)->text();
        // レスポンスを解析して提案内容とメリットを抽出する
        list($proposal, $benefit) = $this->parseResponse($response);

        $result = [
            'task' => $request->toGeminiText,
            'proposal' => Str::markdown($proposal),
            'benefit' => Str::markdown($benefit),
        ];
        return view('create', compact('result'));
        // dd($request);
    }

        // レスポンスを解析して提案内容とメリットを抽出するメソッド
        private function parseResponse($response)
        {
            // 提案内容とメリットをラベルで分割する
            $proposal = '';
            $benefit = '';
            
            if (preg_match('/提案内容:\s*(.*?)\s*メリット:/s', $response, $matches)) {
                $proposal = $matches[1];
            }
    
            if (preg_match('/メリット:\s*(.*)/s', $response, $matches)) {
                $benefit = $matches[1];
            }
    
            return [$proposal, $benefit];
        }
}
