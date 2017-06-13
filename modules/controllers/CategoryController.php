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
		$list = $model->getCategoryOptions();
		return $this->render('addcategory',['list'=>$list,'model'=>$model]);
	}
}