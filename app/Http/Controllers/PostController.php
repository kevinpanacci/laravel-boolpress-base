<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

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
        $data['slug'] = Str::slug($data['title'] , '-');
        // $slug = Str::slug('Laravel 5 Framework, '-'');

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
        $post->fill($data);  //Passa tutti i data al DB
        $saved = $post->save();
        if(!$saved) {
            dd('errore di salvataggio');
        }
        return redirect()->route('posts.show', $post->id);
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
