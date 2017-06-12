<?php
    use yii\bootstrap\ActiveForm;
    use yii\helpers\Html;
?>
<div class="row">
			<ol class="breadcrumb">
				<li><a href="<?php echo yii\helpers\Url::to(['back/index']);?>"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">添加分类</li>
			</ol>
</div><!--/.row-->
<div class="row" style="margin-top:20px;">

	<?php
		$form = ActiveForm::begin([
			'fieldConfig' => [
				 'template' => '<div class="form-group">{label}<div class="col-sm-7">{input}</div><div class="col-sm-3">{error}</div></div>',
				 'labelOptions'=>['class'=>'col-sm-2 control-label'],
			],
			'options' => [
				'class' => 'form-horizontal col-sm-6',
			],
		]);
		
		echo $form->field($model,"parentid")->dropDownList($list,['class'=>'form-control']);
		echo $form->field($model, 'title')->textInput(['class' => 'form-control','placeholder'=>'分类名称']);	
	?>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<?php echo Html::submitButton('添加', ['class' => 'btn btn-success']); ?>
				<span>OR</span>
			<?php echo Html::resetButton('取消', ['class' => 'btn btn-info']); ?>
		</div>
	  </div>
	<?php ActiveForm::end(); ?>
</div>
