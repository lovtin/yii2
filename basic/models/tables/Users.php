<?php

namespace app\models\tables;

use Yii;


/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $login
 * @property string $password
 * @property UserRoles $role
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'password'], 'required'],
            [['login'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 255],
            [['login'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'password' => 'Password',
        ];
    }

    public function getRole()
    {
        return $this->hasOne(UserRoles::class, ['id' => 'role_id']);
    }
}
