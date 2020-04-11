<?php

namespace app\models;

use Yii;
use app\models\User;

/**
 * This is the model class for table "masyarakat".
 *
 * @property int $id
 * @property int $id_user
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
 * @property AduanMasyarakat[] $aduanMasyarakats
 * @property Provinsi $provinsi
 * @property Kota $kota
 * @property User $user
 */
class Masyarakat extends \yii\db\ActiveRecord
{
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
            [['id_user', 'nik', 'nama', 'no_telepon', 'id_provinsi', 'id_kota', 'alamat', 'tanggal_lahir', 'usia', 'img'], 'required'],
            [['id_user', 'id_provinsi', 'id_kota', 'usia'], 'integer'],
            [['alamat'], 'string'],
            [['tanggal_lahir'], 'safe'],
            [['nik', 'nama', 'no_telepon', 'img'], 'string', 'max' => 255],
            [['id_provinsi'], 'exist', 'skipOnError' => true, 'targetClass' => Provinsi::className(), 'targetAttribute' => ['id_provinsi' => 'id']],
            [['id_kota'], 'exist', 'skipOnError' => true, 'targetClass' => Kota::className(), 'targetAttribute' => ['id_kota' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'nik' => 'Nik',
            'nama' => 'Nama',
            'no_telepon' => 'No Telepon',
            'id_provinsi' => 'Provinsi',
            'id_kota' => 'Kota',
            'alamat' => 'Alamat',
            'tanggal_lahir' => 'Tanggal Lahir',
            'usia' => 'Usia',
            'img' => 'Img',
        ];
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
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }

}
