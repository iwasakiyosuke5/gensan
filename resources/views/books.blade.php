<!-- resources/views/books.blade.php -->
<x-app-layout>
  <!--ヘッダー[START]-->
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      <form action="{{ route('book_index') }}" method="GET" class="w-full max-w-lg">
        <x-button class="bg-gray-100 text-gray-900">{{ __('Dashboard') }}</x-button>
      </form>
    </h2>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </x-slot>
  <!--ヘッダー[END]-->

  <!--全エリア[START]-->
  <div class="flex flex-col bg-gray-100 min-h-screen">
    <!-- 全体の見出しと説明文 [START] -->
    <div class="bg-white py-4 sm:py-4 lg:py-6">
      <div class="mx-auto max-w-screen-2xl px-4 md:px-6">
        <div class="mb-3 md:mb-3">
          <h2 class="mb-1 text-center text-2xl font-bold text-gray-800 md:mb-4 lg:text-3xl">KaizenEx Dashboard</h2>
          <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">従業員のアイデアを手軽に提案・共有できるアプリ。インセンティブ制度でやる気を引き出し、ESを高めます。会社は現場の意見を反映して、組織運営を改善し、離職率低下を図ります。</p>
        </div>
      </div>
    </div>
    <!-- 全体の見出しと説明文 [END] -->

    <!-- 自分の投稿一覧 -->
    <div class="flex flex-col rounded-lg border p-4 md:p-6 bg-white mx-4 my-4">
      <h3 class="mb-2 text-lg font-semibold md:text-xl">自分の投稿一覧</h3>
      <p class="mb-4 text-gray-500">あなたの投稿した提案書一覧が確認できます</p>
      <div class="text-center">
        <x-secondary-button :href="route('mypage')" :active="request()->routeIs('mypage')">More</x-secondary-button>
      </div>
    </div>

    <!-- バリデーションエラーの表示に使用-->
    <x-errors id="errors" class="bg-blue-500 rounded-lg mx-auto my-4">{{$errors}}</x-errors>
    <!-- バリデーションエラーの表示に使用-->

    <!-- コンテンツエリア [START] -->
    <div class="flex flex-1 mx-4 mb-4 space-x-4">
      <!--左エリア[START]-->
      <div class="flex flex-col w-1/2 space-y-4">
        <!-- 最新一覧Top10 -->
        <div class="flex flex-col rounded-lg border p-4 md:p-6 bg-white">
          <h3 class="mb-2 text-lg font-semibold md:text-xl">最新一覧Top5</h3>
          <p class="mb-4 text-gray-500">最近提案された改善提案書の上位10件を表示しています</p>
          <div class="text-center mb-4">
            <x-secondary-button :href="route('proposal.list')" :active="request()->routeIs('proposal.list')">More</x-secondary-button>
          </div>
          <!-- テーブル表示エリア -->
          <div class="overflow-x-auto">
            <table id="latestProposalsTable" class="min-w-full border-collapse border border-black">
              <thead>
                <tr>
                  <th class="border border-black px-4 py-2">作成された日時</th>
                  <th class="border border-black px-4 py-2">名前</th>
                  <th class="border border-black px-4 py-2">タイトル</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
          </div>
        </div>

        <!-- 個人別提案数一覧 -->
        <div class="flex flex-col rounded-lg border p-4 md:p-6 bg-white">
          <h3 class="mb-2 text-lg font-semibold md:text-xl">個人別提案数一覧</h3>
          <p class="mb-4 text-gray-500">あなたのアイデアが会社を変えます！！</p>
        </div>
      </div>
      <!--左エリア[END]-->

      <!--右エリア[START]-->
      <div class="flex flex-col w-1/2 space-y-4">
        <!-- 部署別提案数一覧 -->
        <div class="flex flex-col rounded-lg border p-4 md:p-6 bg-white">
          <h3 class="mb-2 text-lg font-semibold md:text-xl">部署別提案数一覧</h3>
          <p class="mb-4 text-gray-500">チームそれぞれ個性豊なアイデア、読むのが楽しい！</p>
        </div>

        <!-- イイネ👍 -->
        <div class="flex flex-col rounded-lg border p-4 md:p-6 bg-white">
          <h3 class="mb-2 text-lg font-semibold md:text-xl">イイネ👍</h3>
          <p class="mb-4 text-gray-500">共感した！そのアイデアイイネと思ったらGoodボタンで清き1票を！</p>
        </div>
      </div>
      <!--右エリア[END]-->
    </div>
    <!-- コンテンツエリア [END] -->
  </div>
  <!--全エリア[END]-->

  <!-- データをJavaScriptに渡す -->
  <script>
    var chartData = @json($chartData);
  </script>
  <!-- main.js の読み込み -->
  <script src="{{ asset('js/main.js') }}"></script>
</x-app-layout>