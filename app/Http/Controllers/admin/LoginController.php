<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
require_once 'resources/views/org/code/Code.class.php';
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Crypt;
use App\Http\Model\User;

class LoginController extends CommController
{
    //
    public function login(){
		if($input = Input::all()){
			$code = new \Code();
			$_code = $code->get();
			//只可一个一个用户
			// if ($_code != strtoupper($input['code'])) {
			// 	return back()->with('msg',"验证码错误");
			// }
			// $user = User::first();
			// if($user->name != $input['username'] || Crypt::decrypt($user->pass) != $input['password']){
			// 	return back()->with('msg',"用户名或密码错误");
			// }else{
			// 	session(['user'=>$user]);
			// 	return redirect('admin/index');
			// }


			if ($_code == strtoupper($input['code'])) {
				//从数据库中拿到所有的用户名
				$user = User::where('name',$input['username'])->get();
				$isAuth = false;
				//遍历用户名看看用户输入的用户名和数据库中保存的name是否一致
				foreach ($user as $one) {
					//再判断输入的密码与数据库中的pass是否正确
					if (Crypt::decrypt($one->pass)==$input['password']) {
						$isAuth = true;
						//保存到session里面
						session(['user'=>$one]);
						break;
					} 
				}
				if(!$isAuth){
					return back()->with('msg',"用户名或密码错误");
				}else{
					return redirect('admin/index');
				}

			} else {
				return back()->with('msg',"验证码错误");
			}
		}else{
			// dd($_SERVER);
			// session(['user'=>null]);清空session
			return view('admin.login');
		}
	}


	public function code(){
		$code = new \Code();
		$code->make();
	}
}
