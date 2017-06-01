<?php

namespace app\Modules\controllers;

use yii\web\Controller;

class LoginController extends Controller
{
	public function actionIndex()
    {
		$this->layout =false;
        return $this->render('index');
    }
}