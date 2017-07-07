<?php

use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Totals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="total-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Total', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            //'dish_id',
            [
                'attribute' => 'dish_id',
                'value' => function($data) use ($dish){
                    return $dish[$data->dish_id]['name'];
                },
                'format' => 'html',
            ],
            //'ingredients_id',
            [
                'attribute' => 'ingredients_id',
                'value' => function($data) use ($ingredients){
                    return $ingredients[$data->ingredients_id]['name'];
                },
                'format' => 'html',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
