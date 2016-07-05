<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ZhucheController extends Controller
{
    //本周促销 
        public function zhuche()
	{
		
           //这里是网站首页注册跳转
           return view('Home.zhuche');
	}
      
}
