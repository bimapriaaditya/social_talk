<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "aduan_tanggapan".
 *
 * @property int $id
 * @property int $id_aduan
 * @property string $tanggapan
 * @property string $tanggal
 *
 * @property Aduan $aduan
 */
class AduanTanggapan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'aduan_tanggapan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_aduan', 'tanggapan', 'tanggal'], 'required'],
            [['id_aduan'], 'integer'],
            [['tanggapan'], 'string'],
            [['tanggal'], 'safe'],
            [['id_aduan'], 'exist', 'skipOnError' => true, 'targetClass' => Aduan::className(), 'targetAttribute' => ['id_aduan' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_aduan' => 'Id Aduan',
            'tanggapan' => 'Tanggapan',
            'tanggal' => 'Tanggal',
        ];
    }

    /**
     * Gets query for [[Aduan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAduan()
    {
        return $this->hasOne(Aduan::className(), ['id' => 'id_aduan']);
    }
}
