<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "laporan_tahunan".
 *
 * @property int $id
 * @property string $type
 * @property string $tahun
 * @property int|null $januari
 * @property int|null $februari
 * @property int|null $maret
 * @property int|null $april
 * @property int|null $mei
 * @property int|null $juni
 * @property int|null $juli
 * @property int|null $agustus
 * @property int|null $september
 * @property int|null $oktober
 * @property int|null $november
 * @property int|null $desember
 * @property int|null $total
 */
class LaporanTahunan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'laporan_tahunan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'tahun'], 'required'],
            [['type'], 'string'],
            [['januari', 'februari', 'maret', 'april', 'mei', 'juni', 'juli', 'agustus', 'september', 'oktober', 'november', 'desember', 'total'], 'integer'],
            [['tahun'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'tahun' => 'Tahun',
            'januari' => 'Januari',
            'februari' => 'Februari',
            'maret' => 'Maret',
            'april' => 'April',
            'mei' => 'Mei',
            'juni' => 'Juni',
            'juli' => 'Juli',
            'agustus' => 'Agustus',
            'september' => 'September',
            'oktober' => 'Oktober',
            'november' => 'November',
            'desember' => 'Desember',
            'total' => 'Total',
        ];
    }

    public static function getBlueChart()
    {
        $blue = [];
        $tahun = date('Y');
        foreach (self::find()->andWhere(['type' => 'blue', 'tahun' => $tahun])->all() as $data) {
            $blue = [
                $data->januari,
                $data->februari,
                $data->maret,
                $data->april,
                $data->mei,
                $data->juni,
                $data->juli,
                $data->agustus,
                $data->september,
                $data->oktober,
                $data->november,
                $data->desember
            ];
        }
        return $blue;
    }

    public static function getTotalBlue()
    {
         $tahun = date('Y');
        foreach (self::find()->andWhere(['type' => 'blue', 'tahun' => $tahun])->all() as $data) {
            return $data->total;
        }   
    }

    public static function getBlackChart()
    {
        $black = [];
        $tahun = date("Y",strtotime("-1 year"));
        foreach (self::find()->andWhere(['type' => 'black', 'tahun' => $tahun])->all() as $data) {
            $black = [
                $data->januari,
                $data->februari,
                $data->maret,
                $data->april,
                $data->mei,
                $data->juni,
                $data->juli,
                $data->agustus,
                $data->september,
                $data->oktober,
                $data->november,
                $data->desember
            ];
        }
        return $black;
    }

    public static function getTotalBlack()
    {
        $tahun = date("Y",strtotime("-1 year"));
        foreach (self::find()->andWhere(['type' => 'black', 'tahun' => $tahun])->all() as $data) {
            return $data->total;
        }   
    }

    public static function getGreenChart()
    {
        $green = [];
        $tahun = date("Y",strtotime("-2 year"));
        foreach (self::find()->andWhere(['type' => 'green', 'tahun' => $tahun])->all() as $data) {
            $green = [
                $data->januari,
                $data->februari,
                $data->maret,
                $data->april,
                $data->mei,
                $data->juni,
                $data->juli,
                $data->agustus,
                $data->september,
                $data->oktober,
                $data->november,
                $data->desember
            ];
        }
        return $green;
    }
}
