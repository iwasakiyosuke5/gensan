<!-- 
 ◆View画面の作り方；MUST
→HTML要素のheadやヘッダー、背景色などの設定をしている
※書き方
 <x-app-layout>
    <x-slot name="header">
    </x-slot>
      <x-content-area>
        中身を記述する
      </x-content-frame>
    </x-content-area>
  </x-app-layout>


◆用意してあるコンポーネント

●フレーム
　→コンテンツを記載するためのボードです。
    ※書き方
    <x-content-frame>
      記載するコンテンツの内容
    </x-content-frame>

●ボタン
  1.プライマリボタン
  　→フォームの送信などを行うボタン。基本画面上に１つ。
    ※書き方
      <x-primary-button>
        ボタンのラベル名
      </x-primary-button>
  2.セカンダリボタン
  　→プライマリボタン以外のボタン。「削除する」「更新する」「キャンセル」など
    ※書き方
        <x-secondary-button>
          ボタンのラベル名
        </x-secondary-button>
  3.テクストリンク
  　→画面の遷移に使うボタン。「詳細」など
      ※書き方
        <x-text-link href="{{ route('遷移したいページと紐づけられたルート名') }}">
          リンクのラベル名
        </x-text-link>
 */ -->

<!--サンプル -->
<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <x-content-area>
      <x-content-frame>
        <x-primary-button>
          更新する
        </x-primary-button>
        <x-secondary-button>
          戻る
        </x-secondary-button>
        <x-text-link href="{{ route('dashboard') }}">
          詳細
        </x-text-link>
      </x-content-frame>
  </x-content-area>
</x-app-layout>