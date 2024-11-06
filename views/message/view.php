<?php
use yii\helpers\Html;

$this->title = 'Просмотр сообщения';
?>
<h1><?= Html::encode($this->title) ?></h1>

<div class="message-content">
    <?= nl2br(Html::encode($model->text)) ?>
</div>

<div class="form-group">
    <?= Html::a('Назад к сообщениям', ['/message'], ['class' => 'btn btn-primary']) ?>
</div>
