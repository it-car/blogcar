<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Config;
use Input;
use Validator;

class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Config::orderBy('conf_order','asc')->get();
        // dd($data);
        //遍历当前页的所有配置项，根据配置项的field_type和field_value的值在conf_content内容
        foreach ($data as $k => $v) {
            switch ($v->field_type) {
                case 'input':
                    //增加一个数组元素用于存放配置内容
                $data[$k]->_html = '<input type="text" class="lg" name="conf_content[]" value="'.$v->conf_content.'">';
                    break;
                case 'textarea':
                    $data[$k]->_html = '<textarea name="conf_content[]" style="resize: none;">'.$v->conf_content.'</textarea>';
                    break;
                case 'radio':
                // echo $v->field_value;
                    $arr = explode('，', $v->field_value);
                    // dd($arr);
                    $str = '';
                    foreach ($arr as $m => $n) {
                        // 1|开启
                        $r = explode('|', $n);
                        // dd($r);
                        // 判断radio按钮的默认状态
                        $c = $v->conf_content==$r[0] ? 'checked':'';
                        $str .='<input type="radio" name="conf_content[]" value="'.$r[0].'" '.$c.'>'.$r[1];
                    }
                    // echo $str;
                    $data[$k]->_html = $str;
                    break;
            }
        }

        return view('admin.Config.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.config.add');
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
            'conf_title' => 'required',
            'conf_name' => 'required'
        ];
        $message = [
            'conf_title.required' => '配置项title必须填写',
            'conf_name.required' => '配置项name必须填写'
        ];
        $validator = Validator::make($input, $rules,$message);

        if ($validator->passes()) {
            $res = Config::create($input);
            if($res){
                return redirect('admin/config');
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
    public function edit($conf_id)
    {
        //从数据库中找到你点击的那一条数据
        $field = Config::find($conf_id);
        return view('admin.config.edit',compact('field'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $conf_id)
    {
        //$conf_id提交表单传过来的那个数据edit.blade.php中
        //获取输入来的数据，'_token','_method'除外，因为这两个不需要写进数据库
        $input = Input::except('_token','_method');
        //更新传进来（$conf_id）的那条数据
        $res = Config::where('conf_id',$conf_id)->update($input);
        // dd($res);
        if ($res) {
            $this->putConfigFile();
            return redirect('admin/config');
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
    public function destroy($conf_id)
    {
        //echo "2222";
        $res = Config::where('conf_id',$conf_id)->delete();
        // dd($res);
        if($res){
            $this->putConfigFile();
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

// 分割线——~~~~~~~~~~~~


    //配置项修改changeContent
    public function changeContent(){
        // dd(Input::all());
        $input = Input::all();
        // dd($input['conf_id']);
        foreach ($input['conf_id'] as $k => $v) {
            Config::where('conf_id',$v)->update(['conf_content'=>$input['conf_content'][$k]]);
        }
        $this->putConfigFile();
        return back()->with('errors','配置项更新成功！');
    }

    //把配置项写入文件
    public function putConfigFile(){
        //1、利用数据模型的pluck()方法，选择数据表中指定字段值，存放在数组中，最后的all()可过滤数据，仅仅保留数组内容
        $conf = Config::pluck('conf_content','conf_name')->all();
        // dd($conf);
        //2.设置配置文件存放路径
        $path = base_path()."\config\myConfig.php";
        // dd($path);
        //3.设置配置文件格式，其中的var_export()方法可将数组装换为字符串
        $str = "<?php return ".var_export($conf,true).";";
        //4.利用file_put_contents()写入文件
        file_put_contents($path,$str);

        //读取文件中的信息
        // echo \Illuminate\Support\Facades\Config::get('myConfig.web_title');
    }

    //配置项排序功能
    public function changeOrder()
    {
        //
        // return 'aaaa';
        $input = Input::all();
        //到数据库中找到用户正在输入的那个框的序号id是第几个
        $nav = Config::find($input['conf_id']);
        //把用户输入的conf_order值赋值给数据表中的order里面
        $nav->conf_order = $input['conf_order'];
        //保存到数据库中
        $res = $nav->update();
        if($res){
            $this->putConfigFile();
            $data = [
                'status' => 0,
                'msg' => '配置项排序更改成功！'
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '配置项排序更改失败，请稍后重试！'
            ];
        }
        return $data;
    }
}