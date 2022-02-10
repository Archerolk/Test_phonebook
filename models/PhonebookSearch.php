<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Phonebook;

class PhonebookSearch extends Phonebook
{
    public function rules()
    {
        return [
            // [['id', 'birthday'], 'integer'],
            [['firstname', 'lastname', 'phone', 'email','birthday'], 'safe'],
            ['birthday', 'match', 'pattern' => '/^[0-9-]+$/', 'message' => 'Введите в формате 2000-12-31'],
        ]; 
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Phonebook::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        $dataProvider->setSort([
        'attributes' => 
        [
            'firstname',
            'lastname',
            'phone',
            'email',
            'birthday', //=> 
            // [

                // 'asc' => ['month' => SORT_ASC,'day' => SORT_ASC],
                // 'desc' => ['month' => SORT_DESC,'day' => SORT_DESC],
            // ],
        ],   
     ]);
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            // 'birthday' => $this->birthday,
        ]);

        $query->andFilterWhere(['like', 'firstname', $this->firstname])
            ->andFilterWhere(['like', 'lastname', $this->lastname])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'birthday', $this->birthday]);

        return $dataProvider;
    }
}
