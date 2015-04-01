<?php

namespace backend\models;

use common\models\business\ItemBusiness;
use common\models\db\Item;
use common\models\output\Response;
use common\util\TextUtils;
use yii\base\Model;

class ItemForm extends Model {

    public $id;
    public $name;
    public $content;
    public $property;
    public $description;
    public $active;
    public $about;
    public $position;
    public $price;

    public function rules() {
        return [
            [['name', 'description','position'], 'required', 'message' => "{attribute} không được để trống"],
            [['description', 'content', 'property', 'about'], 'string', 'message' => "{attribute} phải là ký tự"],
            [['active', 'position','id','price'], 'integer', 'message' => "{attribute} phải là số"],
            [['name'], 'string', 'max' => 255, 'message' => "{attribute} tối đa là 255 ký tự"]
        ];
    }

    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Tên',
            'description' => 'Mô tả',
            'content' => 'Nội dung',
            'property' => 'Thuộc tính',
            'about' => 'Thông tin',
            'active' => 'Trạng thái',
            'position' => 'Vị trí',
            'price' => 'Giá',
        ];
    }

    public function save() {
        if (!$this->validate()) {
            return new Response(false, "Dữ liệu không chính xác vui lòng nhập lại", $this->errors);
        }

        $item = ItemBusiness::get($this->id);
        if ($item == null) {
            $item = new Item();
        }
        $item->name = $this->name;
        $item->about = $this->about;
        $item->description = $this->description;
        $item->property = $this->property;
        $item->position = $this->position;
        $item->price = $this->price;
        $item->active = $this->active == 1 ? 1 : 0;

        if (!$item->save(false)) {
            return new Response(false, "Dữ liệu truyền vào không chính xác vui lòng nhập lại", $item->errors);
        }

        return new Response(true, "Lưu -- " . $item->name . " --  thành công", $item);
    }

    public function content() {
        $item = ItemBusiness::get($this->id);
        if ($item == null) {
            return new Response(false, "Không tìm thấy item này!", []);
        }
        $item->content = $this->content;
        if (!$item->save(false)) {
            return new Response(false, "Dữ liệu truyền vào không chính xác vui lòng nhập lại", $item->errors);
        }
        return new Response(true, "Lưu nội dung thành công", $item);
    }
    public function about() {
        $item = ItemBusiness::get($this->id);
        if ($item == null) {
            return new Response(false, "Không tìm thấy item này!", []);
        }
        $item->about = $this->about;
        if (!$item->save(false)) {
            return new Response(false, "Dữ liệu truyền vào không chính xác vui lòng nhập lại", $item->errors);
        }
        return new Response(true, "Lưu thông thành công", $item);
    }
    public function property() {
        $item = ItemBusiness::get($this->id);
        if ($item == null) {
            return new Response(false, "Không tìm thấy item này!", []);
        }
        $item->property = $this->property;
        if (!$item->save(false)) {
            return new Response(false, "Dữ liệu truyền vào không chính xác vui lòng nhập lại", $item->errors);
        }
        return new Response(true, "Lưu thuộc tính thành công", $item);
    }

}
