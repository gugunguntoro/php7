<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class SearchController extends Controller
{

  public function index(Request $request)
  {
    $search = $request->search;

    if(isset($search)){
    	if(!empty($search)) {
    		$posts = Post::orWhere('category_id', 'not like', 8)->where('title', 'like', "%$search%")->where('category_id', 'not like', 12)->paginate(7);
        return view('search.show', compact('posts', 'search'));
      } 
    } else {
	     return view('search.index');
      }
    
  }

}
