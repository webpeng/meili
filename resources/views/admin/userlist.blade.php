<!DOCTYPE html>
<html lang="en">

    <head>

        @include('admin.header')
        <link type="text/css" rel="stylesheet" href="{{asset('/bootstrap/css/bootstrap.min.css')}}" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
	<script>
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});</script>
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
                                用户列表
                            </h1>
                            <ol class="breadcrumb">
                                <li class="active">
                                    <i class="fa fa-dashboard"></i>
                                    总条数：{{$count}}

                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->
                    <form class="row form-group" method="post" action="{{url('/admin/userlist')}}">
                        <div class="col-md-3">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <input class="form-control" name="keyword" value="{{$keyword}}" placeholder="请输入账号或昵称"/>                      
                        </div>
                        <div class="col-md-3">
                            <select class="form-control" name="sex">
                                <option vlaue="男">男</option>  
                                <option value="女">女</option>                                  
                            </select>                          
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-success" type="submit">搜索</button>
                        </div>

                    </form>   

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>编号</th>
                                            <th>用户名</th>                                           
                                            <th>昵称</th>
                                            <th>性别</th>
                                            <th>所属分组</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach( $userlist as $user) 
                                        <tr class="active">
                                            <td><a href="./userdetail.php">{{$user->uid}}</a></td>
                                            <td><a href="#">{{$user->uname}}</a></td>
                                            <td><a href="#">{{$user->nickname}}</a></td>
                                            <td><a href="#">{{$user->sex}}</a></td>
                                            <td>
                                                <select id="aa" name="groupid" uid="{{$user->uid}}" class="form-control">
                                                    @foreach ($groups as $group)
                                                    @if ($user->groupid == $group->id)
                                                    <option value="{{$group->id}}" selected >{{$group->title}}</option>
                                                    @else
                                                    <option value="{{$group->id}}" >{{$group->title}}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <a href="/admin/user/destroy/{{$user->uid}}"><button type="button" class="btn btn-xs btn-primary">删除</button></a>
                                                <a href="/admin/user/edit/{{$user->uid}}"><button type="button" class="btn btn-xs btn-primary">编辑</button></a>
                                                <!--<a href="/admin/user/edit/{{$user->uid}}"><button type="button" class="btn btn-xs btn-primary">查看</button></a>-->
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <p>
                                    {!!$userlist->appends(['keyword' => $keyword,])->render()!!}

                                </p>
                            </div>
                        </div>

                    </div>
                    
                <!-- /.container-fluid -->

            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        @include('admin.footer')
        <script src="{{asset("/js/admin/user_index.js")}}"></script>
    </body>

</html>
