<?php


namespace app\controllers;


use app\behaviors\MyBehavior;
use app\models\tables\Users;
use app\models\Test;
use yii\base\Event;
use yii\web\Controller;

class ExampleController extends Controller
{
    public function actionDb()
    {
        $id = 1;

       $res = \Yii::$app->db
           ->createCommand("SELECT * FROM test WHERE id = :id")
           ->bindParam(':id', $id)
           ->queryOne();

       var_dump($res);
       exit;
    }


    public function actionAr()
    {
      /*  $user = new Users();
        $user->login = "pupkin";
        $user->password = 'qwerty';
        $user->save();


        $user2 = new Users([
            'login' => 'vasechkin',
            'password' => 'qwerty'
        ]);

        $user2->save();*/

       /* $user = Users::findOne(['login' => 'pupkin']);*/
     /*   var_dump(Users::find()->all());*/

         /*   $user = Users::findOne(3);
            $user->password = 'jklhgfdte';
            $user->save();*/

       /* $user = Users::findOne(3);
        $user->delete();

        Users::deleteAll(['>', 'id', 2]);*/


      //SELECT * FROM users

        $user = Users::find()
                    ->where(['id' => 1])
                    ->with('role')
                    ->one();
        var_dump($user->role);
        exit;

    }


    public function actionEvents()
    {
        $handler = function($event){
            var_dump($event);
            echo "Обработчик 1 сработал!!!";
        };
        Event::on(Test::class, Test::EVENT_FOO_START, $handler);

        $model = new Test();
        $model->foo();
        exit;
    }

    public function actionBeh()
    {
        $model = new Test([
            'title' => 'model title'
        ]);

        $model->attachBehavior("my", [
            'class' => MyBehavior::class,
        ]);

      //  $model->detachBehavior("my");

        $model->message();
        exit;
    }

    public function actionCache()
    {
        $cache = \Yii::$app->cache;
        $key = 'number';

        if($cache->exists($key)){
            $number = $cache->get($key);
        }else{
            $number = rand();
            $cache->set($key, $number, 5);
        }

        var_dump($number);
        exit;
    }

}