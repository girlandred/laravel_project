<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Gallery;
use Image;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::where('user_id', auth()->user()->id)->paginate(6);
        return view(('galleries.index'), compact('galleries'))->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048'

        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $image_name = uniqid() . '-' . $request->title . '.' . $request->image->extension();
            $path = public_path('images');
            $resize = Image::make($file->getRealPath());
            $resize->resize(300, 200, function ($const) {
            })->save($path . '/' . $image_name);

            $file->move(public_path('image'), $image_name);
        }

        Gallery::create([
            'title' => $request->input('title'),
            'image_path' => $image_name,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->back()
            ->with('success', 'Your post has been added!');
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
