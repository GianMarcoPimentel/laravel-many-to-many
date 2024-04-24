<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\Type;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();

        //dd($post);

        return view('admin.posts.index', compact('posts')); 
        /* return('siamo nell index dei post'); */

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $types = Type::all();

        return view('admin.posts.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        //
        //dd($request);
         /* $newPost = new Post();
        $newPost->name = $request->name;
        $newPost->description = $request->description;
        $newPost->src = $request->src;
        $newPost->used_technologies = $request->used_technologies;
        $newPost->link = $request->link; */
        $request->validated();

        $newPost = new Post();

        $newPost->fill($request->all());
       
        if($request->hasFile('src')) {

            //salvo percorso dell'immagina
            $path = Storage::disk('public')->put('images', $request->src);
            $newPost->src = $path;
        }

        $newPost->save();

        return redirect()->route('admin.posts.show', $newPost->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
        dd($post->technologies);
        return view('admin.posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
        $types = Type::all();
        
        return view('admin.posts.edit', compact('post','types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePostRequest $request, Post $post)
    {
        //
        /* $Post = new Post();
        $Post->name = $request->name;
        $Post->description = $request->description;
        $Post->src = $request->src;
        $Post->used_technologies = $request->used_technologies;
        $Post->link = $request->link;

        $Post->save(); */
        $request->validated();

        $post->update($request->all());

        return redirect()->route('admin.posts.show', $post->id);
        
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index');
    }
}
