<x-app-layout>
    <x-slot name="header">
        Blog
    </x-slot>
    <body>
        <h1 class="text-3xl text-green-700">Blog Name</h1>
        <button class="bg-red-600 font-medium text-white py-2 px-4 rounded">
            <a href='/posts/create'>create</a>
        </button>
        <div class='posts'>
            @foreach($posts as $post)
                <div class='post'>
                    <h2 class="text-2xl text-green-700">
                        <a href="/posts/{{$post->id}}">{{ $post->title }}</a>
                    </h2>
                    <p class='body'>{{ $post->body }}</p>
                    <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
                    <form action="/posts/{{$post->id}}" id="form_{{$post->id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{$post->id}})">delete</button>
                    </form>
                </div>
            @endforeach
        </div>
        
        <div>
            <h2>ログインユーザー: {{Auth::user()->name}}</h2>
        </div>
        
        <div class ='paginate'>
            {{ $posts->links() }}
        </div>
        
        <script>
            function deletePost(id) {
                'use strict'
        
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
        
        <div>
            @foreach($questions as $question)
                <div>
                    <a href="https://teratail.com/questions/{{ $question['id'] }}">
                        {{ $question['title'] }}
                    </a>
                </div>
            @endforeach
        </div>
    </body>
</x-app-layout>