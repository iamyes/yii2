<?php

namespace app\modules\dish\models;

use Yii;

/**
 * This is the model class for table "total".
 *
 * @property integer $id
 * @property integer $dish_id
 * @property integer $ingredients_id
 *
 * @property Dish $dish
 * @property Ingredients $ingredients
 */
class Total extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'total';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dish_id', 'ingredients_id'], 'required'],
            [['dish_id', 'ingredients_id'], 'integer'],
            [['dish_id'], 'exist', 'skipOnError' => true, 'targetClass' => Dish::className(), 'targetAttribute' => ['dish_id' => 'id']],
            [['ingredients_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ingredients::className(), 'targetAttribute' => ['ingredients_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dish_id' => 'Dish ID',
            'ingredients_id' => 'Ingredients ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDish()
    {
        return $this->hasOne(Dish::className(), ['id' => 'dish_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIngredients()
    {
        return $this->hasOne(Ingredients::className(), ['id' => 'ingredients_id']);
    }

    /*Функция считает сколько заполненно полей, а также сколько было найдено совпадений ингредиентов в блюдах*/

    public static function resultIngredient($name = null, $name2 = null, $name3 = null, $name4 = null, $name5 = null){
        if($name){
            $name = $name;
            $i_post++;
        } 
        if($name2){
            $name2 = $name2;
            $i_post++;
        } 
        if($name3){
            $name3 = $name3;
            $i_post++;
        } 
        if($name4){
            $name4 = $name4;
            $i_post++;
        } 
        if($name5){
            $name5 = $name5;
            $i_post++;
        } 

        if($i_post < 2){
            return $i_post;
        }

        /*foreach ($result as $res) {
            $result .= $res;
        }*/
        $rows = (new \yii\db\Query())
        ->select(['dish_id'])
        ->from('total')
        ->where(['ingredients_id' => [$name, $name2, $name3, $name4, $name5]])
        ->orderBy('dish_id ASC')
        ->all();

        return $rows;
        
    }
}
