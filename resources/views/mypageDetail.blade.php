<!-- resources/views/mypageDetail.blade.php -->

<x-app-layout>
<script>
    function submitForm() {
        // フォームを取得して送信する
        document.getElementById('edit').submit();
    }
</script>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kaizen Proposal Detail') }}
        </h2>
    </x-slot>

    <div>
        <div class="flex justify-between">
            <div class="text-xl">提案書詳細 <span class="text-sm text-gray-600">検討中/差戻し時のみ編集可能</span>   </div>
            <x-secondary-button>戻る</x-secondary-button>
            {{-- x-secondary-button 機能を持たしていないよ！ mypage一覧に戻りたい --}}
        </div>
        {{-- 提案書全体 --}}
        <div class="flex w-full h-scleen">
            
            {{-- 左側 提案書No、提案書名、現状、提案内容、メリット 予算  --}}
            <div class="bg-blue-200 w-1/2 rounded-l-xl h-scleen">
                <div class="mx-2">
                    <h2 class="font-bold">提案番号</h2>
                    <div class=" px-1 bg-blue-300 rounded-md text-black mb-2 w-full">{!! $post->idKP !!}</div>

                    <h2 class="font-bold">提案書名</h2>
                    <div class="px-1 bg-blue-300 rounded-md text-black mb-2 w-full">{!! $post->title !!}</div>
                    <form id="edit" action="{{ route('mypageDetail.submit', ['idKP' => $post->idKP]) }}" method="post">
                        @csrf
                        {{-- 以下approvalStageによって条件切り替え --}}
                        @php
                            $readonly = ($post->approvalStage == "検討中" || $post->approvalStage == "採用" || $post->approvalStage == "不採用"  || $post->approvalStage == "再提出") ? 'readonly' : '';
                        @endphp
                        <h2 class="font-bold">現状とその問題点</h2>
                        <textarea class="bg-slate-300 mb-2 px-1 rounded-md w-full" type="text" name="currentSituation" rows="7" cols="" required {{ $readonly }}>{{ $post->currentSituation }}</textarea>

                        <h2 class="font-bold">提案内容</h2>
                        <textarea class="bg-slate-300 mb-2 px-1 rounded-md w-full" type="text" name="proposal" rows="7" cols="" required {{ $readonly }}> {{ $post->proposal }}</textarea>

                        <h2 class="font-bold">メリット</h2>
                        <textarea class="bg-slate-300 mb-2 px-1 rounded-md w-full" type="text" name="benefit" rows="7" cols="" required {{ $readonly }}> {{ $post->benefit }}</textarea>

                        <h2 class="font-bold">予算</h2>
                        <input class="bg-slate-300 mb-2 px-1 rounded-md w-full" type="text" name="budget" value="{{ $post->budget}}" required {{ $readonly }}></input>
                    </form>
                </div>
            </div>

            {{-- 右側 提案者、提案日、部署名、チーム、上司コメント、ステージ、イイね --}}
            <div class="bg-blue-200 w-1/2 rounded-r-xl h-scleen">
                <div class="mx-2">
                    <div class="flex">
                        <div class="w-1/2">
                            <h2 class="font-bold mx-auto">提案者</h2>
                            <div class="text-center mx-auto w-4/5 px-1 py-1 bg-blue-300 rounded-md text-black mb-2 w-full">{!! $post->name !!}</div>                        </div>
                        <div class="w-1/2">
                            <h2 class="font-bold mx-auto">提案日</h2>
                            <div class="text-center mx-auto w-4/5 px-1 py-1 bg-blue-300 rounded-md text-black mb-2 w-full">{!! $post->updated_at->format('Y-m-d H:i') !!}</div>
                        </div>
                    </div>

                    <div class="flex">
                        <div class="w-1/3">
                            <h2 class="font-bold">役職</h2>
                            <div class="text-center mx-auto w-4/5 px-1 py-1 bg-blue-300 rounded-md text-black mb-2 w-full"> {!! $post->position !!}</div>
                        </div>
                        <div class="w-1/3">
                            <h2 class="font-bold">部署名</h2>
                            <div class="text-center mx-auto w-4/5 px-1 py-1 bg-blue-300 rounded-md text-black mb-2 w-full"> {!! $post->department !!}</div>
                        </div>
                        <div class="w-1/3">
                            <h2 class="font-bold">チーム</h2>
                            <div class="text-center mx-auto w-4/5 px-1 py-1 bg-blue-300 rounded-md text-black mb-2 w-full">{!! $post->team !!}</div>
                        </div>
    
    
    
                    </div>
                    <div class="h-80">
                        <h2 class="font-bold">上司コメント</h2>
                        <div class="px-1 bg-blue-300 rounded-md text-black mb-2 w-full">{!! $post->bossComment !!}</div>
                    </div>

                    
                    <div class="flex justify-around">
                        <div class="w-1/3">
                            <h2 class="font-bold text-red-500">承認状態</h2>
                            <div class="text-center w-3/5 px-1 py-1 bg-blue-300 rounded-md text-black mb-2 w-full">{!! $post->approvalStage !!}</div>
                        </div>
                        <div class="w-1/3">
                            <div class="flex justify-start border-m-black">
                                <h2 class="font-bold text-red-500">イイね👍</h2>
                            </div>
                            <div class="flex justify-end w-4/5 mx-auto">
                                <div class="text-center w-3/5 px-1 py-3 bg-pink-300 rounded-md text-black mb-2 w-full">{!! $post->goodCounts !!}</div>
                            </div>
                            <div class="flex justify-end">
                                <!-- フォーム外部に配置した送信ボタン -->
                            <button class="" onclick="submitForm()" {{ $readonly ? 'disabled' : '' }}>Update!</button>
                            {{-- <x-primary-button>更新</x-prmiary-button> --}}
                            {{-- x-primary-button 機能を持たしていないよ！ --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>




        </div>

    </div>
</x-app-layout>
