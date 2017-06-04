<?php

namespace app\modules\controllers;

use yii\web\Controller;
use app\modules\controllers\CommonController;

Class BackController extends CommonController
{
	public $layout = "backlayout";
	
	public function actionIndex()
	{
		return $this->render('index');
	}
	
	/*管理员列表*/
	public function actionAdminlist()
	{
		return $this->render('adminlist');
	}
}