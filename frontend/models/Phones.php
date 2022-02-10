<?php

namespace app\models;

use Yii;

class Phones extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'Phones';
    }

    public function rules()
    {
        return [
            [['name'], 'integer'],
            [['phone'], 'string', 'max' => 13],
            [['name'], 'exist', 'skipOnError' => true, 'targetClass' => Phonebook::className(), 'targetAttribute' => ['name' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'phone' => 'Phone',
            'name' => 'Name',
        ];
    }
}
