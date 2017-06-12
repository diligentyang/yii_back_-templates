<?php

namespace app\models;

use yii\db\ActiveRecord;
use Yii;

class Category extends ActiveRecord
{
	public static function tableName()
    {
        return "{{%category}}";
    }
	
	public function attributeLabels()
    {
        return [
            'parentid' => '上级分类',
            'title' => '分类名称'
        ];
    }
	
	
}