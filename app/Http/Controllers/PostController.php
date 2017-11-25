<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Post;

use App\Http\Requests\ValidationRequest;

use App\Category;

use Session;

use Image;

use Storage;

use App\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // create a variable and store all the blog momentums in it from the database
        $post = Post::orderBy('created_at', 'desc')->paginate(7);

        return view('posts.index')->withPosts($post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories = Category::orderBy('name', 'asc')->get();
      $tags = Tag::orderBy('name', 'asc')->get();
      return view('posts.create')->withCategories($categories)->withTags($tags);
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
        'title'          => 'required|max:100',
        'slug'           => 'required|alpha_dash|min:5|max:225|unique:posts,slug',
        'category_id'    => 'required|integer',
        'body'           => 'required',
        'featured_image' => 'image|mimes:jpeg,jpg,png',
        'image_head'     => 'image|mimes:jpeg,jpg,png',
        'image_desc'     => 'required|max:225',
        'photo_by'       => 'required|max:225'
      ]);

      $post = new Post;

      $post->title = $request->title;
      $post->slug = $request->slug;
      $post->category_id = $request->category_id;
      $post->body = $request->body;

      if($request->hasFile('featured_image'))
      {
        $image = $request->file('featured_image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $location = public_path('images/' . $filename);
        Image::make($image)->save($location);

        $post->image = $filename;
      }

      if($request->hasFile('image_head'))
      {
        $image_head = $request->file('image_head');
        $filename = time() . '.' . $image_head->getClientOriginalExtension();
        $location = public_path('images/' . $filename);
        Image::make($image_head)->save($location);

        $post->image_head = $filename;
      }

      $post->image_desc = $request->image_desc;
      $post->photo_by   = $request->photo_by;

      $post->save();

      $post->tags()->sync($request->tags, false);

      Session::flash('success', 'Berhasil, Bro!!!');

      return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $post = Post::find($id);

      return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $post = Post::find($id);
      $categories = Category::orderBy('name', 'asc')->get();
      $cats = array();
      foreach ($categories as $category) {
        $cats[$category->id] = ucwords($category->name);
      }

      $tags = Tag::all();
      $tags2 = array();
      foreach ($tags as $tag) {
        $tags2[$tag->id] = $tag->name;
      }

      return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tags2);
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
      $post = Post::find($id);

      $this->validate($request, [
        'title'       => 'required|max:100',
        'slug'        => "required|alpha_dash|min:5|max:225|unique:posts,slug, $id",
        'category_id' => 'required|integer',
        'body'        => 'required',
        'featured_image' => 'image',
        'image_head' => 'image',
        'image_desc' => 'required|max:225',
        'photo_by'    => 'required|max:225'
      ]);


      $post = Post::find($id);

      $post->title       = $request->input('title');
      $post->slug        = $request->input('slug');
      $post->category_id = $request->input('category_id');
      $post->body        = $request->input('body');

      if ($request->hasFile('featured_image')) {
        $image = $request->file('featured_image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $location = public_path('images/' . $filename);
        Image::make($image)->save($location);
        $oldFilename = $post->image;

        $post->image = $filename;

        Storage::delete($oldFilename);
      }

      if($request->hasFile('image_head'))
      {
        $image_head = $request->file('image_head');
        $filename = time() . '.' . $image_head->getClientOriginalExtension();
        $location = public_path('images/' . $filename);
        Image::make($image_head)->save($location);
        $oldFilename = $post->image_head;

        $post->image_head = $filename;
        Storage::delete($oldFilename);
      }

      $post->image_desc = $request->input('image_desc');
      $post->photo_by   = $request->input('photo_by');

      $post->save();

      if(isset($request->tags)){
        $post->tags()->sync($request->tags);
      } else {
        $post->tags()->sync(array());
      }


      Session::flash('success', 'Edit Berhasil');

      return redirect()->route('posts.show', $post->id);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $post = Post::find($id);
      $post->tags()->detach();

      $post->delete();

      Session::flash('success', 'Berhasil Hapus');

      return redirect()->route('posts.index');
    }
}
