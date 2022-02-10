<?php

use yii\helpers\Html;


$this->title = 'Новая запись';
$this->params['breadcrumbs'][] = ['label' => 'Телефонная книга', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phonebook-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
