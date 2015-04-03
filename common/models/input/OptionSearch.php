<?php

namespace common\models\input;

use common\models\db\Option;
use common\models\output\DataPage;
use yii\base\Model;
use yii\data\Pagination;

/* Quang.nh */

class OptionSearch extends Model {

    public $id;
    public $keyword;
    public $auto_load;
    public $sort;
    public $page;
    public $pageSize;

    public function rules() {
        return [
            [['auto_load', 'id', 'page', 'pageSize'], 'integer'],
            [['keyword'], 'string', 'max' => 220],
            [['sort'], 'string'],
        ];
    }

    public function search($page = false) {
        $query = Option::find();
        if ($this->auto_load > 0) {
            $query->andWhere(['=', 'auto_load', $this->auto_load == 1 ? 1 : 0]);
        }
        if ($this->keyword != null && $this->keyword != '') {
            $query->andWhere(['LIKE', 'name', strtolower($this->keyword)])->orWhere(['LIKE', 'value', strtolower($this->keyword)])->orWhere(['LIKE', 'key', strtolower($this->keyword)]);
        }

        switch ($this->sort) {
            case 'key_desc':
                $query->orderBy("key DESC");
                break;
            case 'value_asc':
                $query->orderBy("value ASC");
                break;
            case 'name_asc':
                $query->orderBy("name ASC");
                break;
            case 'name_desc':
                $query->orderBy("name DESC");
                break;
            case 'value_desc':
                $query->orderBy("value DESC");
                break;
            default :
                $query->orderBy("key ASC");
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
        $dataPage->pageCount = $dataPage->pageCount < 1 ? 1 : $dataPage->pageCount;
        return $dataPage;
    }

}
