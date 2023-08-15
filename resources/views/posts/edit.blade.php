<x-app-layout>
    <x-slot name="header">
        <div class="text-center">
            <div class="font-semibold text-3xl text-yellow-400">Blog Edit</div>
        </div>
    </x-slot>
    <x-slot name="slot">
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
                <div>
                    <input type="file" name="image">
                </div>
                <input type="submit" value="保存">
            </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </x-slot>
</x-app-layout>
