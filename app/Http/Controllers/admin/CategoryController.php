<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Category;
use Input;
use Validator;

class CategoryController extends CommController
{
    /**
     * Display a listing of the resource.
     *get.admin/category
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$category = Category::all();
        //字段都写死了，不可复用
        // $data = $this->getTree($category);
        //利用传参，可复用
        //$data = $this->getTree($category,'cate_name','cate_id','cate_pid',0);
        // return view('admin.category.index')->with('data',$data);


        // $category = Category::tree();
        $category = (new Category)->tree();
        // dd($category);
        return view('admin.category.index')->with('data',$category);
    }


    /*分类树功能  可用递归实现  这里是用了嵌套循环*/
    //利用传参，可复用  $field_id='id',如果有参数传过来就用传过来的参数，如果没有就用默认值的id
    /*public function getTree($data,$field_name,$field_id='id',$field_pid='pid',$pid=0)
    {
        $arr = array();
        foreach ($data as $k => $v) {
            //循环找到$v->cate_pid == 0的（新闻，娱乐，体育）即父亲
            if ($v->$field_pid == $pid) {
                $data[$k]['_'.$field_name] =$data[$k][$field_name];
                $arr[] = $data[$k];
                foreach ($data as $m => $n) {
                    //循环找到$n->cate_pid == $v->cate_id,就是父亲的子类
                    //$n->$field_pid -->子类中的父id字段   $v->$field_id -->父id字段
                    if ($n->$field_pid == $v->$field_id) {
                        $data[$m]['_'.$field_name] = '|-->'.$data[$m][$field_name];
                        $arr[] = $data[$m];
                    }
                }
            }
        }
        return $arr;
    }*/

    //字段都写死了，不可复用
   /* public function getTree($data)
    {
        // dd($data);
        $arr = array();
        foreach ($data as $k => $v) {
            //循环找到$v->cate_pid == 0的（新闻，娱乐，体育）即父亲
            if ($v->cate_pid == 0) {
                $data[$k]['_cate_name'] =$data[$k]['cate_name'];
                $arr[] = $data[$k];
                foreach ($data as $m => $n) {
                    //循环找到$n->cate_pid == $v->cate_id,就是父亲的子类
                    //$n->cate_pid -->子类中的父id字段   $v->cate_id -->父id字段
                    if ($n->cate_pid == $v->cate_id) {
                        $data[$m]['_cate_name'] = '|-->'.$data[$m]['cate_name'];
                        $arr[] = $data[$m];
                    }
                }
            }
        }
        // dd($arr);
        return $arr;
    }*/


    /**
     * Show the form for creating a new resource.
     *添加分类 get/head.admin/category/create
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //从数据库中找到cate_pid == 0的数据（新闻，娱乐，体育）
        // $data = Category::where('cate_pid',0)->get();
        $data = (new Category)->tree();
        // dd($data);
        return view('admin.category.add',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *添加分类提交 post.admin/category
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input = Input::except('_token');
        // dd($input);
        $rules =[
            'cate_name' => 'required',
            'cate_title' => 'required'
        ];
        $message = [
            'cate_name.required'=>'分类名称不能为空',
            'cate_title.required'=>'分类标题不能为空'
        ];
        $validator = Validator::make($input, $rules,$message);

        if ($validator->passes()) {
            $res = Category::create($input);
            if($res){
                return redirect('admin/category');
            }else{
                return back()->with('errors','数据增加失败');
            }
        } else {
            return back()->withErrors($validator);
        }
    }

    /**
     * Display the specified resource.
     *GET|HEAD.admin/category/{category} 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *修改GET|HEAD.admin/category/{category}/edit
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($cate_id)
    {
        //$cate_id接收的是你点击的那条数据index.blade.php中
        // dd($cate_id);
        //从数据库中找到你点击的那一条数据
        $field = Category::find($cate_id);
        //从数据库中找到cate_pid == 0的数据（新闻，娱乐，体育）
        // $data = Category::where('cate_pid',0)->get();
        $data = (new Category)->tree();
        return view('admin.category.edit',compact('field','data'));
    }

    /**
     * Update the specified resource in storage.
     *更新修改内容PUT|PATCH.admin/category/{category}
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cate_id)
    {
        //$cate_id提交表单传过来的那个数据edit.blade.php中
        //获取输入来的数据，'_token','_method'除外，因为这两个不需要写进数据库
        $input = Input::except('_token','_method');
        //更新传进来（$cate_id）的那条数据
        $res = Category::where('cate_id',$cate_id)->update($input);
        // dd($res);
        if ($res) {
            return redirect('admin/category');
        } else {
            return back()->with('errors','更新数据失败，请稍后再试！');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *DELETE.admin/category/{category}
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($cate_id)
    {
        //echo "2222";
        $res = Category::where('cate_id',$cate_id)->delete();
        //如果顶级分类被删除，则原来顶级分类中的子类提升为顶级分类
        Category::where('cate_pid',$cate_id)->update(['cate_pid'=>0]);
        // dd($res);
        if($res){
            $data = [
                'status' => 0,
                'msg' => '删除成功！'
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '分删除失败，请稍后重试！'
            ];
        }
        return $data;
    }

    //分类排序功能
    public function changeOrder()
    {
        // return 'aaaa';
        $input = Input::all();
        //到数据库中找到用户正在输入的那个框的序号id是第几个
        $cate = Category::find($input['cate_id']);
        //把用户输入的cata_order值赋值给数据表中的order里面
        $cate->cate_order = $input['cate_order'];
        //保存到数据库中
        $res = $cate->update();
        if($res){
            $data = [
                'status' => 0,
                'msg' => '分类排序更改成功！'
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '分类排序更改失败，请稍后重试！'
            ];
        }
        return $data;
    }


}
