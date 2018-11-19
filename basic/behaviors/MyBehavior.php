<?php


namespace app\behaviors;
use yii\base\Behavior;

class MyBehavior extends Behavior
{
    public $message = "hello, world!";

    public function message(){
        echo $this->owner->title;
    }
}