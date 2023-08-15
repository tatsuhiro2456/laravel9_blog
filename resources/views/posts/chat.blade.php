<x-app-layout>
    <x-slot name="header">
        ChatGPT
    </x-slot>
    <x-slot name="slot">
        {{-- フォーム --}}
        <form method="POST">
            @csrf
            <textarea rows="10" cols="50" name="sentence">{{ isset($sentence) ? $sentence : '' }}</textarea>
            <button type="submit">ChatGPT</button>
        </form>
    
        {{-- 結果 --}}
        {{ isset($chat_response) ? $chat_response : '' }}
    </x-slot>
</x-app-layout>