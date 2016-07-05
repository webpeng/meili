<!DOCTYPE html>
<html lang="en">

    <head>

        @include('admin.header')
        <link type="text/css" rel="stylesheet" href="{{asset('/bootstrap/css/bootstrap.min.css')}}" />
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
                                权限管理
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


                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>编号</th>
                                            <th>名称</th>                                           
                                            <th>权限</th>                                           
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="active">
                                        </tr>
                                        @foreach($groups as $group)
                                        <tr>
                                            <td>{{$group->id}}</td>
                                            <td>{{$group->title}}</td>
                                            @foreach($groups as $group)
                                        <tr>
                                            <td>{{$group->id}}</td>
                                            <td>{{$group->title}}</td>
                                            <td>
                                                @foreach ($rules as $rule)
                                                @if(in_array($rule->id, explode(",", $group->rules)))
                                                <input type="checkbox" name="ruleid[]" value="{{$rule->id}}" checked />{{$rule->title}}
                                                @else
                                                <input type="checkbox" name="ruleid[]" value="{{$rule->id}}" />{{$rule->title}}
                                                @endif
                                                @endforeach
                                            </td>
                                            <td><a href="">编辑</a> <a href="">删除</a></td>
                                        </tr>
                                        @endforeach
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                
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


