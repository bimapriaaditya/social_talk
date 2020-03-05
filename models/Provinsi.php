<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "provinsi".
 *
 * @property int $id
 * @property string $nama
 *
 * @property Aduan[] $aduans
 * @property Masyarakat[] $masyarakats
 * @property Petugas[] $petugas
 */
class Provinsi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'provinsi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['nama'], 'string', 'max' => 255],
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
        ];
    }

    /**
     * Gets query for [[Aduans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAduans()
    {
        return $this->hasMany(Aduan::className(), ['id_provinsi' => 'id']);
    }

    /**
     * Gets query for [[Masyarakats]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMasyarakats()
    {
        return $this->hasMany(Masyarakat::className(), ['id_provinsi' => 'id']);
    }

    /**
     * Gets query for [[Petugas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPetugas()
    {
        return $this->hasMany(Petugas::className(), ['id_provinsi' => 'id']);
    }
}
