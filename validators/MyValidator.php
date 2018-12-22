<?php
/**
 * Created by PhpStorm.
 * User: Ilmir
 * Date: 21.12.2018
 * Time: 12:13
 */

namespace app\validators;


use yii\validators\Validator;

class MyValidator extends  Validator
{
    public function validateAttribute($model, $attribute)
    {
        if (!preg_match('#xax#', $model->$attribute)){
            $model->addError($attribute, 'Ошибка! Атрибут должен содержать определённые символы.');
        }
    }
}