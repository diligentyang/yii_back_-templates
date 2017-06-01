<?php

namespace app\modules\models;
use yii\db\ActiveRecord;
use Yii;

class Admin extends ActiveRecord
{
	public $rememberMe = true;
	
	public static function tableName()
    {
        return "{{%admin}}";
    }
	
	public function rules()
	{
		return [
			['adminuser','required','message'=>'管理员账号不能为空','on'=>'login'],
			['adminpass','required','message'=>'管理员密码不能为空','on'=>'login'],
			['rememberMe', 'boolean', 'on' => 'login'],
			['adminpass','validatePass','on'=>'login'],
		];
	}
	
	public function validatePass()
	{
		if(!$this->hasErrors()){
			$data = self::find()->where('adminuser=:user and adminpass=:pass',[":user"=>$this->adminuser,":pass"=>md5($this->adminpass)])->one();
			if(is_null($data)){
				$this->addError("adminpass", "用户名或者密码错误");
			}
			
		}
	}
	
	public function login($data){
		$this->scenario = "login";
		if($this->load($data) && $this->validate()){
			 //做点有意义的事
            $lifetime = $this->rememberMe ? 24*3600 : 0;
            $session = Yii::$app->session;
            session_set_cookie_params($lifetime);//设置保存时间
            $session['admin'] = [
                'adminuser' => $this->adminuser,
                'isLogin' => 1,
            ];
			$_SESSION['ok'] = "abc";
			$loginip = Yii::$app->request->userIP;
			if($loginip == "::1"){
                $loginip = "127.0.0.1";
            }
            $loginip = ip2long($loginip);
			$this->updateAll(['logintime' => time(), 'loginip' => $loginip], 'adminuser = :user', [':user' => $this->adminuser]);
			return (bool)$session['admin']['isLogin'];
		}
		return false;
	}
}