<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "masyarakat".
 *
 * @property int $id
 * @property string $nik
 * @property string $nama
 * @property string $no_telepon
 * @property int $id_provinsi
 * @property int $id_kota
 * @property string $alamat
 * @property string $tanggal_lahir
 * @property int $usia
 * @property string $img
 *
 * @property Aduan[] $aduans
 * @property AduanMasyarakat[] $aduanMasyarakats
 * @property Provinsi $provinsi
 * @property Kota $kota
 * @property User[] $users
 */
class Masyarakat extends \yii\db\ActiveRecord
{
    public $email;
    public $password;
    public $role;
    public $id_masyarakat;
    public $id_petugas;


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'masyarakat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nik', 'nama', 'no_telepon', 'id_provinsi', 'id_kota', 'alamat', 'tanggal_lahir', 'usia','email','password', 'id_masyarakat'], 'required'],
            [['id_provinsi', 'id_kota', 'usia'], 'integer'],
            [['alamat'], 'string'],
            [['tanggal_lahir', 'role', 'id_petugas', 'img', 'id_masyarakat'], 'safe'],
            [['nik', 'nama', 'no_telepon'], 'string', 'max' => 255],
            [['id_provinsi'], 'exist', 'skipOnError' => true, 'targetClass' => Provinsi::className(), 'targetAttribute' => ['id_provinsi' => 'id']],
            [['id_kota'], 'exist', 'skipOnError' => true, 'targetClass' => Kota::className(), 'targetAttribute' => ['id_kota' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nik' => 'Nik',
            'nama' => 'Nama',
            'no_telepon' => 'No Telepon',
            'id_provinsi' => 'Id Provinsi',
            'id_kota' => 'Id Kota',
            'alamat' => 'Alamat',
            'tanggal_lahir' => 'Tanggal Lahir',
            'usia' => 'Usia',
            'img' => 'Img',
        ];
    }

    /**
     * Gets query for [[Aduans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAduans()
    {
        return $this->hasMany(Aduan::className(), ['id_masyarakat' => 'id']);
    }

    /**
     * Gets query for [[AduanMasyarakats]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAduanMasyarakats()
    {
        return $this->hasMany(AduanMasyarakat::className(), ['id_masyarakat' => 'id']);
    }

    /**
     * Gets query for [[Provinsi]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProvinsi()
    {
        return $this->hasOne(Provinsi::className(), ['id' => 'id_provinsi']);
    }

    /**
     * Gets query for [[Kota]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKota()
    {
        return $this->hasOne(Kota::className(), ['id' => 'id_kota']);
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id_masyarakat' => 'id']);
    }

    public function saveUser()
    {
        $user = new User();

        $user->email = $this->email;
        $user->password = $this->password;
        $user->role = 1;
        $user->id_masyarakat = $this->id;
    }
}
