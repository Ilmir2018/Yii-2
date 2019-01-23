<?php
/**
 * Created by PhpStorm.
 * User: Ilmir
 * Date: 16.01.2019
 * Time: 22:57
 */

namespace app\controllers;

use app\models\Upload;
use app\models\tables\Tasks;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\UploadedFile;
use Yii;
use app\models\tables\Users;

class AdminController extends Controller
{

    public function actionIndex(){


        $model = new Upload();

        if ($model->load(\Yii::$app->request->post())) {
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->upload();
        }

        $query = Tasks::find()->where(['responsible_id' => \Yii::$app->user->id]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);

        //prepare подготовит данные для кэширования
       /* \Yii::$app->db->cache(function () use ($dataProvider){
            return $dataProvider->prepare();
        });*/

        return $this->render('index', [
            'dataProvider' => $dataProvider, 'model' => $model,
        ]);
    }

    /**
     * Creates a new Tasks model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tasks();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'userList' => Users::getUsersList()
        ]);
    }

}