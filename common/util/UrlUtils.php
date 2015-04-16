<?php

namespace common\util;

use common\models\input\ItemSearch;
use Yii;

class UrlUtils {

    /**
     * 
     * @return type
     */
    public static function home() {
        return Yii::$app->urlManager->createAbsoluteUrl("index");
    }

    /**
     * Danh mục tin tức
     * @param type $alias
     * @return type
     */
    public static function newsBrowse($alias = null) {
        if ($alias == null) {
            return "tin-tuc.html";
        }
        return "tin-tuc/" . trim(strtolower($alias));
    }

    /**
     * Chi tiết tin tức
     * @param type $alias
     * @return type
     */
    public static function news($alias = null) {
        if (empty($alias)) {
            return "other-service.html";
        }
        return "other-service/" . trim(strtolower($alias)) . ".html";
    }

    public static function contact() {
        return "lien-he.html";
    }

    public static function reviews() {
        return "y-kien-khach-hang.html";
    }

    /**
     * Danh mục tin tức
     * @param type $alias
     * @return type
     */
    public static function browse($alias = null, ItemSearch $search = null) {
        if ($alias == null) {
            return "danh-muc-san-pham.html";
        }
        return "p/" . trim(strtolower($alias)) . "";
    }

    public static function tour($name, $id) {
        return "tour/" . TextUtils::removeMarks($name) . "-" . trim($id) . ".html";
    }

    public static function tourtype($name, $id) {
        return "tour-type/" . TextUtils::removeMarks($name) . "-" . trim($id) . ".html";
    }

    public static function citytypes($name, $id) {
        return "city-type/" . TextUtils::removeMarks($name) . "-" . trim($id) . ".html";
    }

    public static function citytours($name, $id, $type, $typeId) {
        return "city-tours/" . TextUtils::removeMarks($type) . "-" . trim($typeId) . "/" . TextUtils::removeMarks($name) . "-" . trim($id) . ".html";
    }

    public static function hightlight($name, $id) {
        return "hightlight/" . TextUtils::removeMarks($name) . "-" . trim($id) . ".html";
    }

    public static function cate($name) {
        
    }

    /**
     * Chi tiết sản phẩm
     * @param type $name
     * @param type $id
     * @return string
     */
    public static function item($name, $id) {
        return "p/" . TextUtils::removeMarks($name) . "-" . trim($id) . ".html";
    }

    public static function itemlist() {
        return "san-pham.html";
    }

    public static function signin() {
        return "dang-nhap.html";
    }

    public static function sigout() {
        return "dang-xuat.html";
    }

    public static function video($id = null, $name = null) {
        if ($id == null || $name == null)
            return "video.html";
        return "video/" . TextUtils::removeMarks($name) . '-' . $id . ".html";
    }

    public static function album($id = null, $name = null) {
        if ($id == null || $name == null)
            return "hinh-anh.html";
        return "hinh-anh/" . TextUtils::removeMarks($name) . '-' . $id . ".html";
    }

    public static function checkout($id = null) {
        if ($id == null)
            return "dat-hang.html";
        return "dat-hang.html?id=" . $id;
    }

}
