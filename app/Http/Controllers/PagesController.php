<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;


// use App\Models\Momentum;

use App\Album;

use App\Carousel;

use App\Models\Post;


use App\Category;

use Carbon\Carbon;

class PagesController extends Controller
{

  public function getIndex()
  {

    Carbon::setLocale('id');

    $perpu = Post::where('category_id', 'like', '%9%')->orderBy('created_at', 'desc')->limit(1)->get();

    $carousel = Carousel::orderBy('created_at', 'desc')->limit(3)->get();

    $duahari = Post::where('created_at', '<=', Carbon::now()->addWeeks(-1))->limit(2)->get();

    $tigahari = Post::where('created_at', '<=', Carbon::now()->addMonths(-1))->limit(2)->get();

    $lo = Post::where('created_at', '<=', Carbon::now()->addDays(-1))->orderBy('created_at', 'desc')->limit(2)->get();

    $post = Post::where('category_id', 'not like', '%9%')->orderBy('created_at', 'desc')->limit(2)->get();

    // $cerpen = Post::where('category_id', 'like', '%8%')->orderBy('created_at', 'desc')->limit(3)->get();

    $postlama = Post::where('created_at', '<=', Carbon::now()->addDays(-1))->orderBy('created_at', 'desc')->limit(6)->get();

    return view('pages.home', ['carousels' => $carousel, 'posts' => $post, 'perpunjas' => $perpu, 'lol' => $lo, 'duaharis' => $duahari, 'tigaharis' => $tigahari, 'postlamas' => $postlama]);
  }

  public function getAbout()
  {
    return view('pages.about');
  }

  public function getContact()
  {
    return view('pages.contact');
  }

  public function getPhoto()
  {
    $album = Album::all();

    return view('pages.photo', ['albums' => $album]);
  }

  public function getPodcastSingle($slug)
  {
    $podcast = Post::where('slug', '=', $slug)->firstOrFail();
    $podcasts = Post::where('category_id', 'like', '%8%')->get();

    return view('podcast.single', ['podcast' => $podcast, 'podcastsall' => $podcasts]);
  }

  public function getPodcastIndex()
  {
    $podcast = Post::where('category_id', 'like', '%8%')->get();
    $podcastPerpu = Post::where('category_id', 'like', '%12%')->get();

    return view('podcast.index', ['podcasts' => $podcast, 'podcastperpunjas' => $podcastPerpu]);
  }

}
