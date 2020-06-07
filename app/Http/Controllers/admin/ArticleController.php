<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Category;
use App\Http\Model\Article;
use Input;
use Validator;

class ArticleController extends CommController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Article::orderBy('art_id','desc')->paginate(8);
        return view('admin.article.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $data = [];
        $data = (new Category())->tree();
        // dd($data);
        return view('admin.article.add',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input = Input::except('_token');
        $input['art_time'] = date('YmdHis');//添加时间字段，就是当前提交文章时间
        // dd($input);
        $rules =[
            'art_content' => 'required',
            'art_title' => 'required'
        ];
        $message = [
            'art_content.required'=>'文章内容不能为空',
            'art_title.required'=>'文章标题不能为空'
        ];
        $validator = Validator::make($input, $rules,$message);

        if ($validator->passes()) {
            $res = Article::create($input);
            if($res){
                return redirect('admin/article');
            }else{
                return back()->with('errors','数据增加失败,请稍后重试！');
            }
        } else {
            return back()->withErrors($validator);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($art_id)
    {
        //$cate_id接收的是你点击的那条数据index.blade.php中
        // dd($cate_id);
        //从数据库中找到你点击的那一条数据
        $data = (new Category())->tree();
        $field = Article::find($art_id);
        return view('admin.article.edit',compact('field','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $art_id)
    {
        //$cate_id提交表单传过来的那个数据edit.blade.php中
        //获取输入来的数据，'_token','_method'除外，因为这两个不需要写进数据库
        $input = Input::except('_token','_method');
        //更新传进来（$cate_id）的那条数据
        $res = Article::where('art_id',$art_id)->update($input);
        // dd($res);
        if ($res) {
            return redirect('admin/article');
        } else {
            return back()->with('errors','文章更新失败，请稍后再试！');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($art_id)
    {
        $res = Article::where('art_id',$art_id)->delete();
        //如果顶级分类被删除，则原来顶级分类中的子类提升为顶级分类
        // Category::where('cate_pid',$cate_id)->update(['cate_pid'=>0]);
        // dd($res);
        if($res){
            $data = [
                'status' => 0,
                'msg' => '删除成功！'
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '文章删除失败，请稍后重试！'
            ];
        }
        return $data;
    }
}
