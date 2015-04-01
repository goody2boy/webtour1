<?php

namespace common\models\business;

use common\models\db\Item;
use common\models\enu\ImageType;
use common\models\inter\InterBusiness;
use common\models\output\Response;

class ItemBusiness implements InterBusiness {

    /**
     * Menu
     * @param type $id
     * @return type
     */
    public static function get($id) {
        $item = Item::findOne($id);
        return $item;
    }

    public static function getWithImage($id) {
        $item = Item::findOne($id);
        $images = ImageBusiness::getByTarget($id, ImageType::ITEM);
        $img = [];
        if (!empty($images)) {
            foreach ($images as $image) {
                array_push($img, $image->imageId);
            }
        }
        $item->images = $img;
        return $item;
    }

    /**
     * Lấy ra tất cả các bản ghi items hiện hành
     * @return type
     */
    public static function getAll($limit = '', $active = 0) {
        $items = Item::find();
        if ($limit != '' || $limit != null) {
            $items->limit($limit);
        }
        if ($active > 0) {
            $items->andWhere(['=', 'active', $active == 1 ? 1 : 0]);
        }
        return $items->all();
    }

    /**
     * mget
     * @param type $ids
     * @return type
     */
    public static function mGet($ids) {
        return Item::find()->andWhere(["id" => $ids]);
    }

    /**
     * Thay đổi trạng thái partners
     * @param type $id
     */
    public static function changeActive($id) {
        $item = self::get($id);
        if ($item == null) {
            return new Response(false, "Item không tồn tại");
        }
        $item->active = $item->active == 1 ? 0 : 1;
        $item->save(false);
        return new Response(true, "Item " . $item->name . $item->active ? "đã mở khóa" : "đã khóa", $item);
    }

    /**
     * Xóa Partners theo id
     * @param type $id
     */
    public static function remove($id) {
        $item = self::get($id);
        if ($item == null) {
            return new Response(false, "Item không tồn tại");
        }
        ImageBusiness::deleteByTarget($item->id);
        $item->delete();
        return new Response(true, "Xóa Item thành công");
    }

    /**
     * Change position item theo id
     * @param type $id
     */
    public static function changePosition($id, $position) {
        $item = self::get($id);
        if ($item == null) {
            return new Response(false, "Item không tồn tại");
        }
        $item->position = $position;
        if (!$item->save(false)) {
            return new Response(false, "Thay đổi trạng thái hiển thị không thành công", $item->errors);
        }
        return new Response(true, "Thay đổi trạng thái hiển thị thành công", $item);
    }

}
