<?php

namespace app\modules\controllers;

use app\modules\controllers\CommonController;
use Yii;
use app\models\Category;

class CategoryController extends CommonController
{
	public $layout = "backlayout";
	
	public function actionAddcategory()
	{
		$model = new Category();
		//$list = $model->find()->asArray()->all();
		$list = $model->find()->all();
		$list = \yii\helpers\ArrayHelper::toArray($list);//转换成数组形式
		//var_dump($list);exit();
		return $this->render('addcategory',['list'=>$list,'model'=>$model]);
	}
}