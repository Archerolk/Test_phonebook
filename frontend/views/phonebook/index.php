<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PhonebookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Телефонная книга';

// $this->params['breadcrumbs']['homeLink']=> ['label' => 'Главная', 'url' => ['site/index']];

$this->params['breadcrumbs'][] = $this->title; 
//  
?>
<div class="phonebook-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить контакт', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => 
        [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'firstname',
            'lastname',
            'phone',
            'email:email',
            // 'birthday',
            [ 'attribute' => 'birthday',//День рождения
              'format' => 'raw',
              'value' => function($model) 
              { 
                // $birthday=
               return $model->upbirthday();//$model->birthday);
                // return $birthday;
                ; 
              } 
            ],
            // ['class' => 'yii\grid\ActionColumn'],

            ['class' => 'yii\grid\ActionColumn',
            // 'template' => '{update}{delete}',
            'buttons' => 
                [
                'delete' => function($url, $model)
                    {
                      return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model->id], [
                        'class' => '',
                        'data' => [
                            'confirm' => 'Вы уверены, что хотите удалить запись '.$model->firstname.'?',
                            'method' => 'post',
                        ],
                      ]);
                    }
                ]

            ],
        ],
    ]); 
?>
</div>
