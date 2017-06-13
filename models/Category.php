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
		$list = $this->getOptionsAno($list);//无限极分类	
		dump($list);
		exit();
		$list = $this->addPrefix($list);//去除多余项，添加前缀
		return $list;
	}
	
	//获取排序后的分类，递归算法
	public function getOptions($list,$parentid = 0,$level = 0){
		$arrTree = [];
		if(empty($list)){
			return [];
		}
		$level++;
		foreach($list as $key => $val){
			if($val['parentid'] == $parentid){
				$val['level'] = $level;
				$arrTree[] = $val;
				unset($list[$key]);
				$arrTree = array_merge($arrTree,$this->getOptions($list, $val['cateid'], $level));//找其子类合并
			}
		}
		
		return $arrTree;
	}
	
	//获取排序后的分类，非递归算法，借助栈的思想
	public function getOptionsStack($list)
	{
		$list = array_reverse($list);
		$arr = [];
		$temp = [];
		foreach($list as $key=>$val){//先取出所有的顶级分类
			if($val['parentid']==0){
				$val['level'] = 1;
				unset($list[$key]);
				array_push($temp,$val);
			}
		}
		while(count($temp)>0){
			$par = array_pop($temp);//array_pop,然后将其子分类入栈
			$arr[] = $par;
			foreach($list as $key=>$val){
				if($val['parentid']==$par['cateid']){
					$val['level'] = $par['level']+1;
					unset($list[$key]);
					array_push($temp,$val);
				}
			}
		}
		return $arr;
	}
	
	//无限极分类，递归算法2
	public function getOptionsAno($list,$root=0)
	{
		$tree=array();
		foreach($list as $key=> $val){

			if($val['parentid']==$root){
				//获取当前$pid所有子类 
					unset($list[$key]);
					if(! empty($list)){
						$child=$this->getOptionsAno($list,$val['cateid']);
						if(!empty($child)){
							$val['_child']=$child;
						}                   
					}              
					$tree[]=$val; 
			}
		}   
		return $tree;
	}
	
	
	//无限极分类，非递归算法2
	public function getOptionsAnother($list,$root=0){
		// 创建Tree
		$tree = array();
		dump($list);
		if(is_array($list)) {
			// 创建基于主键的数组引用
			$refer = array();
			foreach ($list as $key => $data) {
				$refer[$data['cateid']] =& $list[$key];
			}
			dump($refer);
			foreach ($list as $key => $data) {
				// 判断是否存在parent
				$parentId =  $data['parentid'];
				if ($root == $parentId) {
					$tree[] =& $list[$key];
				}else{
					if (isset($refer[$parentId])) {
						$parent =& $refer[$parentId];
						$parent['_child'][] =& $list[$key];
					}
				}
			}
		}
		return $tree;
	}
	
	//添加前缀 |--- 并且去除多余项
	public function addPrefix($list,$prefix="|---"){
		$arr = [];
		foreach($list as $val){//将$prefix重复level次，拼接到原title处
			$arr[$val['cateid']] = str_repeat($prefix,$val['level']).$val['title'];
		}
		return $arr;
	}
	
}