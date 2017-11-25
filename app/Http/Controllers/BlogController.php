<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

use App\Models\Momentum;

use App\Category;

use Carbon\Carbon;


class BlogController extends Controller
{
  public function getSingle($slug)
  {
    $post = Post::where('slug', '=', $slug)->firstOrFail();

    $lo = Post::inRandomOrder()->where('created_at', '<=', Carbon::now()->addDays(-1))->orderBy('created_at', 'asc')->limit(6)->get();

    $human = Post::inRandomOrder()->where('category_id', '=', 9)->limit(1)->get();

    $films = Post::inRandomOrder()->where('category_id', '=', 2)->limit(2)->get();

    return view('blog.single', ['post' => $post, 'lol' => $lo, 'humans' => $human, 'films' => $films]);
  }

  public function getIndex()
  {
    $post = Post::orWhere('category_id', 'not like', '12')->where('category_id', 'not like', '8')->orderBy('created_at', 'desc')->paginate(7);
    // $post = Post::paginate(2);
    $category = Category::orWhere('id', 'not like', '12')->where('id', 'not like', '8')->orderBy('name', 'asc')->get();

    return view('blog.index', ['posts' => $post, 'categories' => $category]);
  }

}
