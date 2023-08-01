<x-app-layout>
    <x-slot name="header">
      <div class="font-semibold text-3xl text-center text-yellow-400">ポケモン</div>
    </x-slot>
    <body>
        <div class="text-center">
            <button class="bg-yellow-400 font-medium text-violet-500 py-2 px-4 rounded hover:text-violet-700 hover:bg-yellow-200 " id="pokemon_choose">ポケモンおみくじ</button>
        </div></br>
        <div id="pokemon"/>
        <script src="{{ asset('/build/assets/pokemon_sub-5ccc3577.js') }}"></script>
    </body>
</x-app-layout>