<?php

namespace app\modules\controllers;

use yii\web\Controller;
use app\modules\models\Admin;
use app\modules\controllers\CommonController;
use yii\data\Pagination;

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
		$model = Admin::find();
		$count = $model->count();
		$pageSize = 1;
		$pagination = new Pagination(['totalCount' => $count,'pageSize' => $pageSize]);
		$managers = $model->offset($pagination->offset)->limit($pagination->limit)->all();
		return $this->render('adminlist',['managers'=>$managers,'pagination'=>$pagination]);
	}
}