<?php

/**
 * @varv \app\models\Upload $model
 */
//Создаём форму
$form = \yii\widgets\ActiveForm::begin();
echo $form->field($model, 'title')->textInput();
echo $form->field($model, 'content')->textInput();
echo $form->field($model, 'file')->fileInput();
echo \yii\helpers\Html::submitButton("Send");
\yii\widgets\ActiveForm::end();