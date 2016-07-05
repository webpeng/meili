<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Gregwar\Captcha\CaptchaBuilder;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use Validator;
use Hash;
class LoginController extends Controller
{
    //这里是登录控制器
    public function index()
    {
        return view("admin.login.index"); 
    }
    public function captcha($tmp) {
        //生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder;
        //可以设置图片宽高及字体
        $builder->build($width = 60, $height = 22, $font = null);
        //获取验证码的内容
        $phrase = $builder->getPhrase();

        //把内容存入session
        Session::flash('code', $phrase);
        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();
    }
    //登陆验证的方法
	public function logTodo(Request $request)
	{
         	$data = $request->only("uname", "password", "code");
		//验证码是否正确
		if (session("code") != $request->get("code"))
		{
			$request->flash();
			return back()->with(["info" => "验证码错误"]);
		}
              
		//有效性验证
		$data = $request->only("uname", "password", "code");
		
		$result = Validator::make($data, [
			"uname" => "required",
			"password" => "required|between:6,15"
		]);
            
		//如果验证失败 则回跳 并输出错误信息
		if ($result->fails())
		{
			return back()->with(["info" => $result->errors()]);
		}
		//账号是否存在 密码是否正确
		$userModel = new \App\User();
		$userRec = $userModel->where("uname", $data["uname"])->get()->first();
//                echo '2222';die;
//		dd($userRec);
//                var_dump($userRec);die;
		if (empty($userRec))
		{
			$request->flash();
			return back()->with(["info" => "账号不存在"]);
		} else if (!Hash::check($data["password"], $userRec->password))
		{
            
			$request->flash();
			return back()->with(["info" => "密码不正确"]);
		} else 
		{
			session(["userData" => $userRec]);
			return redirect("/admin");
		}
                
                
	}
	
	//退出登陆
	public function logout()
	{
		Session::forget("userData");
		return redirect("/admin/login");
	}
}
