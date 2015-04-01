<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "item".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $content
 * @property string $property
 * @property string $about
 * @property integer $active
 * @property integer $position
 * @property double $price
 */
class Item extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'item';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name', 'description', 'content', 'property', 'about','price'], 'required'],
            [['description', 'content', 'property', 'about'], 'string'],
            [['active', 'position','price'], 'integer'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'content' => 'Content',
            'property' => 'Property',
            'about' => 'About',
            'active' => 'Active',
            'position' => 'Position',
        ];
    }

    public function attributes() {
        return array_merge(parent::attributes(), ['images']);
    }

}
