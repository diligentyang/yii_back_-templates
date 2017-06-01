<?php
    use yii\bootstrap\ActiveForm;
    use yii\helpers\Html;
	use yii\bootstrap\Alert;
?>
<!DOCTYPE html>
<html class="login-bg">
<head>
	<title>后台管理</title>
    
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
    <!-- bootstrap -->
    <link href="assets/admin/css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/admin/css/bootstrap/bootstrap-responsive.css" rel="stylesheet" />
    <link href="assets/admin/css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet" />

    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="assets/admin/css/layout.css" />
    <link rel="stylesheet" type="text/css" href="assets/admin/css/elements.css" />
    <link rel="stylesheet" type="text/css" href="assets/admin/css/icons.css" />

    <!-- libraries -->
    <link rel="stylesheet" type="text/css" href="assets/admin/css/lib/font-awesome.css" />
    
    <!-- this page specific styles -->
    <link rel="stylesheet" href="assets/admin/css/compiled/signin.css" type="text/css" media="screen" />

    <!-- open sans font -->

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body>


    <div class="row-fluid login-wrapper">
        <a class="brand" href="index.html"></a>


		<?php $form=ActiveForm::begin([
			'fieldConfig' =>[
				//'template'=>'{error}{label}{input}',//error 是错误信息，label是那个数据库的列名字，input是元素
				'template'=>'{input}'
			],
		]);?>
        <div class="span4 box">
            <div class="content-wrap">
                <h6>后台管理</h6>
				<?php echo $form->field($model, 'adminuser')->textInput(["class" => "span12", "placeholder" => "管理员账号"]); ?>
				<?php echo $form->field($model, 'adminpass')->passwordInput(["class" => "span12", "placeholder" => "管理员密码"]); ?>
				<!--
			   <input class="span12" type="password" placeholder="管理员密码" />
			   -->
                <a href="#" class="forgot">忘记密码?</a>
		
				<?php echo $form->field($model, 'rememberMe')->checkbox([
                    'id' => 'remember-me',
                    'template' => '<div class="remember">{input}<label for="remember-me">记住我</label></div>',
                ]); ?>
				<!--
                <div class="remember">
                    <input id="remember-me" type="checkbox" />
                    <label for="remember-me">记住我</label>
                </div>
				-->
				<?php echo Html::submitButton('登录', ["class" => "btn-glow primary login"]); ?>
				<!--
                <a class="btn-glow primary login" href="index.html">登录</a>
				-->
            </div>
        </div>
		<?php ActiveForm::end(); ?>
    </div>
	<?php
		
	?>
	<?php 
		if(!empty($errors)){
			foreach($errors as $val){	
				for($i=0;$i<count($val);$i++){
					echo Alert::widget([
						'options' => [
							'class' => 'alert-danger danger_alt', //这里是提示框的class
							'style' => 'text-align:center;',
						],
						'body' => $val[$i], //消息体
					]);
				}
			}
			
		}
	?>
	<!-- scripts -->
    <script src="assets/admin/js/jquery-latest.js"></script>
    <script src="assets/admin/js/bootstrap.min.js"></script>
    <script src="assets/admin/js/theme.js"></script>

    <!-- pre load bg imgs -->
    <script type="text/javascript">
        $(function () {
           setTimeout(function(){
			   $(".danger_alt").fadeOut();
		   },3000);

        });
    </script>

</body>
</html>
