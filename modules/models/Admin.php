<?php

namespace app\modules\models;
use yii\db\ActiveRecord;
use Yii;

class Admin extends ActiveRecord
{
	public $rememberMe = true;
	
	public function rules()
	{
		return [
			['adminuser','required','message'=>'管理员账号不能为空','on'=>'login'],
			['adminpass','required','message'=>'管理员密码不能为空','on'=>'login'],
		];
	}
	
	public static function tableName()
    {
        return "{{%admin}}";
    }
	
	public function login($data){
		$this->scenario = "login";
		if($this->load($data) && $this->validate()){
			echo "222222222";
			return true;
		}
		return false;
	}
}