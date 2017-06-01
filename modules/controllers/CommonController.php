<?php

namespace app\modules\controllers;

use yii\web\Controller;
use Yii;

class CommonController extends Controller
{
	public function init()
	{
		session_start();
		var_dump($_SESSION);exit();
		
		var_dump(Yii::$app->session['admin']);exit();
		if(Yii::$app->session['admin']['isLogin']!=1){
			return $this->redirect(['/admin/login/index']);
		}
	}
}