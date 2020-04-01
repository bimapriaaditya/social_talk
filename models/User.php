<?php

namespace app\models;

use Yii;

class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{

    public $authKey;
   
    public static function tableName()
    {
        return 'user';
    }

    public function rules()
    {
        return [
            [['email', 'password'], 'required'],
            [['email', 'password'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'password' => 'Password',
        ];
    }

    public function getMasyarakats()
    {
        return $this->hasMany(Masyarakat::className(), ['id_user' => 'id']);
    }

    public function getPetugas()
    {
        return $this->hasMany(Petugas::className(), ['id_user' => 'id']);
    }

    public static function findIdentity($id)
    {
        $user = User::findOne($id);
        if($user !== null){
            return new static($user);
        }
        return null;
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        $user = User::find()->where(['accessToken'=>$token])->one();
        if(count($user))
        {
            return new static($user);
        }
    }

    public static function findByUsername($username)
    {
        $user = User::find()->where(['email'=>$username])->one();
        if($user !== null)
        {
            return new static($user);
        }

        return null;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    public function validatePassword($password)
    {
        return $this->password === $password;
    }

    public static function getNamaUser()
    {
        $model = Masyarakat::find()
            ->andWhere(['id_user' => Yii::$app->user->identity->id])
            ->one();

        if ($model !== null) {
            return $model->nama;
        }
        return null;
    }

    public static function getNamaPetugas()
    {
        $model = Petugas::find()
            ->andWhere(['id_user' => Yii::$app->user->identity->id])
            ->one();

        if ($model !== null) {
            return $model->nama;
        }
        return null;
    }

    public static function getImgMasyarakat()
    {
        $model = Masyarakat::find()
            ->andWhere(['id_user' => Yii::$app->user->identity->id])
            ->one();

        if ($model !== null) {
            return $model->img;
        }
    }

    public static function getNikMasyarakat()
    {
        $model = Masyarakat::find()
            ->andWhere(['id_user' => Yii::$app->user->identity->id])
            ->one();
        if ($model !== null) {
               return $model->nik;
           }   
    }

    public static function isMasyarakat()
    {
        $model = Masyarakat::find()
            ->andWhere(['id_user' => Yii::$app->user->identity->id])
            ->one();

        if ($model !== null) {
            return true;
        }else{
            return false;
        }
    }

    public static function isPetugas()
    {
        $model = Petugas::find()
            ->andWhere(['id_user' => Yii::$app->user->identity->id])
            ->one();

        if ($model !== null) {
            return true;
        }else{
            return false;
        }
    }

}
