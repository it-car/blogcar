<?php

namespace App\Http\Controllers\home;


// use App\Http\Model\Navs;
use App\Http\Model\Article;
use App\Http\Model\Category;
use App\Http\Model\Links;

class IndexController extends CommController
{
    //前台首页控制器
    public function index()
    {
    	//点击量最高的6篇文章（站长推荐）
    	$pics = Article::orderBy('art_views','desc')->take(6)->get();

    	//图文列表每页显示五篇
    	$data = Article::orderBy('art_time','desc')->paginate(5);

    	//友情链接
    	$links = Links::orderBy('link_order','asc')->get();

    	return view('home.index',compact('pics','data','links'));
    }

    //前台列表控制器
    public function cate($cate_id)
    {
    	//查看次数自增 increment('art_views',5)表示刷新一次＋5
    	Category::where('cate_id',$cate_id)->increment('cate_view');

    	$field = Category::find($cate_id);
    	//图文列表每页显示4篇
    	$data = Article::where('cate_id',$cate_id)->orderBy('art_time','desc')->paginate(4);
    	//获取子类
    	$subclass =Category::where('cate_pid',$cate_id)->get();
    	// dd($subclass);
    	return view('home.list',compact('field','data','subclass'));
    }

    //前台新闻控制器
    public function article($art_id)
    {
    	// echo $art_id;
    	// $field = Article::find($art_id);
    	//精确查找
    	$field = Article::join('category','article.cate_id','=','category.cate_id')->where('art_id',$art_id)->first();
    	// dd($field);
    	//获取上一篇下一篇
    	$article['pre'] = Article::where('art_id','<',$art_id)->orderBy('art_id','desc')->first();
    	$article['next'] = Article::where('art_id','>',$art_id)->orderBy('art_id','asc')->first();
    	//读取相关文章(6篇)
    	$data = Article::where('cate_id',$field->cate_id)->orderBy('art_id','desc')->take(6)->get();
    	//查看次数自增 increment('art_views',5)表示刷新一次＋5
    	Article::where('art_id',$art_id)->increment('art_views');
    	return view('home.new',compact('field','article','data'));
    }

}
