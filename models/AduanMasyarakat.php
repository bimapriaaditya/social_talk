<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "aduan_masyarakat".
 *
 * @property int $id
 * @property int $id_aduan
 * @property int $id_masyarakat
 * @property string $text
 * @property string $tanggal
 *
 * @property Aduan $aduan
 * @property Masyarakat $masyarakat
 */
class AduanMasyarakat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'aduan_masyarakat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_aduan', 'id_masyarakat', 'text', 'tanggal'], 'required'],
            [['id_aduan', 'id_masyarakat'], 'integer'],
            [['text'], 'string'],
            [['tanggal'], 'safe'],
            [['id_aduan'], 'exist', 'skipOnError' => true, 'targetClass' => Aduan::className(), 'targetAttribute' => ['id_aduan' => 'id']],
            [['id_masyarakat'], 'exist', 'skipOnError' => true, 'targetClass' => Masyarakat::className(), 'targetAttribute' => ['id_masyarakat' => 'id']],
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
            'id_masyarakat' => 'Id Masyarakat',
            'text' => 'Text',
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

    /**
     * Gets query for [[Masyarakat]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMasyarakat()
    {
        return $this->hasOne(Masyarakat::className(), ['id' => 'id_masyarakat']);
    }
}
