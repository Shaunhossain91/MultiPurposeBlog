<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User\Post;
use App\Model\User\Tag;
use App\Model\User\Category;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.post.show',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->can('posts.create')) {
            $tags = Tag::all();
            $categories = Category::all();
            
            return view('admin.post.post',compact('tags','categories'));
        }

        return redirect(route('post.index'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required',
            'slogan' => 'required',
            'body' => 'required',
            'slug' => 'required',
        ]);

        if($request->hasFile('image')){
           return yes;
        }

        $post = new Post;
        $post->title = $request->title;
        $post->slogan = $request->slogan;
        $post->slug = $request->slug;
        $post->body = $request->body;
        $post->status = $request->publish;

        $post->save();
        $post->tags()->attach($request->tags);
        $post->categories()->attach($request->categories);
        return redirect(route('post.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::with('tags','categories')->where('id',$id)->first();
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.post.edit',compact('post','tags','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'slogan' => 'required',
            'body' => 'required',
            'slug' => 'required',
            'image' => 'required',
        ]);


        if($request->hasFile('image')){
            $path = $request->image->store('public');
         }

        $post = Post::find($id);
        $post->title = $request->title;
        $post->slogan = $request->slogan;
        $post->slug = $request->slug;
        $post->body = $request->body;
        $post->status = $request->publish;
        $post->image = $path;
        $post->save();
        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->categories);
        return redirect(route('post.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::where('id',$id)->delete();
        return redirect()->back();
    }
}
