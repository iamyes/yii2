<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "dish".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Total[] $totals
 */
class Dish extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dish';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTotals()
    {
        return $this->hasMany(Total::className(), ['dish_id' => 'id']);
    }

    public static function sortDish(){
        $dish = Dish::find(['id', 'name'])->indexBy('id')->asArray('id')->all();
        $result = array();
        foreach($dish as $key => $food){
            $result[$key] = $food;
        }
        return $dish;
    }
}
