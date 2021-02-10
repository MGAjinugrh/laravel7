<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        $posts = $tag->posts()->latest()->paginate(3);
        return view('posts.index', compact('posts', 'tag'));
    }
}
