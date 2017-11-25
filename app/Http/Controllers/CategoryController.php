<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Category;
use App\Models\Post;

class CategoryController extends Controller
{
  public function index($name)
  {

      $category = Category::where('name', $name)->first();

      $posts = Post::where('category_id', $category->id)->paginate(7);

      $categories = Category::orderBy('name', 'asc')->get();

    return view('category.index', compact('category', 'categories', 'posts'));


  }

}
