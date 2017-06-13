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
	
	public function getCategoryOptions()
	{
		//$list = $model->find()->asArray()->all();
		$list = self::find()->all();
		$list = \yii\helpers\ArrayHelper::toArray($list);//转换成数组形式
		$list = $this->getOptions($list);
		dump($list);
		return $list;
	}
	
	//获取排序后的分类
	public function getOptions($list,$parentid = 0,$level = 0){
		static $arrTree = [];
		if(empty($list)){
			return false;
		}
		$level++;
		foreach($list as $key => $val){
			if($val['parentid'] == $parentid){
				$val['level'] = $level;
				$arrTree[] = $val;
				unset($list[$key]);
				$this->getOptions($list, $val['cateid'], $level);
			}
		}
		
		return $arrTree;
	}
	
}