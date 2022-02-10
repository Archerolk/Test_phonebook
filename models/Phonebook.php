<?php

namespace app\models;

use Yii;

class Phonebook extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'Phonebook';
    }

    public function rules()
    { 
        return [
            ['birthday', 'date','format'=>'php:Y-m-d', 'message' => 'Некорректная дата'],
            ['birthday','default', 'value' => null],
            [['birthday'], 'validateDate'],
            [['firstname','phone'], 'required','message' => 'Обязательное поле'],
            [['firstname', 'lastname'], 'string', 'max' => 50],
            [['phone'], 'validatePhone'],
            [['email'], 'string', 'max' => 255],
            ['email', 'email',  'message' => 'Некорректно веден email'],
            
            [['id','phone','email',], 'unique','message' => 'Уже внесен'],
        ];  
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstname' => 'Имя',
            'lastname' => 'Фамилия',
            'phone' => 'Номер телефона',
            'email' => 'Email',
            'birthday' => 'День рождения',
        ];
    }
    public function validateDate() //проверка даты рождения на совершенолетие
    {

        $etdate=date('Y-m-d',mktime(0, 0, 0, date("m"), date("d"), date("Y")-18));

        if ($etdate < $this->birthday)
        {
            $this->addError('birthday', 'Несовершеннолетний контакт');
        }
    }
    public function validatePhone() //проверка телефона
    {
        if (   (substr($this->phone,0,3)!='+38' && !is_numeric($this->phone)) 
            or (substr($this->phone,0,3)=='+38' && !is_numeric(substr($this->phone,1))) )
            $this->addError('phone', 'Номер полностью должен состоять из цифр');
    
        if  ( (substr($this->phone,0,3)=='+38' && strlen($this->phone)!=13) 
                or (substr($this->phone,0,3)!='+38' && strlen($this->phone)!=10) 
            ) 
            $this->addError('phone', 'Номер должен состоять из 10 цифр или "+38" и 10 цифр');
    }
    public function upbirthday()
    {
        $month=$this->getmonth();//(substr($birthday,5,2));//месяц рождения
        switch ($month) 
        {
            case 1: $month='янв.'; break;
            case 2: $month='февр.'; break;
            case 3: $month='март.'; break;
            case 4: $month='апр.'; break;
            case 5: $month='май.'; break;
            case 6: $month='июнь.'; break;
            case 7: $month='июль.'; break;
            case 8: $month='авг.'; break;
            case 9: $month='сент.'; break;
            case 10: $month='окт.'; break;
            case 11: $month='ноябр.'; break;
            case 12: $month='декабр.'; break;
            case '$month': break;
        }
        $day=$this->getday();//(substr($birthday,8,2));//день месяца
        return $day.' '.$month.substr($this->birthday,0,4);
    }
    public function getmonth()  // Геттер для месяца
    {
        return substr($this->birthday,5,2);
    }
    public function getday()  // Геттер для дня
    {
        return substr($this->birthday,8,2);
    }
}