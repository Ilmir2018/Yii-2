<?php
/**
 * Created by PhpStorm.
 * User: Ilmir
 * Date: 26.01.2019
 * Time: 17:05
 */

namespace app\commands;


use yii\console\Controller;

class RbacController extends Controller
{

    public function actionIndex()
    {
        //Обращаемся к менеджеру который прописали в конфиге
        $authManager = \Yii::$app->authManager;
        //Создаём 2 роли - админ и модератор
        $admin = $authManager->createRole('admin');
        $moder = $authManager->createRole('moderator');
        //Добавляем в менеджер эти роли
        $authManager->add($admin);
        $authManager->add($moder);
        //Создаём события.
        $permissionTaskCreate = $authManager->createPermission('TaskCreate');
        $permissionTaskDelete = $authManager->createPermission('TaskDelete');
        $permissionTaskEdit = $authManager->createPermission('TaskEdit');

        //Добавляем созданные события в менеджер.
        $authManager->add($permissionTaskCreate);
        $authManager->add($permissionTaskDelete);
        $authManager->add($permissionTaskEdit);
        //Даём разрешение на выполнение действий админу и модератору.
        $authManager->addChild($admin, $permissionTaskCreate);
        $authManager->addChild($admin, $permissionTaskDelete);
        $authManager->addChild($admin, $permissionTaskEdit);

        $authManager->addChild($moder, $permissionTaskCreate);
        $authManager->addChild($moder, $permissionTaskEdit);

        $authManager->assign($admin, 1);
        $authManager->assign($moder, 2);
    }

    public function actionWatcher()
    {
        //Обращаемся к менеджеру который прописали в конфиге
        $authManager = \Yii::$app->authManager;

        //Создаём роли - наблюдателя и юзера.
        $watcher = $authManager->createRole('watcher');
        $user = $authManager->createRole('user');


        //Добавляем в менеджер эти роли
        $authManager->add($watcher);
        $authManager->add($user);

        //Создаём события.
        $permissionCommentAdd = $authManager->createPermission('CommentAdd');
        $permissionFileAdd = $authManager->createPermission('FileAdd');


        //Добавляем созданные события в менеджер.
        $authManager->add($permissionCommentAdd);
        $authManager->add($permissionFileAdd);

        //Даём разрешение на выполнение действий юзеру.
        $authManager->addChild($user, $permissionCommentAdd);
        $authManager->addChild($user, $permissionFileAdd);

        $authManager->assign($watcher, 3);
        $authManager->assign($user, 4);
    }



}