<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //后台主页
	
        public function index()
	{
		//return "这是网站前台首页";
           return view('Home.Index');
	}
      
        
 
        public function caizhuang()
	{
		//return "这是网站后台";
           //这里是网站首页彩妆跳转
           return view('Home.caizhuang');
	}
        public function denglu()
	{
		//return "这是网站后台";
           //这里是网站首页彩妆跳转
           return view('Home.denglu');
	}
         public function mianbuhufu()
	{
		//return "这是网站前台";
           //这里是网站首页面部护肤跳转
           return view('Home.mianbuhufu');
	} public function xianshitemai()
	{
		//return "这是网站前台";
           //这里是网站首页限时特卖跳转
           return view('Home.xianshitemai');
	} public function guibinzhuanxiang()
	{
		//return "这是网站前台";
           //这里是网站首页贵宾专享跳转
           return view('Home.guibinzhuanxiang');
	}
        public function suoyoupinpai()
	{
		//return "这是网站前台";
           //这里是网站首页所有品牌跳转
           return view('Home.suoyoupinpai');
	}
        
   
}
