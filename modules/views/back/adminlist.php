<div class="row">
			<ol class="breadcrumb">
				<li><a href="<?php echo yii\helpers\Url::to(['back/index']);?>"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">管理员管理</li>
			</ol>
</div><!--/.row-->

<div class="row">
	<div class="col-md-12" style="height:80px;">
		<h3 class="pull-left">管理员列表</h3>
		<button type="button" class="btn btn-success pull-right" style="margin-top:20px;">添加管理员</button>
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
        <tr>
          <th scope="row">1</th>
          <td>Mark</td>
          <td>Otto</td>
          <td>@mdo</td>
          <td>@mdo</td>
          <td>@mdo</td>
          <td>@mdo</td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Jacob</td>
          <td>Thornton</td>
          <td>Thornton</td>
          <td>Thornton</td>
          <td>Thornton</td>
          <td>@fat</td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>Larry</td>
          <td>the Bird</td>
          <td>the Bird</td>
          <td>the Bird</td>
          <td>the Bird</td>
          <td>@twitter</td>
        </tr>
      </tbody>
    </table>