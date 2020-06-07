<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Links;
use Input;
use Validator;

class LinksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Links::orderBy('link_order','asc')->get();
        // dd($data);
        return view('admin.links.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.links.add');
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
            'link_order' => 'required',
            'link_name' => 'required',
            'link_title' => 'required',
            'link_url' => 'required'
        ];
        $message = [
            'link_order.required' => '链接order必须填写',
            'link_name.required' => '链接name必须填写',
            'link_title.required' => '链接title必须填写',
            'link_url.required' => '链接url必须填写'
        ];
        $validator = Validator::make($input, $rules,$message);

        if ($validator->passes()) {
            $res = Links::create($input);
            if($res){
                return redirect('admin/links');
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
    public function edit($link_id)
    {
        //从数据库中找到你点击的那一条数据
        $field = Links::find($link_id);
        return view('admin.links.edit',compact('field'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $link_id)
    {
        //$link_id提交表单传过来的那个数据edit.blade.php中
        //获取输入来的数据，'_token','_method'除外，因为这两个不需要写进数据库
        $input = Input::except('_token','_method');
        //更新传进来（$link_id）的那条数据
        $res = Links::where('link_id',$link_id)->update($input);
        // dd($res);
        if ($res) {
            return redirect('admin/links');
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
    public function destroy($link_id)
    {
        //echo "2222";
        $res = Links::where('link_id',$link_id)->delete();
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

    //友情链接排序功能
    public function changeOrder()
    {
        //
        // return 'aaaa';
        $input = Input::all();
        //到数据库中找到用户正在输入的那个框的序号id是第几个
        $link = Links::find($input['link_id']);
        //把用户输入的link_order值赋值给数据表中的order里面
        $link->link_order = $input['link_order'];
        //保存到数据库中
        $res = $link->update();
        if($res){
            $data = [
                'status' => 0,
                'msg' => '友情链接排序更改成功！'
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '友情链接排序更改失败，请稍后重试！'
            ];
        }
        return $data;
    }
}
