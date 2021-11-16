<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Post;

class PostController extends Controller
{
    protected $validationRules =[
        'title' =>'string | required|max:100',
        'content' => 'string | required'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post ::all();
        return view('admin.posts.index',compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.posts.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validationRules);
        $newPost = new Post();
        $newPost->fill($request->all());
        
        $slug=Str::of($request->title)->slug('-');
        $postExist = Post::where('slug',$slug)->first();
        $count =2;

        while($postExist){
            $slug=Str::of($request->title)->slug('-') . "-{$count}";
            $postExist=Post::where('slug',$slug)->first();
            $count++;
        } 
        $newPost->slug = $slug;
        $newPost->save();

        return redirect()->route("admin.posts.index")->with('success'," Il tuo post è stato creato");
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return  view("admin.posts.show", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view("admin.posts.edit", compact("post"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate($this->validationRules);
        $post->fill($request->all());

        if($post -> title != $request -> title){
            $slug=Str::of($request->title)->slug('-');
            $postExist = Post::where('slug',$slug)->first();
            $count =2;
        while($postExist){
            $slug=Str::of($request->title)->slug('-') . "-{$count}";
            $postExist=Post::where('slug',$slug)->first();
            $count++;
        } 
        $post->slug = $slug;       
        }
        $post->save();
        return redirect()->route('admin.posts.index')->with('success',"Il post è stato aggiornato");;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
      $post->delete();
      return redirect("admin.posts.index")->with('success',"Il post è stato eliminato");  
    }
}
