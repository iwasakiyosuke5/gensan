<!-- resources/views/proposalDetail.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kaizen Proposal Detail') }}
        </h2>
    </x-slot>

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
</x-app-layout>
