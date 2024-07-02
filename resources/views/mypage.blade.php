<x-app-layout>
<x-content-frame>
    <div style="max-width: 1200px; margin: 0 auto; padding: 20px;">
        <h1 style="text-align: left; margin-bottom: 20px;">自分の投稿一覧</h1>
        <div style="overflow-x: auto;">
            <table border="1" cellpadding="8" cellspacing="0" style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                <thead>
                    <tr>
                        <th style="background-color: #f2f2f2; font-weight: bold;">提案番号</th>
                        <th style="background-color: #f2f2f2; font-weight: bold;">提案日</th>
                        <th style="background-color: #f2f2f2; font-weight: bold;">タイトル</th>
                        <th style="background-color: #f2f2f2; font-weight: bold;">承認状況</th>
                        <th style="background-color: #f2f2f2; font-weight: bold;">イイネ👍</th>
                        <th style="background-color: #f2f2f2; font-weight: bold;">詳細の確認</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td class="border px-4 py-2">{{ $post->idKP }}</td>
                        <td class="border px-4 py-2">{{ $post->updated_at->format('Y-m-d H:i')}}</td>
                        <td class="border px-4 py-2">{{ $post->title }}</td>
                        <td class="border px-4 py-2">{{ $post->approvalStage }}</td>
                        <td class="border px-4 py-2">{{ $post->goodCounts }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('proposal.detail', ['idKP' => $post->idKP]) }}" class="text-blue-500 hover:underline">詳細</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
</x-content-frame>
</x-app-layout>
