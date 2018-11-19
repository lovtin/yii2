<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 25.10.2018
 * Time: 20:41
 */
namespace app\controllers;

use app\models\filters\TasksFilter;
use app\models\tables\Tasks;
use app\models\Task;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class TaskController extends Controller
{
   public function actionIndex()
   {
       if($_POST['Tasks']['changeMonth'] == NULL) {
           $searchModel = new TasksFilter();
           $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);

           return $this->render('index', [
               'searchModel' => $searchModel,
               'dataProvider' => $dataProvider,
           ]);
       }else{
           $dataProvider = new ActiveDataProvider([
               'query' => Tasks::getByMonthQuery($_POST['Tasks']['changeMonth'])
           ]);
           return $this->render('index', [
               'dataProvider' => $dataProvider,
           ]);
       }
   }

    public function actionOne($id, $login)
    {
        $taskData = Tasks::findOne($id);
        $taskName = $taskData->task_name;
        $taskDescription = $taskData->description;
        $userName = $login;
        $date = $taskData->dead_line;

        return $this->render('task_item', [
            'taskName' => $taskName,
            'taskDescription' => $taskDescription,
            'userName' => $userName,
            'date' => $date
        ]);
    }

}