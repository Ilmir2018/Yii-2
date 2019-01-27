<?php
/**
 * Created by PhpStorm.
 * User: Ilmir
 * Date: 26.01.2019
 * Time: 14:37
 */

namespace app\assets;


use yii\web\AssetBundle;
use yii\web\JqueryAsset;

class TaskOneAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
    ];
    public $js = [
        'js/my.js'
    ];
    //Зависимость, необходима для того чтобы скрипт подключался после
    //того от чего он зависит
    public $depends = [
        JqueryAsset::class
    ];
}