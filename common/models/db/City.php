<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "city".
 *
 * @property string $id
 * @property string $name
 * @property string $code
 * @property integer $country_id
 * @property string $description
 * @property string $language
 */
class City extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'city';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'name', 'code', 'country_id', 'description', 'language'], 'required'],
            [['id', 'country_id'], 'integer'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 100],
            [['bg_color'], 'string', 'max' => 12],
            [['code', 'language'], 'string', 'max' => 3]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'code' => 'Code',
            'country_id' => 'Country ID',
            'description' => 'Description',
            'language' => 'Language',
            'bg_color' => 'Background color',
        ];
    }

    public function attributes() {
        return array_merge(parent::attributes(), ['images']);
    }

    
    public function attributes() {
        return array_merge(parent::attributes(), ['images']);
    }
}
}
