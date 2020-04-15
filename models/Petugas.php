<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "petugas".
 *
 * @property int $id
 * @property string $nama
 * @property int $id_bagian
 * @property string $no_telepon
 * @property int $id_provinsi
 * @property int $id_kota
 * @property string $alamat
 * @property string $tanggal_lahir
 * @property int $usia
 * @property string $img
 *
 * @property AduanPetugas[] $aduanPetugas
 * @property Bagian $bagian
 * @property Provinsi $provinsi
 * @property Kota $kota
 */
class Petugas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'petugas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'id_bagian', 'no_telepon', 'id_provinsi', 'id_kota', 'alamat', 'tanggal_lahir', 'usia'], 'required'],
            [['id_bagian', 'id_provinsi', 'id_kota', 'usia'], 'integer'],
            [['tanggal_lahir', 'img'], 'safe'],
            [['nama', 'no_telepon', 'alamat', 'img'], 'string', 'max' => 255],
            [['id_bagian'], 'exist', 'skipOnError' => true, 'targetClass' => Bagian::className(), 'targetAttribute' => ['id_bagian' => 'id']],
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
            'nama' => 'Nama',
            'id_bagian' => 'Id Bagian',
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
     * Gets query for [[AduanPetugas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAduanPetugas()
    {
        return $this->hasMany(AduanPetugas::className(), ['id_petugas' => 'id']);
    }

    /**
     * Gets query for [[Bagian]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBagian()
    {
        return $this->hasOne(Bagian::className(), ['id' => 'id_bagian']);
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
        return $this->hasMany(User::className(), ['id_petugas' => 'id']);
    }
}
