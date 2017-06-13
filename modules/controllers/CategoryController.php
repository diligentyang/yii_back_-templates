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
		if(Yii::$app->request->isPost){
			$data = Yii::$app->request->post();
			$res = $model->addCat($data);
			if($res){
				Yii::$app->session->setFlash("info","添加成功");
			}
		}
		$list = $model->getCategoryOptions();
		array_unshift($list,"添加顶级分类");
		return $this->render('addcategory',['list'=>$list,'model'=>$model]);
	}
	
	public function actionCategorylist(){
		
		return $this->render('categorylist');
	}
}