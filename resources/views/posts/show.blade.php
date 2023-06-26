<x-app-layout>
    <x-slot name="header">
        Blog Show
    </x-slot>
    <body>
        <h1 class="title">
            {{ $post->title }}
        </h1>
        <div class="content">
            <div class="content__post">
                <h3>本文</h3>
                <p>{{ $post->body }}</p>    
            </div>
        </div>
        <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
        <div class="edit"><a href="/posts/{{$post->id}}/edit">edit</a></div>
        
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</x-app-layout>