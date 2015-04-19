<?php

namespace common\models\input;

use common\models\business\ImageBusiness;
use common\models\db\User;
use common\models\enu\ImageType;
use common\models\output\DataPage;
use yii\base\Model;
use yii\data\Pagination;

// Lap Dam
class UserSearch extends Model {

    public $keyword;
    public $active;
    public $createTimeTo;
    public $createTimeFrom;
    public $sort;
    public $page;
    public $pageSize;

    public function rules() {
        return [
            [['keyword', 'sort'], 'string'],
            [['createTimeTo', 'createTimeFrom'], 'number'],
            [['pageSize', 'page', 'active'], 'integer'],
        ];
    }

    public function search($page = false) {
        $query = User::find();

        if (!empty($this->keyword)) {
            $query->andWhere(['LIKE', 'email', strtolower($this->keyword)])->orWhere(['LIKE', 'firstName', strtolower($this->keyword)])->orWhere(['LIKE', 'lastName', strtolower($this->keyword)])->orWhere(['LIKE', 'username', strtolower($this->keyword)])->orWhere(['LIKE', 'address', strtolower($this->keyword)])->orWhere(['LIKE', 'phone', strtolower($this->keyword)]);
        }
        if ($this->active > 0) {
            $query->andWhere(['=', 'active', $this->active == 1 ? 1 : 0]);
        }

        if ($this->createTimeTo > 0 && $this->createTimeFrom > 0) {
            $query->andWhere(['between', 'createTime', $this->createTimeTo / 1000, $this->createTimeFrom / 1000]);
        } else if ($this->createTimeTo > 0) {
            $query->andWhere('createTime >= :time', [':time' => $this->createTimeTo / 1000]);
        } else if ($this->createTimeFrom > 0) {
            $query->andWhere('createTime <= :time', [':time' => $this->createTimeFrom / 1000]);
        }
        switch ($this->sort) {
            case 'createTime_asc':
                $query->orderBy("createTime ASC");
                break;
            case 'active_asc':
                $query->orderBy("active ASC");
                break;
            case 'active_desc':
                $query->orderBy("active DESC");
                break;
            default :
                $query->orderBy("createTime DESC");
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
        $dataPage->pageCount = $dataPage->dataCount / $dataPage->pageSize;
        if ($dataPage->pageCount % $dataPage->pageSize != 0)
            $dataPage->pageCount = ceil($dataPage->pageCount) + 1;
        $dataPage->pageCount = $dataPage->pageCount < 1 ? 1 : $dataPage->pageCount - 1;
        $ids = [];
        foreach ($dataPage->data as $item) {
            $ids[] = $item->id;
        }
        $images = ImageBusiness::getByTarget($ids, ImageType::USER, true, true);

        foreach ($dataPage->data as $item) {
            $item->images = isset($images[$item->id]) ? $images[$item->id] : [];
        }
        return $dataPage;
    }

}
