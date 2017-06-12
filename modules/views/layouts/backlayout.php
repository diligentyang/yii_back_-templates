<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>后台管理系统</title>

<link href="<?php echo \Yii::$app->request->baseUrl;?>/assets/admin/css/bootstrap/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo \Yii::$app->request->baseUrl;?>/assets/admin/css/backstyle.css" rel="stylesheet">
<link href="<?php echo \Yii::$app->request->baseUrl;?>/assets/admin/css/jquery.mCustomScrollbar.css" rel="stylesheet" />
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>后台管理</span>Admin</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> User <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
							<li><a href="#"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
							<li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li class="active"><a href="<?php echo yii\helpers\Url::to(['back/index']);?>"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
			<li><a href="<?php echo yii\helpers\Url::to(['/admin/back/adminlist']);?>"><span class="glyphicon glyphicon-user"></span> 管理员管理</a></li>
			<li class="parent ">
				<a href="#">
					<span class="glyphicon glyphicon-list"></span> 分类管理 <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="glyphicon glyphicon-s glyphicon-plus"></em></span> 
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li>
						<a class="" href="#">
							<span class="glyphicon glyphicon-share-alt"></span> 分类列表
						</a>
					</li>
					<li>
						<a class="" href="<?php echo yii\helpers\Url::to(['category/addcategory']);?>">
							<span class="glyphicon glyphicon-share-alt"></span> 添加分类
						</a>
					</li>
				</ul>
			</li>
			<li><a href="charts.html"><span class="glyphicon glyphicon-stats"></span> Charts</a></li>
			<li><a href="tables.html"><span class="glyphicon glyphicon-list-alt"></span> Tables</a></li>
			<li><a href="forms.html"><span class="glyphicon glyphicon-pencil"></span> Forms</a></li>
			<li><a href="panels.html"><span class="glyphicon glyphicon-info-sign"></span> Alerts &amp; Panels</a></li>
			<li class="parent ">
				<a href="#">
					<span class="glyphicon glyphicon-list"></span> Dropdown <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="glyphicon glyphicon-s glyphicon-plus"></em></span> 
				</a>
				<ul class="children collapse" id="sub-item-2">
					<li>
						<a class="" href="#">
							<span class="glyphicon glyphicon-share-alt"></span> Sub Item 1
						</a>
					</li>
					<li>
						<a class="" href="#">
							<span class="glyphicon glyphicon-share-alt"></span> Sub Item 2
						</a>
					</li>
					<li>
						<a class="" href="#">
							<span class="glyphicon glyphicon-share-alt"></span> Sub Item 3
						</a>
					</li>
				</ul>
			</li>
			<li role="presentation" class="divider"></li>
			<li><a href="<?php echo yii\helpers\Url::to(['login/logout']);?>"><span class="glyphicon glyphicon-log-out"></span> Login out</a></li>
		</ul>
	</div><!--/.sidebar-->
	
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<?php echo $content;?>
	</div>	<!--/.main-->
	
	<!--错误提示，小模态框-->
	<div class="modal fade bs-example-modal-sm" id="errorsm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
	  <div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title" id="mySmallModalLabel">错误提示：</h4>
			</div>
			<div class="modal-body" id="errorcontent">
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">确定</button>
			</div>
		</div>
	  </div>
	</div>
	
	
	<script src="<?php echo \Yii::$app->request->baseUrl;?>/assets/admin/js/jquery-1.11.1.min.js"></script>
	<script src="<?php echo \Yii::$app->request->baseUrl;?>/assets/admin/js/bootstrap.min.js"></script>
    <script src="<?php echo \Yii::$app->request->baseUrl;?>/assets/admin/js/jquery.mCustomScrollbar.js"></script>
	<script>
		(function($){
            $(window).load(function(){
                $("#sidebar-collapse").mCustomScrollbar({
                    autoDraggerLength: false,
                    theme: "dark-thin",
                    mouseWheelPixels: 150,
                    //autoHideScrollbar: true,
					advanced:{
						updateOnContentResize:true,
					}
                });
            });
        })(jQuery);
		
		$(document).ready(function(){
			$("#subadd").click(function(){
				$.ajax({
					url:"<?php echo yii\helpers\Url::to(['back/addmanager']);?>",
					type:'post',
					dataType: "json",
					data:$("#addmanager").serialize(),
					error:function(){
						alert("ajax 请求错误");
					},
					success:function(data,status){
						if(typeof(data.success) == "undefined" || data.success!="ok"){
							$("#errorcontent").html(data.errors);
							$('#errorsm').modal('show');
						}else{
							window.location.reload();//刷新当前页
						}
					}
				})
			});
		});
	</script>
</body>

</html>