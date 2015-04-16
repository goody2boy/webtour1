<?php

namespace common\models\input;
use common\models\db\City;
use common\models\output\DataPage;
use yii\base\Model;
use yii\data\Pagination;
use common\models\business\ImageBusiness;
use common\models\enu\ImageType;

use yii\db\Query;
/**
 * Description of CitySearch
 *
 * @author CANH
 */
class CitySearch extends Model {

    public $id;
    public $name;
    public $description;
    public $code;
    public $country;
    public $language;
    public $bg_color;
    public $sort;
    public $page;
    public $pageSize;

    public function rules() {
        return [
            [['description', 'code', 'name', 'language', 'bg_color', 'sort'], 'string'],
            [['id', 'country', 'pageSize', 'page'], 'integer'],
        ];
    }

    /**
     * search
     * @param type $page
     * @return DataPage
     */
    public function search($page = false) {
        $query = City::find();
        if ($this->id > 0) {
            $query->andWhere(['=', 'id', $this->id]);
        }
        if ($this->name != null && $this->name != '') {
            $query->andWhere(['LIKE', 'name', trim(strtolower($this->name))]);
        }
        if ($this->code != null && $this->code != '') {
            $query->andWhere(['=', 'code', trim(strtoupper($this->code))]);
        }
        if ($this->description != null && $this->description != '') {
            $query->andWhere(['LIKE', 'description', trim(strtolower($this->description))]);
        }
        if ($this->language != null && $this->language != '') {
            $query->andWhere(['LIKE', 'language', strtolower($this->language)]);
        }
        if ($this->bg_color != null && $this->bg_color != '') {
            $query->andWhere(['=', 'bg_color', trim(strtolower($this->bg_color))]);
        }
        if ($this->country > 0) {
            $query->andWhere(['=', 'country_id', $this->country]);
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
//        $cityIds = [];
//        foreach ($dataPage->data as $city) {
//            $cityIds[] = $city->id;
//        }
//        $cityArr = $this->getCities($cityIds);
        
        foreach ($dataPage->data as $city) {
            $city->images = ImageBusiness::getByTarget($city->id, ImageType::CITY);
        }
        // lay trong vong for
        return $dataPage;
    }

}
