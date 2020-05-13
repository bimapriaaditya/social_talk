<?php

namespace app\models;

use Yii;
use Yii\helpers\ArrayHelper;
/**
 * This is the model class for table "kategori".
 *
 * @property int $id
 * @property string $nama
 *
 * @property Aduan[] $aduans
 */
class Kategori extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kategori';
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
        $this->nama;
        return $this->hasMany(Aduan::className(), ['id_kategori' => 'id']);
    }

    public static function getList()
    {
        $query = self::find()->orderBy(['id' => SORT_ASC])->all();
        return ArrayHelper::map($query, 'id', 'nama');
    }

    public static function getListChart()
    {
        $list = [];
        foreach (self::find()->all() as $kategori) {
            $list[] = ['name' => $kategori->nama, 'y' => 20.25];
        }
        return $list;
    }
}
