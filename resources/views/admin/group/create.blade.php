<!DOCTYPE html>
<html lang="en">

    <head>

        @include('admin.header')
<script src="{{ asset('/plugins/uploadify/jquery.uploadify.min.js') }}"></script>
<link type="text/css" rel="stylesheet" href="{{ asset('/plugins/uploadify/uploadify.css') }}" />
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
                                权限编辑
                            </h1>
                            <ol class="breadcrumb">
                                <li class="active">
                                    <i class="fa fa-dashboard"></i>权限编辑
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-sm-5" class="a1">
                            <h1>编辑权限</h1>                         
                            <form role="form"  name="edit" action="/admin/user/update" method="post" >
                                <input type="hidden"name="_token" value="{{csrf_token()}}">
                                <!--<input type="hidden" name="uid" value="{{$userRec->uid}}">-->
                                <div class="form-group">
                                    <label class="control-label" for="inputSuccess">名称：</label>
                                    <input type="text" name="title" value="" class="form-control" id="inputSuccess" />
                                </div>
                                <div class="form-group">
                                    <label class="control-label"for="inputSuccess">权限：</label>
                                    @foreach($rules as $rule)
                                    <input type="checkbox" name="id[]" value="{{$rule->id}}" id="inputSuccess">{{$rule->title}}
                                    @endforeach
                                </div>     
                        </div>
                        <div class="form-group">                            
                            <button type="submit" class="btn btn-success">保存</button>
                        </div>
                        </form>
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


