<?php
namespace app\controllers;
use app\models\Task;
use yii\web\Controller;

class TaskController extends Controller
{
    public function actionIndex(){

        $task = new Task();
        $task->setAttributes([
            'taskNumber' => '1',
            'taskName' => 'Разработать концепцию календаря',
            'taskDescription' => 'Razrabotat\' task tracker v kachestve domashnego zadaniya',
            'idEmployee' => '2',
            'taskTime' => '2018-11-06, 16:00',
        ]);

        $taskArray = $task->toArray();
        $v = $task->validate();
        $e = $task->getErrors();
        //var_dump($v);
        //var_dump($e);
        if(isset($e['taskDescription'][0])) {
            $taskArray['taskDescription'] = $e['taskDescription'][0];
        }
        if(isset($e['idEmployee'][0])) {
            $taskArray['idEmployee'] = $e['idEmployee'][0];
        }
            return $this->render('index', [
                'taskNumber' => $taskArray['taskNumber'],
                'taskName' => $taskArray['taskName'],
                'taskDescription' => $taskArray['taskDescription'],
                'idEmployee' => $taskArray['idEmployee'],
                'taskTime' => $taskArray['taskTime']
            ]);
    }
}