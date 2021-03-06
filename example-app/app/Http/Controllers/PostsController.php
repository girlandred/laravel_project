<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Image;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('updated_at', 'DESC')->paginate(5);

        return view(('posts.index'), compact('posts'))->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $posts = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048'

        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension();
            $path = public_path('images');
            $resize = Image::make($file->getRealPath());
            $resize->resize(300, 200, function ($const) {
            })->save($path . '/' . $newImageName);

            $file->move(public_path('image'), $newImageName);
        }

        $posts = Post::create([
                'title' => $request->input('title'),
                'content' => $request->input('content'),
                'image_path' => $newImageName,
                'user_id' => auth()->user()->id
        ]);

        // $request->validate([
        //     'title' => 'required',
        //     'content' => 'required',
        //     'image' => 'required|mimes:jpg,png,jpeg|max:5048'
        // ]);

        // $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension();

        // $request->image->move(public_path('images'), $newImageName);

        // Post::create([
        //     'title' => $request->input('title'),
        //     'content' => $request->input('content'),
        //     'image_path' => $newImageName,
        //     'user_id' => auth()->user()->id
        // ]);

        return redirect('/posts')
            ->with('success', __('main.flash_post'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
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
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('posts.index')
            ->with('success', __('main.flash_post_update'));
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

        return redirect()->route('posts.index')
            ->with('success', __('main.flash_post_delete'));
    }
}
