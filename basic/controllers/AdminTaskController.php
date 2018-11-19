<?php

namespace app\controllers;

use app\models\tables\Users;
use Yii;
use app\models\tables\Task;
use app\models\tables\TaskSearch;
use yii\base\Event;
use yii\caching\DbDependency;
use yii\filters\HttpCache;
use yii\filters\PageCache;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AdminTaskController implements the CRUD actions for Task model.
 */
class AdminTaskController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'cache' => [
                'class' => PageCache::class,
                'duration' => 200,
                'only' => ['index'],
                'variations' => [Yii::$app->language],
               /* 'dependency' => [
                    'class' => DbDependency::class,
                    'sql' => "SELECT COUNT(*) FROM task"
                ]*/
            ],
            'client-cache' => [
                'class' => HttpCache::class,
                'only' => ['index'],

            ]
        ];
    }

    /**
     * Lists all Task models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TaskSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Task model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $cache = \Yii::$app->cache;
        $key = 'task_' . $id;

     /*   if(!$model = $cache->get($key)){
            $dependency = new DbDependency();
            $dependency->sql = "SELECT COUNT(*) FROM task";

            $model = $this->findModel($id);
            $cache->set($key, $model, 200, $dependency);
        }     */

        return $this->render('view', [
            'model' =>  $model = $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Task model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Task();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $usersList = ArrayHelper::map(Users::find()->all(), 'id', 'login');

        return $this->render('create', [
            'model' => $model,
            'usersList' => $usersList
        ]);
    }

    /**
     * Updates an existing Task model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $usersList = ArrayHelper::map(Users::find()->all(), 'id', 'login');
        return $this->render('create', [
            'model' => $model,
            'usersList' => $usersList
        ]);
    }

    /**
     * Deletes an existing Task model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Task model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Task the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Task::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
