<?php

namespace app\models\tables;

/**
 * This is the model class for table "test".
 *
 * @property int $id
 * @property string $title
 * @property string $content
 */
class Test extends \yii\db\ActiveRecord
{
    const RUN_START = 'run_start';
    const EVENT_RUN_COMPLETE = 'run_complete';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'test';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'content'], 'required'],
            [['title', 'content'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'content' => 'Содержание',
        ];
    }

    public function run(){
        $this->trigger(static::EVENT_RUN_COMPLETE);
        echo 'Выполнение чего то там';
        $this->trigger(static::RUN_START);
    }
}
