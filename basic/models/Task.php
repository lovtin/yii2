<?php
namespace app\models;
use yii\base\Model;
use app\components\validators\MyValidator;


class Task extends Model
{
    public $taskNumber;
    public $taskName;
    public $taskDescription;
    public $idEmployee;
    public $taskTime;

    public function rules()
    {
        return [
            [['taskNumber', 'taskName', 'taskDescription',
                'idEmployee', 'taskTime'], 'required'],
            [['taskDescription'], 'myValidate'],
            [['idEmployee'], MyValidator::class]
            ];
    }

    public function myValidate($attribute, $params)
    {
        if(strlen($this->$attribute) > 15){
            $this->addError($attribute,
                "Валидацияне не прошла! Описание задания превышает допустимое колличество символов!");
        }
    }
}