<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
class CommonController extends Controller
{
   public function __construct() 
     {
        //登录初始化设置
        if (!Session::has("userData")) {
			//return redirect("/login");       
                header("Location:/admin/login");  
            exit;
	}
    }
}
