<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "aduan".
 *
 * @property int $id
 * @property int $id_masyarakat
 * @property string $nama
 * @property string $tanggal
 * @property int $id_kategori
 * @property int $id_provinsi
 * @property int $id_kota
 * @property string $keterangan_tempat
 * @property string $deskripsi
 * @property string|null $img_bukti_1
 * @property string|null $img_bukti_2
 * @property string|null $img_bukti_3
 * @property int $sifat
 *
 * @property Provinsi $provinsi
 * @property Kota $kota
 * @property Kategori $kategori
 * @property Masyarakat $masyarakat
 * @property AduanMasyarakat[] $aduanMasyarakats
 * @property AduanPetugas[] $aduanPetugas
 * @property AduanTanggapan[] $aduanTanggapans
 */
class Aduan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'aduan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_masyarakat', 'nama', 'tanggal', 'id_kategori', 'id_provinsi', 'id_kota', 'keterangan_tempat', 'deskripsi', 'sifat'], 'required'],
            [['id_masyarakat', 'id_kategori', 'id_provinsi', 'id_kota', 'sifat', 'id_petugas'], 'integer'],
            [['tanggal', 'penentuan', 'penentuan_waktu', 'id_petugas'], 'safe'],
            [['keterangan_tempat', 'deskripsi'], 'string'],
            [['nama', 'img_bukti_1', 'img_bukti_2', 'img_bukti_3'], 'string', 'max' => 255],
            [['id_provinsi'], 'exist', 'skipOnError' => true, 'targetClass' => Provinsi::className(), 'targetAttribute' => ['id_provinsi' => 'id']],
            [['id_kota'], 'exist', 'skipOnError' => true, 'targetClass' => Kota::className(), 'targetAttribute' => ['id_kota' => 'id']],
            [['id_kategori'], 'exist', 'skipOnError' => true, 'targetClass' => Kategori::className(), 'targetAttribute' => ['id_kategori' => 'id']],
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
            'id_masyarakat' => 'Id Masyarakat',
            'nama' => 'Nama',
            'tanggal' => 'Tanggal',
            'id_kategori' => 'Id Kategori',
            'id_provinsi' => 'Id Provinsi',
            'id_kota' => 'Id Kota',
            'keterangan_tempat' => 'Keterangan Tempat',
            'deskripsi' => 'Deskripsi',
            'img_bukti_1' => 'Img Bukti 1',
            'img_bukti_2' => 'Img Bukti 2',
            'img_bukti_3' => 'Img Bukti 3',
            'sifat' => 'Sifat',
            'penentuan' => 'Penentuan',
            'penentuan_waktu' => 'Waktu Penentuan',
            'id_petugas' => 'Pemeriksa Aduan',
        ];
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
     * Gets query for [[Kategori]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKategori()
    {
        return $this->hasOne(Kategori::className(), ['id' => 'id_kategori']);
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

    public function getPetugas()
    {
        return $this->hasOne(Petugas::className(), ['id' => 'id_petugas']);
    }

    /**
     * Gets query for [[AduanMasyarakats]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAduanMasyarakats()
    {
        return $this->hasMany(AduanMasyarakat::className(), ['id_aduan' => 'id']);
    }

    /**
     * Gets query for [[AduanPetugas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAduanPetugas()
    {
        return $this->hasMany(AduanPetugas::className(), ['id_aduan' => 'id']);
    }

    /**
     * Gets query for [[AduanTanggapans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAduanTanggapans()
    {
        return $this->hasMany(AduanTanggapan::className(), ['id_aduan' => 'id']);
    }

    public function deleteFile1()
    {
        $path = Yii::getAlias('@Bukti1ImgPath') . '/' . $this->img_bukti_1;
        return unlink($path);
    }

    public function deleteFile2()
    {
        $path = Yii::getAlias('@Bukti2ImgPath') . '/' . $this->img_bukti_2;
        return unlink($path);
    }

    public function deleteFile3()
    {
        $path = Yii::getAlias('@Bukti3ImgPath') . '/' . $this->img_bukti_3;
        return unlink($path);
    }

    public static function getTerkirimCount()
    {
        return (int) self::find()
            ->andWhere(['penentuan' => 'TERKIRIM'])
            ->count();
    }

    public static function getDiprosesCount()
    {
        return (int) self::find()
            ->andWhere(['penentuan' => 'DIPROSES'])
            ->count();
    }

    public static function getDiterimaCount()
    {
        return (int) self::find()
            ->andWhere(['penentuan' => 'DITERIMA'])
            ->count();
    }

    public static function getDitolakCount()
    {
        return (int) self::find()
            ->andWhere(['penentuan' => 'TERKIRIM'])
            ->count();
    }
    
}
