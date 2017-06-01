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
}