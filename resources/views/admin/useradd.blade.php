<!DOCTYPE html>
<html lang="en">

    <head>

        @include('admin.header')

    </head>

    <body>

        <div id="wrapper">

            @include('admin.nav')

            <div id="page-wrapper" style="min-height: 900px">

                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                添加用户
                            </h1>
                            <ol class="breadcrumb">
                                <li class="active">
                                    <i class="fa fa-dashboard"></i> 添加用户
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-sm-5">
                            <h1>添加用户</h1>
                            

                            <form role="form" action="/admin/user/store" method="post" class="a1">
                                <input type="hidden"name="_token" value="{{csrf_token()}}">
                                <div class="form-group">
                                    <label class="control-label" for="inputSuccess">用户名</label>
                                    <input type="text" name="uname" class="form-control" id="inputSuccess">
                                </div>
                                <div class="form-group">
                                    <label class="control-label"for="inputSuccess">昵称</label>
                                    <input type="text" name="nickname" class="form-control" id="inputSuccess">
                                </div>
                                <div class="form-group">
                                    <label class="control-label"for="inputSuccess">性别</label>
                                    <input type="radio" name="sex" id="inputSuccess" value="男" checked >男  
                                    <input type="radio" name="sex" id="inputSuccess" value="女">女
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="inputSuccess">密码</label>
                                    <input type="text" name="password" class="form-control" id="inputSuccess">
                                </div>
                                <div class="form-group">
                                    <label class="control-label"for="inputSuccess">确认密码</label>
                                    <input type="text" name="repassword" class="form-control" id="inputSuccess">
                                </div>
                                 
                                <div class="form-group">
                                    <button type="reset" class="btn btn-default">重置</button>
                                    <button type="submit" class="btn btn-success">添加</button>
                                </div>

                            </form>
                            <div class="a1">
                                @if(session("info"))
                                <ul>
                                    <li>{{session("info")}}</li>
                                </ul>
                                @endif
                                @if(count($errors)>0)
                                <ul>
                                    @foreach($errors->all()as $tmp)
                                    <li>{{$tmp}}</li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>

                        </div>
                    </div>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        @include('admin.footer')

    </body>

</html>
