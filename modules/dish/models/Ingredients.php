<?php

namespace app\modules\dish\models;

use Yii;

/**
 * This is the model class for table "ingredients".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Total[] $totals
 */
class Ingredients extends \yii\db\ActiveRecord
{
    public $name2;
    public $name3;
    public $name4;
    public $name5;
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
           // [['name'], 'required'],
            //[['name'], 'string', 'max' => 255],
        [['name'], 'safe'],

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
        return $this->hasMany(Total::className(), ['ingredients_id' => 'id']);
    }

   /* public function row(){
         $rows = (new \yii\db\Query())
            ->select(['id', 'ingredients_id'])
            ->from('total')
            ->all();
        return $rows;
    }*/

}
