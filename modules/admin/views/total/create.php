<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Total */

$this->title = 'Create Total';
$this->params['breadcrumbs'][] = ['label' => 'Totals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="total-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
