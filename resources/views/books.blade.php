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
    <div class="bg-white py-6 sm:py-8 lg:py-12">
      <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
        <div class="mb-10 md:mb-16">
          <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">KaizenEx Dashboard</h2>
          <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">従業員のアイデアを手軽に提案・共有できるアプリ。インセンティブ制度でやる気を引き出し、ESを高めます。会社は現場の意見を反映して、組織運営を改善し、離職率低下を図ります。</p>
        </div>
      </div>
    </div>
    <!-- 全体の見出しと説明文 [END] -->

    <!-- バリデーションエラーの表示に使用-->
    <x-errors id="errors" class="bg-blue-500 rounded-lg mx-auto my-4">{{$errors}}</x-errors>
    <!-- バリデーションエラーの表示に使用-->

    <!-- コンテンツエリア [START] -->
    <div class="flex flex-1">

      <!--左エリア[START]-->
      <div class="text-gray-700 text-left w-1/2 bg-gray-100 px-4 py-4">

        <!-- 2x2グリッド配置 -->
        <div class="grid grid-cols-2 gap-4">

          <!-- 最新一覧Top10 -->
          <div class="flex flex-col rounded-lg border p-4 md:p-6 bg-white">
            <h3 class="mb-2 text-lg font-semibold md:text-xl">最新一覧Top10</h3>
            <p class="mb-4 text-gray-500">最近提案された改善提案書の上位10件を表示しています</p>
            <a href="#" class="mt-auto font-bold text-indigo-500 transition duration-100 hover:text-indigo-600 active:text-indigo-700">More</a>
          </div>

          <!-- 個人別提案数一覧 -->
          <div class="flex flex-col rounded-lg border p-4 md:p-6 bg-white">
            <h3 class="mb-2 text-lg font-semibold md:text-xl">個人別提案数一覧</h3>
            <p class="mb-4 text-gray-500">あなたのアイデアが会社を変えます！！</p>
            <a href="#" class="mt-auto font-bold text-indigo-500 transition duration-100 hover:text-indigo-600 active:text-indigo-700">More</a>
          </div>

          <!-- 部署別提案数一覧 -->
          <div class="flex flex-col rounded-lg border p-4 md:p-6 bg-white">
            <h3 class="mb-2 text-lg font-semibold md:text-xl">部署別提案数一覧</h3>
            <p class="mb-4 text-gray-500">チームそれぞれ個性豊なアイデア、読むのが楽しい！</p>
            <a href="#" class="mt-auto font-bold text-indigo-500 transition duration-100 hover:text-indigo-600 active:text-indigo-700">More</a>
          </div>

          <!-- イイネ👍 -->
          <div class="flex flex-col rounded-lg border p-4 md:p-6 bg-white">
            <h3 class="mb-2 text-lg font-semibold md:text-xl">イイネ👍</h3>
            <p class="mb-4 text-gray-500">共感した！そのアイデアイイネと思ったらGoodボタンで清き1票を！</p>
            <a href="#" class="mt-auto font-bold text-indigo-500 transition duration-100 hover:text-indigo-600 active:text-indigo-700">More</a>
          </div>

        </div>
      </div>
      <!--左エリア[END]-->

      <!--右側エリア[START]-->
      <div class="bg-blue-900 text-white py-6 sm:py-8 lg:py-12 w-1/2">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
          <div class="grid gap-4">

            <!-- 自分の投稿一覧 -->
            <div class="flex flex-col rounded-lg border p-4 md:p-6 bg-white text-gray-900 w-full">
              <h3 class="mb-2 text-lg font-semibold md:text-xl">自分の投稿一覧</h3>
              <p class="mb-4 text-gray-500">あなたの投稿した提案書一覧が確認できます</p>
              <a href="#" class="mt-auto font-bold text-indigo-500 transition duration-100 hover:text-indigo-600 active:text-indigo-700">More</a>
            </div>

          </div>
        </div>
      </div>
      <!--右側エリア[END]-->

    </div>
    <!-- コンテンツエリア [END] -->

  </div>
  <!--全エリア[END]-->

</x-app-layout>