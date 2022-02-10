<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

?>

<div class="phonebook-form">

    <?php $form = ActiveForm::begin(); ?>

    <?//= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'firstname')->textInput(['style'=>'width:400px','maxlength' => true]) ?>

    <?= $form->field($model, 'lastname')->textInput(['style'=>'width:400px','maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['style'=>'width:400px','maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['style'=>'width:400px','maxlength' => true]) ?>

    <?//= $form->field($model, 'birthday')->textInput(['style'=>'width:400px']) ?>

    <?=$form->field($model, 'birthday')->// Дата рождения
        widget(Datepicker::className(),
        [   'language'              => 'ru-RU',
            'value'  => $model->birthday,
            'dateFormat' => 'yyyy-MM-dd',
            'clientOptions' => [ 'maxDate' => '-18y',
            ],
            
        'options'=>['class'=>'form-control','style'=>'width:400px' ],
        ]);  ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

