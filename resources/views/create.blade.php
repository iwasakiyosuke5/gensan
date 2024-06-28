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
        <p>{!!$result['content']!!}</p>
        @endisset
    </body>
    </x-app-layout>