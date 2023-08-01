<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class TestController extends Controller
{
    public function test(Post $post){
        #postsテーブルに入っているcategory_idが2のデータを、pluck関数によりidのみ取得する。（複数取得）
        $posts_id = Post::where('category_id' ,2)->pluck("id");
        
        #postsテーブルに入っているcategory_idが1のデータを、value関数によりidのみ取得する。（1つだけ取得）
        $post_id = Post::where('category_id' ,1)->value("id");
        return view('test')->with(['posts_id' => $posts_id, 'post_id' => $post_id]);
    }
}
