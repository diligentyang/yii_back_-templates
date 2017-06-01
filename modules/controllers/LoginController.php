<?php

namespace app\modules\controllers;

use yii\web\Controller;
use app\modules\models\Admin;
use Yii;

class LoginController extends Controller
{
	public function actionIndex()
    {
	$this->layout =false;
	$model = new Admin;
					
        return $this->render('index',['model'=>$model]);
    }
}
