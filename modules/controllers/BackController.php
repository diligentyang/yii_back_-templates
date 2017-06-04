<?php

namespace app\modules\controllers;

use yii\web\Controller;
use app\modules\models\Admin;
use app\modules\controllers\CommonController;
use yii\data\Pagination;
use Yii;

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
		$model = new Admin;
		$data = Admin::find();
		$count = $data->count();
		$pageSize = 1;
		$pagination = new Pagination(['totalCount' => $count,'pageSize' => $pageSize]);
		$managers = $data->offset($pagination->offset)->limit($pagination->limit)->all();
		return $this->render('adminlist',['managers'=>$managers,'pagination'=>$pagination,'model'=>$model]);
	}
	
	/*添加管理员*/
	public function actionAddmanager()
	{
		if(Yii::$app->request->isAjax){
			$post = Yii::$app->request->post();
			$model = new Admin;
			if ($model->addmanager($post)) {
				echo json_encode(['success'=>'ok']);
			}else{
				$errors = $model->getErrors();
				$arr = [];
				foreach($errors as $val){	
					for($i=0;$i<count($val);$i++){
						$arr[] = $val[$i];
					}
				}
				echo json_encode(['errors'=>$errors]);
			}
		}else{
			echo json_encode(['errors'=>['请求非法']]);
		}
	}
}