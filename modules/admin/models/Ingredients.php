<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "ingredients".
 *
 * @property integer $id
 * @property string $name
 * @property integer $active
 *
 * @property Total[] $totals
 */
class Ingredients extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ingredients';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'active'], 'required'],
            [['active'], 'integer'],
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
            'active' => 'Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTotals()
    {
        return $this->hasMany(Total::className(), ['ingredients_id' => 'id']);
    }

    public static function sortIngredients(){
        $ingredients = Ingredients::find(['id', 'name'])->indexBy('id')->asArray('id')->all();
        $result = array();
        foreach($ingredients as $key => $food){
            $result[$key] = $food;
        }
        return $ingredients;
    }
}
