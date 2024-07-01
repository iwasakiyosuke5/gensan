<x-app-layout>
    <div style="max-width: 1200px; margin: 0 auto; padding: 20px;">
        <h1 style="text-align: center; margin-bottom: 20px;">自分の投稿一覧</h1>
        <div style="overflow-x: auto;">
            <table border="1" cellpadding="8" cellspacing="0" style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                <thead>
                    <tr>
                        <th style="background-color: #f2f2f2; font-weight: bold;">案件名</th>
                        <th style="background-color: #f2f2f2; font-weight: bold;">部署</th>
                        <th style="background-color: #f2f2f2; font-weight: bold;">名前</th>
                        <th style="background-color: #f2f2f2; font-weight: bold;">イイネ数</th>
                        <th style="background-color: #f2f2f2; font-weight: bold;">ステータス</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->department }}</td>
                        <td>{{ $post->name }}</td>
                        <td>{{ $post->goodCounts }}</td>
                        <td>{{ $post->currentSituation }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
