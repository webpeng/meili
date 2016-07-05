<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CuxiaoController extends Controller
{
    //本周促销 
    public function index()
    {
        return view("Home.cuxiao");
    }
}
