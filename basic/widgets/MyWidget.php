<?php
namespace app\widgets;
use yii\base\Widget;

class MyWidget extends Widget
{
    public $btnValue = "Нажми меня";
    public $title = "Мой виджет";

    public function run()
    {
        return $this->render("my", [
            'title' => $this->title,
            'btnValue' =>$this->btnValue
        ]);
    }
}