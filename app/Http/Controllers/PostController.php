<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts = Post::get();
        return response()->json(['posts' => $posts]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $post = new Post();
        $post->name = $request->name;
        $post->description = $request->description;
        $post->save();
        return response()->json([
            'message' => 'Post Created',
            'status' => 'success',
            'data' => $post
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post, $id)
    {
        //
        $post = Post::where('id',$id)->first();
        return response()->json([
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $post = Post::where('id', $id)->first();
        $post->name = $request->name;
        $post->description = $request->description;
        $post->update();
        return response()->json([
            'message' => 'Post Updated',
            'status' => 'success',
            'data' => $post
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $post = Post::where('id', $id)->first();
        $post->delete();
        return response()->json([
            'message' => 'Post deleted Successfully',
            'status' => 'success'
        ]);
    }
}
