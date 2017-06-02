<?php

namespace app\modules\controllers;

use yii\web\Controller;
use app\modules\models\Admin;
use Yii;

class LoginController extends Controller
{
	/*登录页面*/
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
	
	/*找回密码*/
	public function actionSeekpass(){
		$errors = [];
		$this->layout =false;
		$model = new Admin;
		if(Yii::$app->request->isPost){
			$post = Yii::$app->request->post();
			 if($model->seekPass($post)) {
				Yii::$app->session->setFlash('info', '电子邮件已经发送成功，请查收');
			}else{
				$errors = $model->getErrors();
			} 
		}				
		return $this->render('seekpass',['model'=>$model,'errors'=>$errors]);
	}
	
	/*根据邮件链接重置密码*/
	public function actionMailchangepass(){
		$this->layout = false;
        $time = Yii::$app->request->get("timestamp");
        $adminuser = Yii::$app->request->get("adminuser");
        $token = Yii::$app->request->get("token");
        $model = new Admin;
        $myToken = $model->createToken($adminuser, $time);
		if ($token != $myToken) {
            $this->redirect(['admin/login']);
            Yii::$app->end();
        }
        if (time() - $time > 300000) {
            $this->redirect(['admin/login']);
            Yii::$app->end();
        }
		
		if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
			$model->adminuser = $adminuser;
            if ($model->changePass($post)) {
                Yii::$app->session->setFlash('info', '密码修改成功');
            }else{
				//var_dump($model->getErrors());exit();
				$errors = $model->getErrors();
			} 
        }
        
        return $this->render("mailchangepass", ['model'=>$model,'errors'=>$errors]);
	}
}
