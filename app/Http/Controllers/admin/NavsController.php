<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Navs;
use Input;
use Validator;

class navsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Navs::orderBy('nav_order','asc')->get();
        // dd($data);
        return view('admin.navs.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.navs.add');
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
        // dd($input);
        $rules =[
            'nav_order' => 'required',
            'nav_name' => 'required',
            'nav_alias' => 'required',
            'nav_url' => 'required'
        ];
        $message = [
            'nav_order.required' => '导航order必须填写',
            'nav_name.required' => '导航name必须填写',
            'nav_alias.required' => '导航alias必须填写',
            'nav_url.required' => '导航url必须填写'
        ];
        $validator = Validator::make($input, $rules,$message);

        if ($validator->passes()) {
            $res = Navs::create($input);
            if($res){
                return redirect('admin/navs');
            }else{
                return back()->with('errors','数据增加失败');
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
    public function edit($nav_id)
    {
        //从数据库中找到你点击的那一条数据
        $field = Navs::find($nav_id);
        return view('admin.navs.edit',compact('field'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nav_id)
    {
        //$nav_id提交表单传过来的那个数据edit.blade.php中
        //获取输入来的数据，'_token','_method'除外，因为这两个不需要写进数据库
        $input = Input::except('_token','_method');
        //更新传进来（$nav_id）的那条数据
        $res = Navs::where('nav_id',$nav_id)->update($input);
        // dd($res);
        if ($res) {
            return redirect('admin/navs');
        } else {
            return back()->with('errors','更新数据失败，请稍后再试！');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nav_id)
    {
        //echo "2222";
        $res = Navs::where('nav_id',$nav_id)->delete();
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

    //自定义导航排序功能
    public function changeOrder()
    {
        //
        // return 'aaaa';
        $input = Input::all();
        //到数据库中找到用户正在输入的那个框的序号id是第几个
        $nav = Navs::find($input['nav_id']);
        //把用户输入的nav_order值赋值给数据表中的order里面
        $nav->nav_order = $input['nav_order'];
        //保存到数据库中
        $res = $nav->update();
        if($res){
            $data = [
                'status' => 0,
                'msg' => '自定义导航排序更改成功！'
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '自定义导航排序更改失败，请稍后重试！'
            ];
        }
        return $data;
    }
}