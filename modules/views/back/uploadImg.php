<?php
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
?>
<div class="row">
			<ol class="breadcrumb">
				<li><a href="<?php echo yii\helpers\Url::to(['back/index']);?>"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">图片管理</li>
			</ol>
</div><!--/.row-->

<div class="row">
	<div class="col-md-12" style="height:80px;">
		<h3 class="pull-left">图片管理</h3>
		<button type="button" class="btn btn-success pull-right" style="margin-top:20px;" data-toggle="modal" data-target="#add"> + 添加图片</button>
	</div>
</div>

<form method="post" action="" enctype="multipart/form-data">
	<input type="hidden" name="_csrf" value="<?php echo Yii::$app->request->getCsrfToken(); ?>">
	<input type="file" name="pic">
	<input type="submit" value="提交">
</form>