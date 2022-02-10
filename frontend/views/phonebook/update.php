<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Phonebook */

$this->title = 'Изменить запись: ' . $model->firstname;
$this->params['breadcrumbs'][] = ['label' => 'Телефонная книга', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->firstname, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phonebook-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
