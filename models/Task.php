<?php
/**
 * Created by PhpStorm.
 * User: Ilmir
 * Date: 18.12.2018
 * Time: 13:30
 */

namespace app\models;


use app\validators\MyValidator;
use yii\base\Model;

class Task extends Model
{

    public $answerable;
    public $status;
    public $task;
    public $hotTask;

    public function rules()
    {
        return [
            [['answerable', 'task', 'hotTask'], 'myValidate1'],
            ['status', 'myValidate2'],
            ['task', MyValidator::class],
        ];
    }

    public function myValidate1($attributeNames, $params)
    {
        if (!is_string($this->$attributeNames)){
            $this->addError($attributeNames, 'Ошибка! Атрибут должен быть строкой!');
        }
    }

    public function myValidate2($attributeNames, $params)
    {
        if ($this->$attributeNames !== 'on' || $this->$attributeNames !== 'off'){
            $this->addError($attributeNames, 'Ошибка! Атрибут должен принимать только 2 варианта значений');
        }
    }

}