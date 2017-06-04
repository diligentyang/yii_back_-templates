<?php
	use yii\widgets\LinkPager;
?>
<div class="row">
			<ol class="breadcrumb">
				<li><a href="<?php echo yii\helpers\Url::to(['back/index']);?>"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">管理员管理</li>
			</ol>
</div><!--/.row-->

<div class="row">
	<div class="col-md-12" style="height:80px;">
		<h3 class="pull-left">管理员列表</h3>
		<button type="button" class="btn btn-success pull-right" style="margin-top:20px;" data-toggle="modal" data-target="#add">添加管理员</button>
	</div>
</div>
<table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>管理员账号</th>
          <th>管理员邮箱</th>
          <th>最后登录时间</th>
		  <th>最后登录IP</th>
		  <th>添加时间</th>
		  <th>操作</th>
        </tr>
      </thead>
      <tbody>
		<?php foreach($managers as $manager):?>
			<tr>
			  <th scope="row">1</th>
			  <td><?php echo $manager->adminuser; ?></td>
			  <td> <?php echo $manager->adminemail; ?></td>
			  <td><?php echo date('Y-m-d H:i:s', $manager->logintime); ?></td>
			  <td> <?php echo long2ip($manager->loginip); ?></td>
			  <td> <?php echo date("Y-m-d H:i:s", $manager->createtime); ?></td>
			  <td>删除</td>
			</tr>
		<?php endforeach;?>
      </tbody>
    </table>
<?php
echo LinkPager::widget([
    'pagination' => $pagination,
]);
?>
	
<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">添加管理员</h4>
      </div>
	  <form class="form-horizontal">
		  <div class="modal-body">
			
				  <div class="form-group">
					<label for="inputEmail3" class="col-sm-3 control-label">管理员账号</label>
					<div class="col-sm-9">
					  <input type="email" class="form-control" id="inputEmail3" placeholder="管理员账号">
					</div>
				  </div>
				  <div class="form-group">
					<label for="inputPassword3" class="col-sm-3 control-label">管理员邮箱</label>
					<div class="col-sm-9">
					  <input type="password" class="form-control" id="inputPassword3" placeholder="管理员邮箱">
					</div>
				  </div>
				   <div class="form-group">
					<label for="inputPassword3" class="col-sm-3 control-label">密码</label>
					<div class="col-sm-9">
					  <input type="password" class="form-control" id="inputPassword3" placeholder="密码">
					</div>
				  </div>
				   <div class="form-group">
					<label for="inputPassword3" class="col-sm-3 control-label">确认密码</label>
					<div class="col-sm-9">
					  <input type="password" class="form-control" id="inputPassword3" placeholder="确认密码">
					</div>
				  </div>
			
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
			<button type="button" class="btn btn-primary">确定</button>
		  </div>
	  </form>
	</div>
  </div>
</div>