<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "tour".
 *
 * @property string $id
 * @property string $code
 * @property string $title
 * @property integer $city_id
 * @property string $description
 * @property string $full_initerary
 * @property string $inclusion
 * @property string $exclusion
 * @property string $note
 * @property string $mapp_address
 * @property integer $price_id
 * @property integer $duration_time
 * @property integer $money_id
 * @property integer $create_time
 * @property integer $update_time
 * @property integer $end_time
 * @property integer $author_id
 * @property string $laguage
 * @property string $status
 */
class Tour extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tour';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'code', 'title', 'city_id', 'description', 'full_initerary', 'inclusion', 'exclusion', 'note', 'mapp_address', 'price_id', 'duration_time', 'money_id', 'create_time', 'update_time', 'end_time', 'author_id', 'laguage', 'status'], 'required'],
            [['id', 'city_id', 'price_id', 'duration_time', 'money_id', 'create_time', 'update_time', 'end_time', 'author_id'], 'integer'],
            [['description', 'full_initerary', 'inclusion', 'exclusion', 'note'], 'string'],
            [['code'], 'string', 'max' => 10],
            [['title', 'mapp_address'], 'string', 'max' => 100],
            [['laguage'], 'string', 'max' => 3],
            [['status'], 'string', 'max' => 12]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'title' => 'Title',
            'city_id' => 'City ID',
            'description' => 'Description',
            'full_initerary' => 'Full Initerary',
            'inclusion' => 'Inclusion',
            'exclusion' => 'Exclusion',
            'note' => 'Note',
            'mapp_address' => 'Mapp Address',
            'price_id' => 'Price ID',
            'duration_time' => 'Duration Time',
            'money_id' => 'Money ID',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'end_time' => 'End Time',
            'author_id' => 'Author ID',
            'laguage' => 'Laguage',
            'status' => 'Status',
        ];
    }
}
