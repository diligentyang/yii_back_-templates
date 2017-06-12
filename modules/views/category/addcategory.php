<div class="row">
			<ol class="breadcrumb">
				<li><a href="<?php echo yii\helpers\Url::to(['back/index']);?>"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">添加分类</li>
			</ol>
</div><!--/.row-->
<div class="row" style="margin-top:20px;">
	<form class="form-horizontal col-sm-6">
	  <div class="form-group">
		<label for="categorylist" class="col-sm-2 control-label">上级分类</label>
		<div class="col-sm-10">
			<select class="form-control" id="categorylist">
				<option select>|---顶级分类</option>
				<option>|---家电</option>
				<option>|---|---冰箱</option>
				<option>|---百货</option>
				<option>|---日用品</option>
			</select>
		</div>
	  </div>
	  <div class="form-group">
		<label for="categoryname" class="col-sm-2 control-label">分类名称</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control" id="categoryname" placeholder="分类名称">
		</div>
	  </div>
	  <div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
		  <button type="submit" class="btn btn-success">添加分类</button>
		</div>
	  </div>
	</form>
</div>
