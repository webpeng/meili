<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="{{url('/admin/userdetail')}}">你好管理员:{{Session::get('userData')->nickname}}</a><a href="/admin/logout" class="navbar-brand">退出</a>
	</div>
	
	<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
	<div class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="nav navbar-nav side-nav">
			<li>
				<a href="javascript:;" data-toggle="collapse" data-target="#user-admin"><i class="fa fa-fw fa-user"></i> 用户管理 <i class="fa fa-fw fa-caret-down"></i></a>
				<ul id="user-admin" class="collapse">
					<li>
						<a href="/admin/useradd">添加用户</a>
					</li>
					<li>
						<a href="/admin/userlist">用户列表</a>
					</li>           
				</ul>
			</li>
			<li>
				<a href="javascript:;" data-toggle="collapse" data-target="#goods-admin"><i class="fa fa-fw fa-reorder"></i> 商品管理 <i class="fa fa-fw fa-caret-down"></i></a>
				<ul id="goods-admin" class="collapse">
					<li>
						<a href="">添加商品</a>
					</li>
					<li>
						<a href="">商品列表</a>
					</li>
                                        <li>
						<a href="">商品分类</a>
					</li>
				</ul>
			</li>   
                        <li>
				<a href="javascript:;" data-toggle="collapse" data-target="#submenu-admin"><i class="fa fa-fw fa-submenu"></i>分组管理<i class="fa fa-fw fa-caret-down"></i></a>
				<ul id="submenu-admin" class="collapse">
					<li>
						<a href="{{ url('/admin/group') }}"">分组列表</a>
					</li>
					<li>
						<a href="{{ url('admin/group/create') }}"">添加分组</a>
					</li>
                                        
				</ul>
			</li> 
                        <li>
				<a href="javascript:;" data-toggle="collapse" data-target="#member-admin"><i class="fa fa-fw fa-member"></i>权限管理<i class="fa fa-fw fa-caret-down"></i></a>
				<ul id="member-admin" class="collapse">
					<li>
						<a href="{{ url('/admin/group') }}">所有权限</a>
					</li>
					<li>
						<a href="{{ url('/admin/group/create') }}"">添加权限</a>
					</li>
                                        
				</ul>
			</li>  
		</ul>
           
	</div>
	<!-- /.navbar-collapse -->
</nav>