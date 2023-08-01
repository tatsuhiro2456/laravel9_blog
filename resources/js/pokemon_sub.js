const poke_container = document.getElementById('pokemon')
const colors = {
    fire: '#FDDFDF',
    grass: '#DEFDE0',
	electric: '#FCF7DE',
	water: '#DEF3FD',
	ground: '#f4e7da',
	rock: '#d5d5d4',
	fairy: '#fceaff',
	poison: '#98d7a5',
	bug: '#f8d5a3',
	dragon: '#97b3e6',
	psychic: '#eaeda1',
	flying: '#F5F5F5',
	fighting: '#E6E0D4',
	normal: '#F5F5F5'
}

//object.keys()は配列にする
const main_types = Object.keys(colors)


const fetchPokemons = async () => {
        var min = 1 ;
        var max = 1011 ;
        var i = Math.floor( Math.random() * (max + 1 - min) ) + min ;
        await getPokemon(i)
}


//asyncは「function」の前に記述するだけで非同期処理を実行できる関数を定義できる
//fetchは外部からデータを取得する
const getPokemon = async (id) => {
    const url = `https://pokeapi.co/api/v2/pokemon/${id}`
    const res = await fetch(url)
    const data = await res.json()
    pokemondata(data)
}


const pokemondata = (pokemon) => {
    //document.createElement("要素") メソッドは要素を作成する
    //classListでクラスをつけたり削除したりできる
    const pokemonEl = document.createElement('div')
    pokemonEl.classList.add('pokemon')

    //toUpperCase()は大文字に変換する関数 
    //slice()は配列の一部を取り出すものslice(1)だと配列の２つ目のものを取り出す。
    //toString()は文字列として返す
    //padStartは文字列の先頭に0をつけるpadStart(3, "0")だと３桁の先頭0の数字になる
    const name = pokemon.name[0].toUpperCase() + pokemon.name.slice(1)
    const id = pokemon.id.toString().padStart(4, '0')

    //map() メソッドは、与えられた関数を配列のすべての要素に対して呼び出し、新しい配列を生成します。今回だとtypeという名の配列名ができる。
    //find() メソッドは、提供されたテスト関数を満たす配列内の最初の要素を返す。
    //indexOf() メソッドは引数に与えられた内容と同じ内容を持つ最初の配列要素の添字を返します。
    const poke_types = pokemon.types.map(type => type.type.name)
    const type = main_types.find(type => poke_types.indexOf(type) > -1)
    const color = colors[type]

    pokemonEl.style.backgroundColor = color

    const pokemonInnerHTML = `
    <div id="add_pokemon">
        <div class="text-center">
            <div class="flex justify-center">
                <div class="img-container">
                    <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/${pokemon.id}.png" alt="">
                </div>
            </div>
            <div class="info">
                <div class="flex justify-center">
                    <div class="text-black  text-center text-xl py-2">#${id}</div>
                </div>
                <div class="font-semibold text-3xl text-black">${name}</div>
                <div class="font-semibold text-3xl text-black">Type: <span> ${type}</span> </small>
            </div>
        </div>
    </div>
    `
    //innerHTMLとはHTML要素の中身を変更するときに使われるプロパティである。HTML要素の中身を自由に変更することで、動的なWebページを作成できる。
    pokemonEl.innerHTML = pokemonInnerHTML

    //appendChildメソッドを使うと、特定の親ノードの子ノードの最後にノードを追加することができる。
    //今回だとhtmlのidがpokemonのタグの下に挿入される。
    poke_container.appendChild(pokemonEl)
}


document.getElementById("pokemon_choose").onclick = function() {
    if(document.getElementById("add_pokemon")){
        document.getElementById("add_pokemon").remove();
    }
  fetchPokemons();
};
