<x-app-layout>
    <x-slot name="header">
        学んだこと
        <div>
            <h2>ログインユーザー: {{Auth::user()->name}}</h2>
        </div>
    </x-slot>
    <h1 class="text-3xl text-green-700">test.blade.php</h1>
    <div>
    category_idに1を持つ投稿のidで最も若いidは[{{$post_id}}]です。
    </div>
    <div>category_idに2を持つ投稿のidは[
    @foreach($posts_id as $post_id)
        {{$post_id}}
    @endforeach
    ]です。
    </div>
    
</x-app-layout>