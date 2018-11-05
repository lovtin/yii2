<?php

namespace app\models\tables;

use Yii;

/**
 * This is the model class for table "tasks".
 *
 * @property int $id
 * @property string $task_name
 * @property string $description
 * @property string $dead_line
 * @property int $id_user_manager
 * @property int $id_user_accountable
 *
 * @property Users $userAccountable
 * @property Users $userManager
 */
class Tasks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tasks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['dead_line'], 'safe'],
            [['id_user_manager', 'id_user_accountable'], 'integer'],
            [['task_name'], 'string', 'max' => 50],
            [['id_user_accountable'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['id_user_accountable' => 'id']],
            [['id_user_manager'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['id_user_manager' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'task_name' => 'Task Name',
            'description' => 'Description',
            'dead_line' => 'Dead Line',
            'id_user_manager' => 'Id User Manager',
            'id_user_accountable' => 'Id User Accountable',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserAccountable()
    {
        return $this->hasOne(Users::className(), ['id' => 'id_user_accountable']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserManager()
    {
        return $this->hasOne(Users::className(), ['id' => 'id_user_manager']);
    }
}
