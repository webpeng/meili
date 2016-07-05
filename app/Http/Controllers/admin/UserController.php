<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Gregwar\Captcha\CaptchaBuilder;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use Validator;
use Hash;
use DB;
class UserController extends CommonController 
{
   
    //用户列表
    public function userlist(Request $request)
    {
       $users = DB::table("user")
               ->leftJoin("user_group", "user.uid", "=", "user_group.uid")
                ->where("user.uname", 'LIKE','%'.$request->get("keyword").'%')
                ->orWhere("user.nickname", "LIKE", "%".$request->get('keyword')."%")             
                ->orderBy("user.uid", "DESC")
                ->paginate(4);
       $count=DB::table("user")
                ->where("uname", 'LIKE','%'.$request->get("keyword").'%')
                ->orWhere("nickname", "LIKE", "%".$request->get('keyword')."%")
               ->count();
                 //查询所有分组信息  用以在列表中显示
                $groups = DB::table("group_rule")->get();
        return view("admin.userlist", ["userlist" => $users, "groups" => $groups,"count" => $count, 'keyword' => $request->get('keyword')]);
        
    }
    //搜索分页
//   public function (Request $request) {
//        //查询所有用户记录
//         $users = DB::table("user")
//                ->where("uname", 'LIKE','%'.$request->get("keyword").'%')
//                ->orWhere("nickname", "LIKE", "%".$request->get('keyword')."%")
//               
//                ->orderBy("uid", "DESC")
//                ->paginate(8);
//        return view("admin.userlist", ["users" => $users, 'keyword' => $request->get('keyword')]);
//	}
    public function useradd()
    {
        return view("admin.useradd");
    }
     public function userdetail(Request $request)
    {   //获取数据
         $userRec = DB::table("user")->where("uid", session("userData")->uid)->first();
         $data = $request->except("uname","nickname");
//         var_dump($userRec);die;
        if(Session::get("userData"))
        {
         
//         DB::table("user")->where("uid", $request->only("uid"));
        return view("admin.userdetail", compact("userRec"));
        }
    }
    //添加用户
    public function store(Request $request){
        //接受数据
        
        //有效性验证
        $this->validate($request,[
            "uname" => "required|unique:user",
            "password" => "required|between:6,15",
            "repassword" => "required|same:password",
            "nickname" => "required",          
        ],[
            "uname.required" => "账号不能为空",
            "uname.unique" => "该账号已被占用",
            "password.required" => "密码未填写",
            "password.between" => "密码长度应为6-15位",
            "repassword.required" => "确认密码未填写",
            "repassword.same" => "两次密码输入不一致",
            "nickname.required" => "昵称未填写",
        ]);
        //数据入库
       $data = $request->except("_token","repassword");
        $data["password"] = Hash::make($data["password"]);
        //设置默认头像
        $data["avartar"] = "/uploads/avartar/asd.png";
        if(DB::table("user")->insert($data))
        {
            return redirect("/admin/userlist");
        }else{
            return back()->with(["info"=>"添加失败"]);
        }
                
        //返回提示
    }
   public function destroy($uid) {
		//
       
		if (DB::table("user")->where("uid", $uid)->delete()) 
		{                  
			return redirect("admin/userlist");
		} else 
		{
			return back()->with(["info" => "删除失败"]);
		}
	}
    public function edit($id) {
		//查找用户记录
//		dd($request->get("uuid"));
		$userRec = DB::table("user")->where("uid", $id)->first();
		//在模板中显示
//                dd($userRec);
		return view("admin.edit", compact("userRec"));
	}    
    public function update(Request $request) {
            //验证数据
        
            $this->validate($request, [
                    "password" => "between:6,15",
                    "repassword" => "same:password",
                    "nickname" => "required",
            ],[
                    "password.between" => "密码长度应为6-15位",
                    "repassword.same" => "两次密码输入不一致",
                    "nickname.required" => "昵称未填写",
            ]);
            
            
            //保存用户
            $data = $request->except("uid", "_token", "repassword");
            
            if (!empty($data["password"])) //如果有密码 则进行Hash加密
            {
                    $data["password"] = Hash::make($data["password"]);
            } else //否则去除密码字段
            {
                    unset($data["password"]);
            }
//            var_dump($data);die;
            
            if (DB::table("user")->where("uid", $request->only("uid"))->update($data))
            {
//                echo 1;
                    return redirect("/admin/userlist");
            }
    }
    public function setGroup(Request $request)
        {
            //修改user_group表中 某用户uid对应的分组编号groupid
            if (FALSE !== DB::table("user_group")->where("uid", $request->get("uid"))->update(["groupid" => $request->get("groupid")]))
            {
                return response()->json(["status" => 1, "info" => "修改成功"]);
            } else
            {
                return response()->json(["status" => 0, "info" => "修改失败"]);
            }
        }
}











