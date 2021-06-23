<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Category;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        $categories = Category::all();
        return view('admin.posts.index', compact('posts', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        /* VALIDAZIONI */
        $request->validate([
            'title'=> 'required|unique:posts',
            'content'=> 'required',
            'category_id'=> 'nullable|exists:categories,id'
        ], [
            'required' => 'the :attribute is required!!',
            'unique' => 'the :attribute is unique!!'
        ]);

        $new_post = new Post;
        $data['slug'] = Str::slug($data['title'], '-');
        $new_post->fill($data);
        $new_post->save();
        
        return redirect()->route('admin.posts.show', $new_post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Post::find($id);
        $categories = Category::all();
        return view('admin.posts.show', compact('posts', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Post::find($id);

        $categories = Category::all();

        return view('admin.posts.edit', compact('posts', 'categories'));
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

        $data = $request->all();
        /* VALIDAZIONI */
        $request->validate([
            'title'=>[
                'required',
                Rule::unique('posts')->ignore($id),
                'max:255',
            ],
            'content'=>'required',
            'category_id'=>'nullable|exists:categories,id'
        ],[
            'required'=> 'the :attribute is required',
            'unique'=> 'the :attribute is already',
            'max'=> 'hai superato i 255 caratteri'
        ]);
        
        $post = Post::find($id);
        $post->update($data);
        
        return redirect()->route('admin.posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post= Post::find($id);

        $post->delete();

        return redirect()->route('admin.posts.index')->with('deleted', $post->title);
    }
}
