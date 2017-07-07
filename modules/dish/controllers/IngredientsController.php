<?php

namespace app\modules\dish\controllers;

use app\modules\dish\models\Ingredients;
use app\modules\dish\models\Total;
use app\modules\dish\models\Dish;
use Yii;

class IngredientsController extends \yii\web\Controller
{
   	public function actionIndex()
	{
	    $model = new Ingredients();

		

	    if ($model->load(Yii::$app->request->post())) {
	        if ($model->validate()) {
	        	$i_post = 0; //счетчик количества заполненных полей

	        	$model->name2 = Yii::$app->request->post()["Ingredients"]['name2'];
	        	$model->name3 = Yii::$app->request->post()["Ingredients"]['name3'];
	        	$model->name4 = Yii::$app->request->post()["Ingredients"]['name4'];
	        	$model->name5 = Yii::$app->request->post()["Ingredients"]['name5'];



	        	

	        	$res = Total::resultIngredient($model->name, $model->name2, $model->name3, $model->name4, $model->name5);
	        	if($res < 2){
		            $message = "Выберите больше ингредиентов";
		            return $this->render('index', ['model' => $model, 'message' => $message]);
		        }else{
		        	$result = array();
			        $part = array();
			        $count = array();
			        $i = 1;
			        foreach ($res as $key => $value) {
			            foreach($value as $k => $val){
			                if($c != $val){
			                    $c = $val; // $c промежуточная переменная для сохранения $val;
			                    $i = 1;
			                }else{
			                    $i++;
			                    if($i == 5){
			                        $result[$val] = $c;
			                        unset($part[$val]);
			                    }elseif($i >= 2 || $i <= 4){
			                        $part[$val] = $c;
			                    }

			                }
			                
			            }
			        }
			        if($result){
			        	$res = Dish::find()
					    ->where(['id' => $result])
					    ->all();
					    return $this->render('index', ['model' => $model, 'res' => $res
		    			]);
			        }else{
		        		foreach ($part as $key => $counts) {
			        		$count[$key] = Total::find()->select(['ingredients_id'])->where(['dish_id' => $key])->count();
			        	}
			        	arsort($count);
			        	$res = Dish::find()
					    ->where(['id' => $count])
					    ->all();
					    return $this->render('index', ['model' => $model, 'res' => $res
		    			]);
		        	} 
		        }
	        }
	    }

	    return $this->render('index', ['model' => $model]);
	}

}
