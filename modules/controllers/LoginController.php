<?php

namespace app\modules\controllers;

use yii\web\Controller;
use app\modules\models\Admin;
use Yii;

class LoginController extends Controller
{
	public function actionIndex()
    {
		$errors = [];
		$this->layout =false;
		$model = new Admin;
		if(Yii::$app->request->isPost){
			$post = Yii::$app->request->post();
			if($model->login($post)) {
				$this->redirect(['back/index']);
				Yii::$app->end();
			}else{
				$errors = $model->getErrors();
			}
		}				
		return $this->render('index',['model'=>$model,'errors'=>$errors]);
    }
}
