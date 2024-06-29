<x-app-layout>
    <body>
        <h1>{{config('app.name')}}</h1>

        <form action="{{route('entry')}}" method="post">
            @csrf
            <textarea name="toGeminiText" autofocus>@isset($result['task']){{$result['task']}}@endisset </textarea>
            <button type="submit">send</button>
        </form>

        <hr>

        @isset($result)
        <div class="">
            <div class="bg-white">
                <h2>入力テキスト</h2>
                <p>{{ $result['task'] }}</p>
        
                <h2>提案内容</h2>
                <div class="text-red-100">{!! $result['proposal'] !!}</div>
        
                <h2>メリット</h2>
                <div class="text-blue-100">{!! $result['benefit'] !!}</div>
    
            </div>
            <form  method="POST" action="" class="bg-green-100">
                <h2>入力テキスト</h2>
                <input class="" type="" name="" value="{{ $result['task'] }}"></input>
        
                <h2>提案内容</h2>
                <div class="text-red-100">{!! $result['proposal'] !!}</div>
        
                <h2>メリット</h2>
                <div class="text-blue-100">{!! $result['benefit'] !!}</div>
                <div class="flex justify-end"><input class="px-2 bg-pink-300 hover:bg-pink-500 rounded cursor-pointer"  type="submit" value="Update!"></div>
            </form>
        </div>

        @endisset
    </body>
    </x-app-layout>