<?php


namespace app\widgets;
use app\models\tables\Task;
use yii\base\Widget;

class TaskPreview extends Widget
{
    /** @var  Task */
    public $model;

    public function run()
    {
        if (is_a($this->model, Task::class)) {
            return $this->render('task_preview', ['model' => $this->model]);
        }
        throw new \Exception("Невозможно отобразить модель!");
    }
}