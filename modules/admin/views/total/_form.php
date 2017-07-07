<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\admin\models\Ingredients;
use app\modules\admin\models\Dish;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Total */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="total-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php 
        $ingredients = Ingredients::find()->where(['active' => 1])->all();
    	$items = ArrayHelper::map($ingredients,'id','name');
    	$params = [
	        'prompt' => ''
	    ];
	?>
	<?php 
        $dish = Dish::find()->all();
    	$items_dish = ArrayHelper::map($dish,'id','name');
    	$params = [
	        'prompt' => ''
	    ];
	?>

    <?= $form->field($model, 'dish_id')->dropDownList($items_dish, $params) ?>

    <?= $form->field($model, 'ingredients_id')->dropDownList($items, $params) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
