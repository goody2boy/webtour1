<?php

namespace common\models\input;

use common\models\business\ImageBusiness;
use common\models\db\Item;
use common\models\enu\ImageType;
use common\models\output\DataPage;
use yii\base\Model;
use yii\data\Pagination;

class ItemSearch extends Model {

    public $keyword;
    public $active;
    public $sort;
    public $page;
    public $pageSize;
    public $w_thum = 0;
    public $h_thum = 0;
    public $ids;

    public function rules() {
        return [
            [['keyword', 'sort', 'ids'], 'string'],
            [['pageSize', 'page', 'active'], 'integer'],
        ];
    }

    /**
     * search
     * @param type $page
     * @return DataPage
     */
    public function search($page = false) {
        $query = Item::find();
        if (!is_array($this->ids)) {
            $this->ids = [];
        }
        if (!empty($this->ids) && sizeof($this->ids) > 0) {
            $query = Item::find()->where(['id' => $this->ids]);
        } else {
            if ($this->keyword != null && $this->keyword != '') {
                $query->andWhere(['LIKE', 'name', strtolower($this->keyword)])->orWhere(['LIKE', 'description', strtolower($this->keyword)])->orWhere(['LIKE', 'content', strtolower($this->keyword)])->orWhere(['LIKE', 'about', strtolower($this->keyword)])->orWhere(['LIKE', 'property', strtolower($this->keyword)]);
            }
            if ($this->active > 0) {
                $query->andWhere(['=', 'active', $this->active == 1 ? 1 : 0]);
            }
        }
        switch ($this->sort) {
            case 'active_asc':
                $query->orderBy("active ASC");
                break;
            case 'active_desc':
                $query->orderBy("active DESC");
                break;
            default :
                $query->orderBy("active DESC");
        }
        $dataPage = new DataPage();
        if (!$page) {
            return $query;
        }
        $dataPage->dataCount = $query->count();
        $dataPage->dataCount = $dataPage->dataCount == null ? 0 : $dataPage->dataCount;
        $dataPage->pageSize = $this->pageSize <= 0 ? 100 : $this->pageSize;
        $dataPage->page = $this->page <= 0 ? 1 : $this->page;
        $paging = new Pagination(['totalCount' => $dataPage->dataCount]);
        $paging->setPageSize($dataPage->pageSize);
        $paging->setPage($dataPage->page - 1);
        $query->limit($paging->getLimit());
        $query->offset($paging->getOffset());
        $dataPage->data = $query->all();
        $dataPage->pageCount = intval($dataPage->dataCount / $dataPage->pageSize);
        if ($dataPage->pageCount % $dataPage->pageSize != 0)
            $dataPage->pageCount = ceil($dataPage->pageCount) + 1;
        $dataPage->pageCount = $dataPage->pageCount < 1 ? 1 : $dataPage->pageCount - 1;
        $ids = [];
        foreach ($dataPage->data as $item) {
            $ids[] = $item->id;
        }
        $images = $this->genImage($ids);
        foreach ($dataPage->data as $item) {
            $item->images = isset($images[$item->id]) ? $images[$item->id] : [];
        }
        return $dataPage;
    }

    /**
     * Image file
     * @param type $ids
     * @return type
     */
    private function genImage($ids = []) {
        $thum = [];
        if ($this->w_thum > 0 && $this->h_thum > 0) {
            $thum = [$this->w_thum, $this->h_thum];
        }
        return ImageBusiness::getByTarget($ids, ImageType::ITEM, true, true);
    }

}
