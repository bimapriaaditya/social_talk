<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "bagian".
 *
 * @property int $id
 * @property string $nama
 *
 * @property Petugas[] $petugas
 */
class Bagian extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bagian';
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
     * Gets query for [[Petugas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPetugas()
    {
        return $this->hasMany(Petugas::className(), ['id_bagian' => 'id']);
    }

    public static function getList()
    {
        $query = Bagian::find()->orderBy(['id' => SORT_ASC])->all();
        return ArrayHelper::map($query, 'id', 'nama');   
    }
}
