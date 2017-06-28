<?php

namespace app\components;

use yii\base\Widget;
use app\models\Slider;
use Yii;

class SliderWidget extends Widget{

	public $tpl;
	public $data;
	public $tree;
	public $menuHtml;

	public function init(){
		parent::init();
		if($this->tpl === null){
			$this->tpl = 'slider';
		}
		$this->tpl .= '.php';
	}


	public function run(){
		$this->data = Slider::find()->indexBy('id')->asArray()->all();
		$this->tree = $this->getTree();
		$this->menuHtml = $this->getMenuHtml($this->tree);
		

		return $this->menuHtml;
	}

	protected function getTree(){
		$tree = [];
		foreach($this->data as $id=>&$node){
				$tree[$id] = &$node;
		}
		return $tree;
	}

	protected function getMenuHtml($tree){
		$str = '';
		foreach($tree as $category){
			$str .= $this->catToTemplate($category);
		}
		return $str;
	}

	protected function catToTemplate($category){
		ob_start();
		include __DIR__ . '/menu_tpl/' .  $this->tpl;
		return ob_get_clean();
	}

}