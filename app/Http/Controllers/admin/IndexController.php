<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;
use App\Http\Model\User;
use Crypt;

class IndexController extends CommController
{
    //后台首页
	public function index(){
		return view('admin.index');
	}
	//后台首页info
	public function info(){
		return view('admin.info');
	}
	//退出
	public function quit(){
		//清空登录的那个session值就是要重新登录了，就是退出
		// session()->flush();
		// session()->forget('user');
		session(['user'=>null]);
		return redirect('admin/login');
	}
	//修改密码 
	public function pass(){
		// $str = 'eyJpdiI6IlwvSlhlNDRsbnZGcmJ3K1wvbXJBWTIxdz09IiwidmFsdWUiOiJCRGN1dWRFTzFvOFowbkZtNFNSUEZ3PT0iLCJtYWMiOiI0ZDQ5NTY0MWQ0NjUzNjQzOTFhMmU4MmZlOTE4NTQ0M2YwYzQ3MDhkODU3ZGJlYmJiZWU3NzMzMTgzMDMxNGE0In0=';
		// echo Crypt::decrypt($str);

		if ($input = Input::all()) {
			// dd($input);
			// 1.设置验证规则
			$rules =[
	            'password' => 'required|between:6,12|confirmed',
	        ];
	        // 2.自定义提示信息
	        $message = [
	        	'password.required'=>'新密码不能为空',
	        	'password.between'=>'新密码长度需在6-12位',
	        	'password.confirmed'=>'新密码与确认密码不一致',
	        ];
	        // 3.创建validator对象，进行验证
			$validator = Validator::make($input, $rules,$message);
			// 4.执行验证并返回验证结果
	        if ($validator->passes()) {
	        	// return 'yes';

	        	//get()拿到的是一个数组要循环，可用于用户重名等情况
	        	// $user = User::where('name',session('user.name'))->get();
	       		
	       		//first()取到的是id等于1的数据，所以只能修改id等于1的密码,所以不够完美有bug
	            $user = User::first();
	            $_password = Crypt::decrypt($user->pass);
	            
	            // dd($_password);
	            // return $_password;
	            // 5.检验原密码是否正确
	            if ($input['password_o'] == $_password) {
	            	// return 'yes';
	            	$user->pass = Crypt::encrypt($input['password']);
	            	// $user->save();
	            	$user->update();
	            	// return redirect('admin/info');
	            	return back()->with('errors','密码修改成功');
	            } else {
	            	return back()->with('errors','原密码不正确');
	            }
	        }else{
	        	// dd($validator->errors()->all());
	        	return back()->withErrors($validator);
	        }
		} else {
			return view('admin.pass');
		}
	}
}
