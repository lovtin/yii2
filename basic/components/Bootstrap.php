<?php

namespace app\components;
use app\models\tables\Task;
use yii\base\BootstrapInterface;
use yii\base\Component;
use yii\base\Event;

class Bootstrap extends Component implements BootstrapInterface
{
    public function bootstrap($app)
    {
        Event::on(Task::class, Task::EVENT_AFTER_INSERT, function($event){
            $task = $event->sender;
            $user = $task->user;
            $email = $user->email;

            \Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom(['administrator@test.ru'])
                ->setSubject("Новая задача")
                ->setTextBody("На вас была повешена новая задача {$task->name}")
                ->send();
        });

    }


}