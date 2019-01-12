<?php

namespace app\models\tables;

use app\models\User;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "tasks".
 *
 * @property int $id
 * @property string $name
 * @property string $date
 * @property string $description
 * @property int $responsible_id
 * @property User $user
 */
class Tasks extends \yii\db\ActiveRecord
{

    const RUN_EMAIL = 'email';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tasks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'date'], 'required'],
            [['date'], 'safe'],
            [['description'], 'string'],
            [['responsible_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'date' => 'Date',
            'description' => 'Description',
            'responsible_id' => 'Responsible ID',
        ];
    }

    public static function getTasksList(){
        $tasks = Tasks::find()
            ->select(['id', 'name'])
            ->asArray()
            ->all();

        return  ArrayHelper::map($tasks, 'id', 'name');
    }

    public function getResponsible(){
        return $this->hasOne(Users::class, ['id' => 'responsible_id']);
    }

    public function run(){
        $this->trigger(static::RUN_EMAIL);
        echo 'Отправка email!!!';
    }
}
