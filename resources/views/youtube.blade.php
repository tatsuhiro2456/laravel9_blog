<x-app-layout>
    <x-slot name="header">
        <div class="text-center">
            <div class="font-semibold text-3xl text-yellow-400">YouTube Search</div>
        </div>
    </x-slot>
    <body>
        <form action="/youtube/search"　method="GET">
            <div class="flex justify-center">
                <div class="w-80">
            　      <span class="font-semibold text-xl text-yellow-400">キーワード:</span><input class="bg-yellow-400 text-violet-700" type="search" id="q" name="q" placeholder="検索ワード">
                </div>
            </div></br>
            <div class="flex justify-center">
                <div class="w-56">
                    <span class="font-semibold text-xl text-yellow-400">最大取得件数 :</span><input class="bg-yellow-400 text-violet-700" type="number" id="maxResults" name="maxResults" min="1" max="10" step="1" value="5">
                </div>
            </div></br>
            <div class="text-center">
                <button class="bg-yellow-400 font-medium text-violet-500 py-2 px-4 rounded hover:text-violet-700 hover:bg-yellow-200 ">
                    <input class="" type="submit" value="Search">
                </button>
            </div>
        </form>
        </br>
        <div class="border-t border-violet-800"/>
        @isset($videos)
            </br>
            <div class="text-center font-semibold text-3xl text-yellow-400">検索結果</div>
            <div class="text-center font-semibold text-m text-yellow-500">{{$search_word}}で検索　{{$count_videos}}件取得</div></br>
            <div class="border-t border-violet-800"/>
            @for ($i = 0; $i < $count_videos; $i++)
                </br>
                <div class="flex justify-center">
                    <div class="w-72">
                        <a href="https://www.youtube.com/watch?v={{$videos[$i][1]}}" class="text-sm text-yellow-400 hover:text-yellow-600">{{$i +1}} {{$videos[$i][0]}}</a>
                    </div>
                </div>
                <div class="flex justify-center">
                    <div class="w-72" >
                        <iframe src="https://www.youtube.com/embed/{{$videos[$i][1]}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                </div>    
                <br>
                <div class="border-t border-violet-900"/>
            @endfor
        @endisset
    </body>
</x-app-layout>
