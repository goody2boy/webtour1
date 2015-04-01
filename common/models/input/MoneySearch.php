<?php

namespace common\models\input;

use common\models\business\ImageBusiness;
use common\models\db\Money;
use common\models\enu\ImageType;
use common\models\output\DataPage;
use yii\base\Model;
use yii\data\Pagination;

class MoneySearch extends Model {

    public $id;
    public $name;
    public $code;
    public $language;
    public $createTimeTo;
    public $createTimeFrom;
    public $updateTimeFrom;
    public $updateTimeTo;
    public $sort;
    public $page;
    public $pageSize;

    public function rules() {
        return [
            [['name', 'sort', 'code', 'language'], 'string'],
            [['id','pageSize', 'page','createTimeFrom', 'createTimeTo', 'updateTimeFrom', 'updateTimeTo'], 'integer'],
        ];
    }

    /**
     * search
     * @param type $page
     * @return DataPage
     */
    public function search($page = false) {
        $query = Money::find();
        if ($this->id > 0) {
            $query->andWhere(['=', 'id', $this->id]);
        }
        if ($this->name != null && $this->name != '') {
            $query->andWhere(['LIKE', 'name', strtolower($this->name)]);
        }
        if ($this->code != null && $this->code != '') {
            $query->andWhere(['=', 'code', strtoupper($this->code)]);
        }
        if ($this->language != null && $this->language != '') {
            $query->andWhere(['LIKE', 'language', strtolower($this->language)]);
        }
        if ($this->createTimeFrom > 0 && $this->createTimeTo > 0) {
            $query->andWhere(['between', 'create_time', $this->createTimeFrom / 1000, $this->createTimeTo / 1000]);
        } else if ($this->createTimeFrom > 0) {
            $query->andWhere('create_time >= :time', [':time' => $this->createTimeFrom / 1000]);
        } elseif ($this->createTimeTo > 0) {
            $query->andWhere('create_time <= :time', [':time' => $this->createTimeTo / 1000]);
        }

        if ($this->updateTimeFrom > 0 && $this->updateTimeTo > 0) {
            $query->andWhere(['between', 'update_time', $this->updateTimeFrom / 1000, $this->updateTimeTo / 1000]);
        } else if ($this->updateTimeFrom > 0) {
            $query->andWhere('update_time >= :time', [':time' => $this->updateTimeFrom / 1000]);
        } else if ($this->updateTimeTo > 0) {
            $query->andWhere('update_time <= :time', [':time' => $this->updateTimeTo / 1000]);
        }
        switch ($this->sort) {
            case 'name_asc':
                $query->orderBy("name ASC");
                break;
            case 'name_desc':
                $query->orderBy("name DESC");
                break;
            case 'code_desc':
                $query->orderBy("code DESC");
                break;
            case 'code_asc':
                $query->orderBy("code ASC");
                break;
            case 'createTime_asc':
                $query->orderBy("create_time ASC");
                break;
            case 'updateTime_asc':
                $query->orderBy("update_time ASC");
                break;
            case 'updateTime_desc':
                $query->orderBy("update_time DESC");
                break;
            default :
                $query->orderBy("create_time DESC");
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
//        $ids = [];
//        foreach ($dataPage->data as $item) {
//            $ids[] = $item->id;
//        }
//        $images = $this->genImage($ids);
//        foreach ($dataPage->data as $item) {
//            $item->images = isset($images[$item->id]) ? $images[$item->id] : [];
//        }
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
        return ImageBusiness::getByTarget($ids, ImageType::ALBUM, true, true);
    }

}
