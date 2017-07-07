<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\dish\models\Ingredients;

/* @var $this yii\web\View */
/* @var $model app\modules\dish\models\Ingredients */
/* @var $form ActiveForm */
?>
<div class="ingredients-index">
	<h3>Укажите ингредиенты искомого блюда</h3>

    <?php $form = ActiveForm::begin(); ?>

        <?php 
        $ingredients = Ingredients::find()->where(['active' => 1])->all();
    	$items = ArrayHelper::map($ingredients,'id','name');
    	$params = [
	        'prompt' => ''
	    ];

        echo $form->field($model, 'name')->dropDownList($items, $params)->label(false);
        echo $form->field($model, 'name2')->dropDownList($items, $params)->label(false);
        echo $form->field($model, 'name3')->dropDownList($items, $params)->label(false);
        echo $form->field($model, 'name4')->dropDownList($items, $params)->label(false);
        echo $form->field($model, 'name5')->dropDownList($items, $params)->label(false); 
        ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
    
    <?php if($res): ?>
    <h3>Блюда</h3>
    <ul class="container">
    
		<?php foreach($res as $food): ?>
			<li><?= $food['name']; ?></li>
		<?php endforeach; ?>
	
    </ul>
   	<?php elseif($message): ?>
   		<h3><?= $message ?></h3>
    <?php else: ?>
    	<h3>Ничего не найдено</h3>
    <?php endif; ?>

</div><!-- ingredients-index -->
