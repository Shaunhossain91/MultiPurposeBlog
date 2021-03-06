<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User\Post;
use App\Model\User\Category;
use App\Model\User\Tag;


class HomeController extends Controller
{
    public function index(){
        $posts = Post::where('status',1)->paginate(5);
        return view('user/blog',compact('posts'));
    }

    public function tag(tag $tag)
    {
        $posts = $tag->posts();
        return view('user/blog',compact('posts'));

    }

    public function category(category $category)
    {
        $posts = $category->posts();
        return view('user/blog',compact('posts'));

    }

}
