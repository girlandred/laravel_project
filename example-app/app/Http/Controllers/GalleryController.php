<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Gallery;
use Image;
use Response;


class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('galleries.index');
    }


    public function fetchData()
    {
        $galleries = Gallery::all();
        return Response::json([
            'galleries' => $galleries,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $galleries = $request->validate([
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

        $galleries = Gallery::create([
            'title' => $request->input('title'),
            'image_path' => $image_name,
            'user_id' => auth()->user()->id
        ]);

        return Response::json([
            'status' => 200,
            'message' => 'success',
        ]);
    }
}
