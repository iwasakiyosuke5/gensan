<!-- resources/views/proposalDetail.blade.php -->

<x-app-layout>
    <x-content-frame>
    <div>
        <div class="text-xl">提案書詳細</div>
        <div>
            <h2>Current Situation:</h2>
            <p>{{ $post->currentSituation }}</p>
            
            <h2>Proposal:</h2>
            <p>{{ $post->proposal }}</p>
            
            <h2>Benefit:</h2>
            <p>{{ $post->benefit }}</p>
            
            <h2>Budget:</h2>
            <p>{{ $post->budget }}</p>
            
            <h2>Department:</h2>
            <p>{{ $post->department }}</p>

            <h2>team:</h2>
            <p>{{ $post->team }}</p>
            
            <!-- 他の必要なフィールドも追加できます -->
        </div>
    </div>
     @if(is_null($like))
        <form method="POST" action="{{ route('like.store') }}">
             @csrf
            <input type="hidden" name="kp_id" value="{{$post->idKP}}">
            <button type='submit' class='like'>
                Like
            </button>
        </form>    
    @else
        <form method="POST" action="{{ route('like.destroy',$like->id)}}">
            @csrf
            @method('delete')
            <button type='submit' class='pushed'>
                Dislike
            </button>
        </form>  
    @endif
</x-content-frame>
</x-app-layout>
