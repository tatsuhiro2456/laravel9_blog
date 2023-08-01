<x-app-layout>
    <x-slot name="header">
        ChatGPT
    </x-slot>
    <body>
        {{-- フォーム --}}
        <form method="POST">
            @csrf
            <textarea rows="10" cols="50" name="sentence">{{ isset($sentence) ? $sentence : '' }}</textarea>
            <button type="submit">ChatGPT</button>
        </form>
    
        {{-- 結果 --}}
        {{ isset($chat_response) ? $chat_response : '' }}
    </body>
</x-app-layout>