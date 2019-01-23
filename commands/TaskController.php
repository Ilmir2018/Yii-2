<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 23.01.2019
 * Time: 15:19
 */

namespace app\commands;


use app\models\tables\Users;
use yii\console\Controller;
use yii\console\ExitCode;
use yii\helpers\Console;

class TaskController extends Controller
{

    public $message = 'Hello';
    /**
     * Test action
     */
    public function actionTest($id){

        if ($user = Users::findOne($id)) {
            $this->stdout("{$this->message} {$user->login}", Console::FG_RED);
            return ExitCode::OK;
        }
        return ExitCode::UNSPECIFIED_ERROR;
    }

    public function actionProcess()
    {
        Console::startProgress(0, 100);
        for($i = 1; $i < 100; $i++){
            sleep(1);
            Console::updateProgress($i, 100);
        }
        Console::endProgress();
    }

    public function options($actionID)
    {
        return ['message'];
    }

    public function optionAliases()
    {
        return ['m' => 'message'];
    }

    public function actionDedline($userId)
    {
        $time = Users::find()
            ->where(['id' => $userId])
            ->all();
        var_dump($time);
    }
}