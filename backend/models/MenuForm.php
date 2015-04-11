<?php

namespace backend\models;

use common\models\business\MenuBusiness;
use common\models\db\Menu;
use common\models\output\Response;
use yii\base\Model;

class MenuForm extends Model {

    public $id;
    public $name;
    public $parentId;
    public $type;
    public $position;
    public $link;
    public $active;

    public function rules() {
        return [
            [['name'], 'string'],
            [['link'], 'string'],
            [['position'], 'number', 'message' => '{attribute} phải là số'],
            [['name', 'position'], 'required', 'message' => '{attribute} không được để trống'],
            [['id', 'parentId', 'position', 'active'], 'integer'],
        ];
    }

    /**
     * Cập nhật menu trang chủ
     * @return Response
     */
    public function save() {
        if (!$this->validate()) {
            return new Response(false, "Dữ liệu không hợp  lệ", $this->errors);
        }
        $menu = MenuBusiness::get($this->id);
        if (empty($menu)) {
            $menu = new Menu();
        }
        $menu->name = $this->name;
        $menu->link = $this->link;
        $menu->parentId = $this->parentId;
        $menu->position = $this->position;
        $menu->active = $this->active == 1 ? 1 : 0;
        if (!$menu->save()) {
            return new Response(false, 'Có lỗi xảy ra trong quá trình truyền dữ liệu', $menu->errors);
        }
        return new Response(true, 'Cập nhật thành công menu', $menu);
    }

}
