<?php

namespace app\modules\controllers;

use app\modules\controllers\CommonController;
use Yii;

class CategoryController extends CommonController
{
	public $layout = "backlayout";
	
	public function actionAddcategory()
	{
		return $this->render('addcategory');
	}
}