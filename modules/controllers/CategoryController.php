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
		$options = [];
		$list = $model->getCategoryOptions();
		foreach($list as $cate){
			$options[$cate['cateid']] = $cate['title'];
		}
		array_unshift($options,"添加顶级分类");
		return $this->render('addcategory',['list'=>$options,'model'=>$model]);
	}
	
	//获取分类列表
	public function actionCategorylist(){
		$model = new Category;
		$data = $model->getCategoryOptions();
		return $this->render('categorylist',['data'=>$data,'model'=>$model]);
	}
	
	//删除栏目
	public function actionDelcategory()
	{
		try {
            $cateid = Yii::$app->request->get('cateid');
            if (empty($cateid)) {
                throw new \Exception('参数错误');
            }
            $data = Category::find()->where('parentid = :pid', [":pid" => $cateid])->one();
            if ($data) {
                throw new \Exception('该分类下有子类，不允许删除');
            }
            if (!Category::deleteAll('cateid = :id', [":id" => $cateid])) {
                throw new \Exception('删除失败');
            }
        } catch(\Exception $e) {
            Yii::$app->session->setFlash('info', $e->getMessage());
        }
        return $this->redirect(['category/categorylist']);
				
		/**
		$cateid = intval(Yii::$app->request->get('cateid'));
		if(empty($cateid)){
			Yii::$app->session->setFlash('info', 'ceteid非法');
			$this->redirect(['category/categorylist']);
		}else{
			$model = new Category();
			$data = Category::find()->where('parentid = :pid', [":pid" => $cateid])->one();
			if($data){
				Yii::$app->session->setFlash('info', '该分类下还有子类无法删除');
				$this->redirect(['category/categorylist']);
				return false;
			}else if($model->deleteAll("cateid = :cateid",[':cateid'=>$cateid])){
				Yii::$app->session->setFlash('info', '删除成功');
				$this->redirect(['category/categorylist']);
				return false;
			}else{
				Yii::$app->session->setFlash('info', '删除失败');
				$this->redirect(['category/categorylist']);
				Yii::$app->end();
			}
			
		}
		**/
	}
	
}