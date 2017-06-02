<?php

namespace app\modules\controllers;

use yii\web\Controller;
use app\modules\controllers\CommonController;

Class BackController extends CommonController
{
	public function actionIndex()
	{
		$this->layout = "backlayout";
		return $this->render('index');
	}
}