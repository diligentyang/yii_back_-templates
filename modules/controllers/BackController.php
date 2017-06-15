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
		$pageSize = Yii::$app->params['adminlist_pagesize'];
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
				$str = "";
				foreach($errors as $val){	
					for($i=0;$i<count($val);$i++){
						$str .= '<p>'.$val[$i].'</p>';
					}
				}
				echo json_encode(['errors'=>$str]);
			}
		}else{
			echo json_encode(['errors'=>'请求非法']);
		}
	}
	
	/*删除管理员*/
	public function actionDelmanager()
	{
		$adminid = intval(Yii::$app->request->get("adminid"));
		if(empty($adminid) || $adminid == 1){
			$this->redirect(['back/adminlist']);
			Yii::$app->session->setFlash('info','该用户不可删除');
			return false;
		}
		$model = new Admin;
		if($model->deleteAll("adminid = :id",[':id'=>$adminid])){
			Yii::$app->session->setFlash('info', '删除成功');
			$this->redirect(['back/adminlist']);
			return false;
		}else{
			Yii::$app->session->setFlash('info','删除失败');
			$this->redirect(['back/adminlist']);
			return false;
		}
	}
	
	/*图片管理（上传到七牛云）*/
	public function actionUploadImg(){
		if(Yii::$app->request->isPost){
			//dump($_FILES['pic']['tmp_name']);
			$ak = 'your AccessKey';
			$sk = 'your SecretKey';
			$domain = '*****.bkt.clouddn.com';
			$bucket = '存储空间名称';
			$qiniu = new \crazyfd\qiniu\Qiniu($ak, $sk,$domain, $bucket);
			$key = time();
			$qiniu->uploadFile($_FILES['pic']['tmp_name'],$key);
			$url = $qiniu->getLink($key);
			dump($url);
		}
		return $this->render('uploadImg');
	}
	
}