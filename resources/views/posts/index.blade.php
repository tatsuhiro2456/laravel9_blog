<x-app-layout>
    <x-slot name="header">
        <div class="text-center">
            <div class="font-semibold text-3xl text-yellow-400">Blog list</div>
        </div>
    </x-slot>
    <body>
        </br>
        <div class="text-center">
            <button class="bg-yellow-400 font-medium text-violet-500 py-2 px-4 rounded hover:text-violet-700 hover:bg-yellow-200 ">
                <a href='/posts/create'>create</a>
            </button>
        </div>
        <br>
        <div class="border-t border-violet-800"/>
        <div class='posts'>
            @foreach($posts as $post)
            <br>
                        <div class="flex justify-center">
                            <div class="w-56">
                                <h2 class="text-2xl text-yellow-400 hover:text-yellow-600">
                                    <a href="/posts/{{$post->id}}">{{ $post->title }}</a>
                                </h2>
                                <p class='body'>{{ $post->body }}</p>
                                <div class="box-border border text-white w-16 text-center hover:text-violet-500 hover:bg-white">
                                    <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
                                </div></br>
                                <div>
                                    <form action="/posts/{{$post->id}}" id="form_{{$post->id}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="bg-black font-medium text-yellow-400 py-2 px-4 hover:text-yellow-300 hover:bg-red-500" onclick="deletePost({{$post->id}})">delete</button>
                                    </form>
                                </div>
                            </div>
                            <div class="w-48">
                                <img src="{{ $post->image }}" alt="画像が読み込めません。"/>
                            </div>
                        </div>
                    </div><br>
                <div class="border-t border-violet-800"/>
            @endforeach
        </div></br>
        
        <div class="my-5">{{$posts->links('vendor.tailwind')}}</div>
        
        
        <script>
            function deletePost(id) {
                'use strict'
        
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
        
        
        <br>
        <br>
        
        <div class="text-center bg-violet-500">
            <a href="https://teratail.com/" class="text-3xl text-yellow-400  hover:text-yellow-600">teratail</h1></br>
        </div>
        <div class="text-center flex flex-col space-y-4">
            @foreach($questions as $question)
                    <p>
                        <a href="https://teratail.com/questions/{{ $question['id'] }}" class="text-yellow-400 hover:text-yellow-600">
                            {{ $question['title'] }}
                        </a>
                    </p>
            @endforeach
        </div>
    </body>
</x-app-layout>