<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Carousel;

use Session;

use Image;

class CarouselsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $carousel = Carousel::all();

      return view('carousels.index')->withCarousels($carousel);
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
        'title_caro'    => 'required|max:225',
        'carousel' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);

      $carousel= new Carousel;

      $carousel->title = $request->title_caro;

      if($request->hasFile('carousel'))
      {
        $image = $request->file('carousel');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $location = public_path('images/' . $filename);
        Image::make($image)->save($location);

        $carousel->image = $filename;
      }

      $carousel->save();

      Session::flash('success', 'Photo berhasil ditambah');

      return redirect()->route('carousels.show', $carousel->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $carousel = Carousel::find($id);
      return view('carousels.show')->withCarousel($carousel);
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
      $carousel = Carousel::find($id);
      $carousel->delete();

      Session::flash('success', 'Berhasil');

      return redirect()->route('carousels.index');
    }
}
