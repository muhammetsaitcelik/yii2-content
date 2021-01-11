<?php

namespace muhammetsaitcelik\content\models;

use Yii;

/**
 * This is the model class for table "cars_of_company".
 *
 * @property int $id
 * @property string|null $car_name
 * @property string|null $model
 * @property int|null $year
 * @property int|null $price
 *
 * @property Company[] $companies
 */
class Cars extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cars_of_company';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'year', 'price'], 'integer'],
            [['car_name', 'model'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'car_name' => 'Car Name',
            'model' => 'Model',
            'year' => 'Year',
            'price' => 'Price',
        ];
    }

    /**
     * Gets query for [[Companies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompanies()
    {
        return $this->hasMany(Company::className(), ['car_id' => 'id']);
    }
}
