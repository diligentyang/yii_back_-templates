<?php
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
	use yii\bootstrap\Alert;
?>
<div class="row">
			<ol class="breadcrumb">
				<li><a href="<?php echo yii\helpers\Url::to(['back/index']);?>"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">分类列表</li>
			</ol>
</div><!--/.row-->

<div class="row">
	<div class="col-md-12" style="height:80px;">
		<h3 class="pull-left">分类列表</h3>
		<a type="button" class="btn btn-success pull-right" style="margin-top:20px;" href="<?php echo yii\helpers\Url::to(['category/addcategory']);?>"> + 添加分类 </a>
	</div>
</div>

<table class="table">
      <thead>
        <tr>
          <th>分类id</th>
          <th>分类名称</th>
          <th>分类创建时间</th>
		  <th>操作</th>
        </tr>
      </thead>
      <tbody>
			<tr>
			  <th> - </th>
			  <td>22222</td>
			  <td>333333333</td>
			  <td><a href="<?php echo yii\helpers\Url::to(['back/delmanager','adminid'=>$manager->adminid]);?>">删除</a></td>
			</tr>
      </tbody>
    </table>