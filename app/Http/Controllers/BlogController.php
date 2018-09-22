<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Carbon\Carbon;

class BlogController extends Controller
{
    public function index(){
        //\DB::enableQueryLog();
        $posts = Post::with('user')
            ->orderBy('created_at', 'desc')
            ->where('published_at' ,'<=', Carbon::now())
            ->paginate(3);//eager loading
        return view('blog.index', compact('posts'));
        //dd(\DB::getQueryLog());
    }
    public function show($id){
        $post = Post::findOrFail($id);
        return view('blog.show',compact('post'));
    }
}
