<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Album;

use App\Carousel;

use Session;

use Image;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $album = Album::all();
      $carousel = Carousel::all();

      return view('albums.index')->withAlbums($album)->withCarousels($carousel);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('albums.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'title' => 'required|max:225',
        'album_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);

      $album = new Album;

      $album->title = $request->title;

      if($request->hasFile('album_image'))
      {
        $image = $request->file('album_image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $location = public_path('images/' . $filename);
        Image::make($image)->save($location);

        $album->image = $filename;
      }

      $album->save();

      Session::flash('success', 'Photo berhasil ditambah');

      return redirect()->route('albums.show', $album->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $album = Album::find($id);
      return view('albums.show')->withAlbum($album);
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
      $album = Album::find($id);
      $album->delete();

      Session::flash('success', 'Berhasil');

      return redirect()->route('albums.index');
    }
}
