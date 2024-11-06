<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Создать сообщение';
    
?>

<h1><?= Html::encode($this->title) ?></h1>

<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'text')->textInput() ?>

    <?= Html::submitButton('Создать', ['class' => 'btn btn-success']) ?>

<?php ActiveForm::end(); ?>
