<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        // dd($articles);
        return view('posts.index', compact('posts'));
    }

    public function indexPublished()
    {
        $posts = Post::where('published', 1)->get();
        // dd($articles);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
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
        $now = Carbon::now()->format('Y-m-d-H-i-s');
        $data['slug'] = Str::slug($data['title'] , '-') . $now;

        $validator = Validator::make($data, [
            'title' => 'required|string|max:150',
            'body' => 'required',
            'author' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('posts/create')
                ->withErrors($validator)
                ->withInput();
        }

        $request->validate([
            'title' => 'required|string|max:150',
            'body' => 'required',
            'author' => 'required'
        ]);

        $post = new Post;
        $post->fill($data);
        $saved = $post->save();
        if(!$saved) {
            dd('errore di salvataggio');
        }
        return redirect()->route('posts.show', $post->slug);
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        // dd($post);
        if(empty($post)) {
            abort('404');
        }
        return view('posts.show', compact('post'));
    }


    public function edit(Post $post)
    {
        if(empty($post)) { //controllo
            abort('404');
        }
        return view('posts.edit', compact('post'));
    }


    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        if(empty($post)) {
            abort('404');
        }

        $data = $request->all();
        $now = Carbon::now()->format('Y-m-d-H-i-s');
        $data['slug'] = Str::slug($data['title'] , '-') . $now;

        $validator = Validator::make($data, [
            'title' => 'required|string|max:150',
            'body' => 'required',
            'author' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('posts/create')
                ->withErrors($validator)
                ->withInput();
        }

        $request->validate([
            'title' => 'required|string|max:150',
            'body' => 'required',
            'author' => 'required'
        ]);

        $post->fill($data);
        $updated = $post->update();
        return redirect()->route('posts.show', $post->slug);
    }

    public function destroy($id)
    {
        $post = Post::find($id);

        if(empty($post)) { //controllo
            abort('404');
        }

        $post->delete();
        return redirect()->route('posts.index');
    }
}
