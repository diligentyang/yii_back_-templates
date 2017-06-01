<?php

namespace app\modules\controllers;

use yii\web\Controller;

class LoginController extends Controller
{
	public function actionIndex()
    {
		$this->layout =false;
        return $this->render('index');
    }
}