<!-- resources/views/list.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kaizen Proposals') }}
        </h2>
    </x-slot>

    <div>
        <div class="text-xl">提案書一覧</div>
        @if($posts->count())
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2">提案番号</th>
                        <th class="px-4 py-2">提案者</th>
                        <th class="px-4 py-2">提案書名</th>               
                        <th class="px-4 py-2">Approval Stage</th>
                        <th class="px-4 py-2">イイネ👍</th>
                        <th class="px-4 py-2">詳細の確認</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td class="border px-4 py-2">{{ $post->idKP }}</td>
                            <td class="border px-4 py-2">{{ $post->user_id}}</td>
                            <td class="border px-4 py-2">{{ $post->title }}</td>                          
                            <td class="border px-4 py-2">{{ $post->approvalStage }}</td>
                            <td class="border px-4 py-2">{{ $post->goodCounts }}</td>
                            <td class="border px-4 py-2">
                                <a href="{{ route('proposal.detail', ['idKP' => $post->idKP]) }}" class="text-blue-500 hover:underline">View Details</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No proposals found.</p>
        @endif
    </div>
</x-app-layout>

