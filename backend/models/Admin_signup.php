<?php
namespace backend\models;
use Yii;
use yii\base\Model;
use common\models\User;
class Admin_signup extends Model{
    public $id;
    public $username;
    public $email;
    public $password;
    public $isNewRecord = false;

    /**
     * @inheritdoc
     */
    public function rules(){
        return [
            [['username','email','password'],'required'],
            ['email','email'],
        ];
    }

    /**
     * @return User|null the saved model or null if saving fails
     */
    public function signup(){
        if(!$this->validate()){
            return null;
        }
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        return $user->save() ? $user : null;
    }
    /**
     * @return User|null the update or null of update fails
     */
    public function adminUpdate($id){
        if(!$this->validate()){
            return null;
        }
        $this->id = $id;
        $user = User::findOne($id);
        $user->username = $this->username;
        $user->setPassword($this->password);
        $user->email = $this->email;
        return $user->save() ? $user : null;
    }
}