<x-app-layout>
    <x-slot name="header">
        Blog Posts
    </x-slot>
    <body>
        <h1 class="title">編集画面</h1>
        <div class="content">
            <form action="/posts/{{$post->id}}" method="POST">
                @csrf
                @method('PUT')
                <div class="content__title">
                    <h2>タイトル</h2>
                    <input type='text' name='post[title]' value="{{$post->title}}">
                    <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
                </div>
                <div class="content__body">
                    <h2>本文</h2>
                    <input type='text' name='post[body]' value="{{$post->body}}">
                    <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
                </div>
                <input type="submit" value="保存">
            </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</x-app-layout>