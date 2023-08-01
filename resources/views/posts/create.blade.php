<x-app-layout>
    <x-slot name="header">
        <div class="text-center">
            <div class="font-semibold text-3xl text-yellow-400">Blog Create</div>
        </div>
    </x-slot>
    <body>
        <h1>Blog Name</h1>
        <form action='/posts' method="POST" enctype="multipart/form-data">
            @csrf
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="post[title]" placeholder="タイトル" value="{{ old('post.title') }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
            </div>
            <div class="body">
                <h2>Body</h2>
                <textarea name="post[body]" placeholder="今日も一日お疲れさまでした" value="{{ old('post.body') }}" ></textarea>
                <p class="title__error" style="color:red">{{ $errors->first('post.body') }}</p>
            </div>
            <div class="image">
                <input type="file" name="image">
            </div>
            <div class="category">
                <h2>Category</h2>
                <select name="post[category_id]">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <input type="submit" value="store"/>
        </form>    
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</x-app-layout>