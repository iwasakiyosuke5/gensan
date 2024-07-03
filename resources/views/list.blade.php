<!-- resources/views/list.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kaizen Proposals') }}
        </h2>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </x-slot>
    <x-content-frame>
    <div>
        <div class="text-xl">投稿一覧</div>
        @if($posts->count())
        <table class="table-auto w-full">
            <thead>
                <tr class="text-center">
                    <th class="px-4 py-2">提案番号</th>
                    <th class="px-4 py-2">名前</th>
                    <th class="px-4 py-2">部署</th>
                    <th class="px-4 py-2">チーム</th>
                    <th class="px-4 py-2">タイトル</th>
                    <th class="px-4 py-2">承認状況</th>
                    <th class="px-4 py-2">イイネ👍</th>
                    <th class="px-4 py-2">詳細確認</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr class="text-center">
                    <td class="border px-4 py-2">{{ $post->idKP }}</td>
                    <td class="border px-4 py-2">{{ $post->name}}</td>
                    <td class="border px-4 py-2">{{ $post->department}}</td>
                    <td class="border px-4 py-2">{{ $post->team}}</td>
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
        <div class="mt-2 flex justify-center">
            {{ $posts->links()}}
        </div>
        @else
        <p>No proposals found.</p>
        @endif
    </div>
</x-content-frame>
</x-app-layout>