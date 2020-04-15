<?php

namespace app\models;

use Yii;

class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public $authKey;
    const MASYARAKAT = 1;
    const PETUGAS = 2;
    const ADMIN = 3;
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'password', 'role'], 'required'],
            [['role', 'id_masyarakat', 'id_petugas'], 'integer'],
            [['email', 'password'], 'string', 'max' => 255],
            [['id_masyarakat'], 'exist', 'skipOnError' => true, 'targetClass' => Masyarakat::className(), 'targetAttribute' => ['id_masyarakat' => 'id']],
            [['id_petugas'], 'exist', 'skipOnError' => true, 'targetClass' => Petugas::className(), 'targetAttribute' => ['id_petugas' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'password' => 'Password',
            'role' => 'Role',
            'id_masyarakat' => 'Id Masyarakat',
            'id_petugas' => 'Id Petugas',
        ];
    }

    /**
     * Gets query for [[Masyarakat]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMasyarakat()
    {
        return $this->hasOne(Masyarakat::className(), ['id' => 'id_masyarakat']);
    }

    /**
     * Gets query for [[Petugas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPetugas()
    {
        return $this->hasOne(Petugas::className(), ['id' => 'id_petugas']);
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

    public static function isMasyarakat()
    {
        if (Yii::$app->user->identity->role == self::MASYARAKAT) {
            return true;
        }else{
            return false;
        }
    }

    public static function isPetugas()
    {
        if (Yii::$app->user->identity->role == self::PETUGAS) {
            return true;
        }else{
            return false;
        }
    }

    public static function isAdmin()
    {
        if (Yii::$app->user->identity->role == self::ADMIN) {
            return true;
        }else{
            return false;
        }
    }

    public static function getImgMasyarakat()
    {
        $model = Masyarakat::find()
            ->andWhere(['id' => Yii::$app->user->identity->id_masyarakat])
            ->one();

        if ($model !== null) {
           return $model->img;
        }
    }

    public static function getImgPetugas()
    {
        $model = Petugas::find()
            ->andWhere(['id' => Yii::$app->user->identity->id_petugas])
            ->one();

        if ($model !== null) {
           return $model->img;
        }
    }

    public static function getNamaMasyarakat()
    {
        $model = Masyarakat::find()
            ->andWhere(['id' => Yii::$app->user->identity->id_masyarakat])
            ->one();

        if ($model !== null) {
           return $model->nama;
        }
    }

    public static function getNamaPetugas()
    {
        $model = Petugas::find()
            ->andWhere(['id' => Yii::$app->user->identity->id_petugas])
            ->one();

        if ($model !== null) {
           return $model->nama;
        }
    }

    public static function getIdPetugas()
    {
        $model = Petugas::find()
            ->andWhere(['id' => Yii::$app->user->identity->id_petugas])
            ->one();

        if ($model !== null) {
           return $model->id;
        }
    }

    public static function getIdMasyarakat()
    {
        $model = Masyarakat::find()
            ->andWhere(['id' => Yii::$app->user->identity->id_masyarakat])
            ->one();

        if ($model !== null) {
           return $model->id;
        }
    }

    public static function getNik()
    {
        $model = Masyarakat::find()
            ->andWhere(['id' => Yii::$app->user->identity->id_masyarakat])
            ->one();

        if ($model !== null) {
           return $model->nik;
        }
    }

    public static function getBagian()
    {
        $model = Petugas::find()
            ->andWhere(['id' => Yii::$app->user->identity->id_petugas])
            ->one();

        if ($model !== null) {
            return $model->bagian->nama;
        }
    }
}
