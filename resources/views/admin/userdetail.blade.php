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
                                用户:{{$userRec->uname}}
                            </h1>
                            <ol class="breadcrumb">
                                <li class="active">
                                    <i class="fa fa-dashboard"></i>{{$userRec->uname}}
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->


                    <div class="row">
                        <div class="col-sm-6">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tbody>
                                        <tr class="row">
                                            <td class="col-sm-4">姓名：</td>
                                            <td class="col-sm-8">{{$userRec->uname}}</td>
                                        </tr>
                                        <tr class="row">
                                            <td class="col-lg-2">昵称：</td>
                                            <td class="col-lg-10">{{$userRec->nickname}}</td>
                                        </tr>
                                        <tr class="row">
                                            <td class="col-lg-6">头像：</td>
                                           
                                            <td class="col-lg-12"><img src="{{$userRec->avartar}}"></td>
                                        </tr>                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
<!--                    <div class="col-lg-8">
                    <button type="button" class="btn btn-xs btn-primary">修改</button>
                    </div>-->
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        @include('admin.footer')

    </body>

</html>
