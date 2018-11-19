<?php

namespace app\models;
use app\behaviors\MyBehavior;
use yii\base\Model;

class Test extends Model
{
    public $content;
    public $title;
    public $date;

    const EVENT_FOO_START = 'foo_start';
    const EVENT_FOO_COMPLETE = 'foo_complete';

  /*  public function behaviors()
    {
        return [
          'my' => [
              'class' => MyBehavior::class,
              'message' => 'new message'
          ]
        ];
    }*/


    public function rules()
    {
        return [
          [['content', 'title'], 'required'],
          [['title'], 'myValidate'],
          [['date'], 'safe'],
        ];
    }

    public function myValidate($attribute, $params)
    {
        if(strlen($this->$attribute) > 10){
            $this->addError($attribute, "Валидация не прошла!!!");
        }
    }

    public function fields()
    {
        return [
            'name' => 'title'
        ];
    }


    public function foo()
    {
        $this->trigger(static::EVENT_FOO_START);
        echo "выполнение метода foo";
        $this->trigger(static::EVENT_FOO_COMPLETE);
    }

}