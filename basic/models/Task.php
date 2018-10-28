<?php
namespace app\models;
use yii\base\Model;
class Task extends Model
{
    public $name_task;
    public $id_user;
    public $data_task;
    public function rules()
    {
        return [
            [['id_user'], 'required'],
            [['name_task'], 'myValidator'],
            [['data_task'], 'safe']
        ];
    }
    public function myValidator($attribute, $params)
    {
        if (strlen($this->$attribute) > 5) {
            $this->addError($attribute, 'Незнаительно маленькое назание задачи!');
        }
    }
}