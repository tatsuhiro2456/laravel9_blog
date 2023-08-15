<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use Cloudinary;

class PostController extends Controller
{
    public function index(Post $post)
    {
        // クライアントインスタンス生成
        $client = new \GuzzleHttp\Client();

        // GET通信するURL
        $url = 'https://teratail.com/api/v1/questions';

        // リクエスト送信と返却データの取得
        // Bearerトークンにアクセストークンを指定して認証を行う
        $response = $client->request(
            'GET',
            $url,
            ['Bearer' => config('services.teratail.token')]
        );
        
        // API通信で取得したデータはjson形式なので
        // PHPファイルに対応した連想配列にデコードする
        $questions = json_decode($response->getBody(), true);
        
        
        // index bladeに取得したデータを渡す
        return view('posts.index')->with([
            'posts' => $post->getPaginateByLimit(5),
            'questions' => $questions['questions'],
        ]);
    }
    
    
    public function show(Post $post){
        return view('posts.show')->with(['post' => $post]);
    }
    
    
    
    public function create(Category $category)
    {
        return view('posts.create')->with(['categories' => $category->get()]);
    }
    
    
    
    public function store(Post $post, PostRequest $request,)
    {
        $input = $request['post'];
        $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        $public_id = Cloudinary::getPublicId();
        
        $input += ["public_id"=>$public_id, 'image' => $image_url];
        
        $post->fill($input)->save();
        
        return redirect('/posts/'.$post->id);
    }
    
    public function edit(Post $post)
    {
        return view('posts.edit')->with(['post' => $post]);
    }
    
    public function update(Post $post, PostRequest $request)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();
        
        return redirect('/posts/'. $post->id);
    }
    
    public function delete(Post $post)
    {
        if(isset($post->public_id)){
            Cloudinary::destroy($post->public_id);
            
        }
        $post->delete();
        return redirect('/');
    }
    
    public function map()
    {
        return view('posts.map');
    }
    
    public function pokemon()
    {
        return view('posts.pokemon');
    }
    
}
