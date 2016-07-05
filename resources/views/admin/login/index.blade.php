<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<title>登录页</title>

<!-- Bootstrap Core CSS -->
<link href="{{$bootadmin_styel}}/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="{{$bootadmin_styel}}/css/sb-admin.css" rel="stylesheet">

<!-- Morris Charts CSS -->
<link href="{{$bootadmin_styel}}/css/plugins/morris.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="{{$bootadmin_styel}}/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">用户登录</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="/admin/logTodo" method="post">
                            <fieldset>
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="form-group row">
                                    <div class="col-sm-12">用户名：<input class="form-control" placeholder="请输入用户名" name="uname" type="text" autofocus></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">密码：<input class="form-control" placeholder="请输入密码" name="password" type="password" value=""></div>
                                </div>
								
                                <div class="form-group row">
                                    <div class="col-sm-4"><img src="/captcha/{{rand()}}" onclick=" this.src=this.src.replace(/\d+$/,'')+ Math.random()" style="width:80px; height: 40px;"></div>
                                    <div class="col-sm-8"><input class="form-control" placeholder="请输入左侧验证码" name="code" type="text" value=""></div>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button  class="btn btn-lg btn-success btn-block">登录</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<!-- jQuery -->
	<script src="{{$bootadmin_styel}}/js/jquery.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="{{$bootadmin_styel}}/js/bootstrap.min.js"></script>

	<!-- Morris Charts JavaScript -->
	<script src="{{$bootadmin_styel}}/js/plugins/morris/raphael.min.js"></script>
	<script src="{{$bootadmin_styel}}/js/plugins/morris/morris.min.js"></script>
	<script src="{{$bootadmin_styel}}/js/plugins/morris/morris-data.js"></script>

</body>

</html>
