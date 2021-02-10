<?php

namespace App\Http\Controllers;

use App\{Post, Category, Tag};
use Illuminate\Http\Request;

class PostController extends Controller
{

    //setting middelware bisa lewat construct maupun lewat route->web
    // public function __construct()
    // {
    //     //ngebatasin page yg bisa diliat tanpa login
    //     $this->middleware('auth')->except(['index', 'show',]);
    // }

    public function index()
    {
        return view('posts.index', [
            'posts' => Post::latest()->paginate(3),
        ]);
    }

    public function show(Post $post)
    {
        // dd($post->users);
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create', [
            'post' => new Post(),
            'categories' => Category::get(),
            'tags' => Tag::get(),
            'submit' => 'Create'
        ]);
    }

    public function store() //you could import PostRequest $request then unmark these (another way to save)
    {
        // $post = new Post;
        // $post->title = $request->title;
        // $post->slug = \Str::slug($request->title);
        // $post->body = $request->body;
        // $post->save();

        $attr = $this->validateReq();

        $attr['slug'] = \Str::slug($attr['title']);
        $attr['category_id'] = request('category');
        $post = auth()->user()->posts()->create($attr);

        $post->tags()->attach(request('tags'));

        session()->flash('success', 'The post was created. You could visit it here <a href="/posts/' . $attr['slug'] . '" class="text-success">localhost:8000/posts/' . $attr['slug'] . '</a>.');

        return redirect()->to(route('posts.index'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post,
            'categories' => Category::get(),
            'tags' => Tag::get(),
            'submit' => 'Edit'
        ]);
    }

    public function update(Post $post)
    {
        $attr = $this->validateReq();

        $post->update($attr);
        $attr['category_id'] = request('category');
        $attr['user_id'] = auth()->id();

        $post->tags()->sync(request('tags'));

        session()->flash('success', 'The post was updated. You could visit it here <a href="/posts/' . $post->slug . '" class="text-success">localhost:8000/posts/' . $post->slug . '</a>.');

        return redirect()->to(route('posts.index'));
    }

    public function validateReq()
    {
        return request()->validate([
            'title' => 'required|min:2', //you could add something like required|min:3|max:10 (refer to validation.php in resources>lang>en)
            'body' => 'required|min:2',
            'category' => 'required',
            'tags' => 'array|required',
        ]);
    }

    public function destroy(Post $post)
    {
        if (auth()->user()->is($post->user)) {
            $post->tags()->detach(); //trigger hapus tag jg
            $post->delete();
            session()->flash('success', 'The post was deleted successfuly.');

            return redirect()->to(route('posts.index'));
        } else {
            session()->flash('error', 'Failed to delete post : it belongs to another person.');

            return redirect()->to(route('posts.index'));
        }
    }
}
