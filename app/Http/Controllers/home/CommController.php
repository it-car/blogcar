<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Navs;
use App\Http\Model\Article;
use View;

class CommController extends Controller
{
    //__construct会自动执行，无需路由等
    public function __construct()
    {
    	// dd('ssadasd');
		$navs = Navs::all();

    	//点击量最高的5篇文章(点击排行)
    	$hot = Article::orderBy('art_views','desc')->take(5)->get();

    	//最新发布的8篇文章（最新文章）
    	$new = Article::orderBy('art_time','desc')->take(8)->get();
    	
		View::share('navs',$navs);
		View::share('hot',$hot);
		View::share('new',$new);
    }
}
