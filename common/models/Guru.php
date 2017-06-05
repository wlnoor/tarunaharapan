<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "guru".
 *
 * @property integer $id
 * @property string $nama
 * @property string $alamat
 * @property string $photo
 */
class Guru extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'guru';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama','nip','id_mapel'], 'required'],
            [['alamat'], 'string'],
            [['nama', 'photo','nip'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'id_mapel' => 'Mata Pelajaran',
            'alamat' => 'Alamat',
            'photo' => 'Photo',
            'nip' => 'NIP'
        ];
    }

    public function getMapel()
    {
        return $this->hasOne(Mapel::className(),['mapel.id'=>'id_mapel']);
    }

    public function getRelationField($relation,$field)
    {
        if(!empty($this->$relation->$field)){
            return $this->$relation->$field;   
        } else {
            return null;
        }
    }
}
