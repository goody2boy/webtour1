<?php

namespace common\models\input;

use common\models\db\Tour;
use common\models\output\DataPage;
use yii\base\Model;
use yii\data\Pagination;
use common\models\business\CityBusiness;
use common\models\business\PriceBusiness;
use common\models\business\CategoryBusiness;
use common\models\business\CategoryTourBusiness;
use common\models\business\UserBusiness;
use common\models\business\MoneyBusiness;
use yii\db\Query;

/**
 * Description of TourSearch
 *
 * @author CANH
 */
class TourSearch extends Model {

    public $id;
    public $title;
    public $price;
    public $city;
    public $code;
    public $tourType;
    public $language;
    public $durationTime;
    public $status;
    public $createTime;
    public $updateTime;
    public $createTimeTo;
    public $updateTimeTo;
    public $sort;
    public $page;
    public $pageSize;

    public function rules() {
        return [
            [['title', 'code', 'tourType', 'language', 'sort'], 'string'],
            [['id','city', 'price', 'status', 'durationTime', 'createTime', 'createTimeTo', 'updateTime', 'updateTimeTo', 'pageSize', 'page'], 'integer'],
        ];
    }

    /**
     * search
     * @param type $page
     * @return DataPage
     */
    public function search($page = false) {
        $query = Tour::find();
        if ($this->id > 0) {
            $query->andWhere(['=', 'id', $this->id]);
        }
        if ($this->title != null && $this->title != '') {
            $query->andWhere(['LIKE', 'title', trim(strtolower($this->title))]);
        }
        if ($this->price > 0) {
            $query->andWhere(['=', 'price', $this->price]);
        }
        if ($this->city > 0) {
            $query->andWhere(['=', 'city_id', $this->city]);
        }
        if ($this->code != null && $this->code != '') {
            $query->andWhere(['=', 'code', strtoupper($this->code)]);
        }
        if ($this->tourType != null && $this->tourType != '') {
            $query->andWhere(['like', 'category_ids', $this->tourType + ',']);
        }
        if ($this->language != null && $this->language != '') {
            $query->andWhere(['LIKE', 'language', strtolower($this->language)]);
        }
        if ($this->durationTime > 0) {
            $query->andWhere(['=', 'duration_time', $this->durationTime]);
        }
        if ($this->status != null && $this->status != '') {
            $query->andWhere(['=', 'status', $this->status]);
        }
        if ($this->createTime > 0 && $this->createTimeTo > 0) {
            $query->andWhere(['between', 'create_time', $this->createTime / 1000, $this->createTimeTo / 1000]);
        } else if ($this->createTime > 0) {
            $query->andWhere('create_time >= :time', [':time' => $this->createTime / 1000]);
        } elseif ($this->createTimeTo > 0) {
            $query->andWhere('create_time <= :time', [':time' => $this->createTimeTo / 1000]);
        }

        if ($this->updateTime > 0 && $this->updateTimeTo > 0) {
            $query->andWhere(['between', 'update_time', $this->updateTime / 1000, $this->updateTimeTo / 1000]);
        } else if ($this->updateTime > 0) {
            $query->andWhere('update_time >= :time', [':time' => $this->updateTime / 1000]);
        } else if ($this->updateTimeTo > 0) {
            $query->andWhere('update_time <= :time', [':time' => $this->updateTimeTo / 1000]);
        }
//        switch ($this->sort) {
//            case 'name_asc':
//                $query->orderBy("name ASC");
//                break;
//            case 'name_desc':
//                $query->orderBy("name DESC");
//                break;
//            case 'code_desc':
//                $query->orderBy("code DESC");
//                break;
//            case 'code_asc':
//                $query->orderBy("code ASC");
//                break;
//            case 'createTime_asc':
//                $query->orderBy("create_time ASC");
//                break;
//            case 'updateTime_asc':
//                $query->orderBy("update_time ASC");
//                break;
//            case 'updateTime_desc':
//                $query->orderBy("update_time DESC");
//                break;
//            default :
//                $query->orderBy("create_time DESC");
//        }
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
        $tourIds = [];
        $moneyIds = [];
        $authorIds = [];
        $cityIds = [];
        foreach ($dataPage->data as $tour) {
            $tourIds[] = $tour->id;
            $moneyIds[] = $tour->money_id;
            $authorIds[] = $tour->author_id;
            $cityIds[] = $tour->city_id;
        }
        $cityArr = $this->getCities($cityIds);
        $categoryArr = $this->getCategories($tourIds);
        $moneyArr = $this->getMoney($moneyIds);
        $authorArr = $this->getAuthors($authorIds);
        foreach ($dataPage->data as $tour) {
            $tour->city = $cityArr[$tour->city_id] != null ? $cityArr[$tour->city_id] : '';
            $tour->categories = $categoryArr[$tour->id] != null ? $categoryArr[$tour->id] : '';
            $tour->moneys = $moneyArr[$tour->money_id] != null ? $moneyArr[$tour->money_id] : '';
            $tour->author = $authorArr[$tour->author_id] != null ? $authorArr[$tour->author_id] : '';
//            $tour->prices =  PriceBusiness::getByTour($tourId);
//            $tour->moneys = MoneyBusiness::mGet($ids);
        }
        // lay trong vong for
        return $dataPage;
    }

    public static function getCategories($tourIds) {
        $categoryTours = CategoryTourBusiness::getByTour($tourIds);
        if ($categoryTours == null || empty($categoryTours)) {
            return $categoryTours;
        }
        $categoryIds = [];
        foreach ($categoryTours as $cateTour) {
            foreach ($cateTour as $cateId) {
                $categoryIds[] = $cateId;
            }
        }
        $categories = CategoryBusiness::getToKey($categoryIds);
        $result = [];
        foreach ($tourIds as $tour_id) {
            foreach ($categoryTours as $cateTour) {
                if (array_search($cateTour, $categoryTours) == $tour_id) {
                    foreach ($cateTour as $cateId) {
                        if (!isset($result[$tour_id]) || $result[$tour_id] == null) {
                            $result[$tour_id] = [];
                        }
                        $result[$tour_id][] = $categories[$cateId];
                    }
                }
            }
        }
        return $result;
    }

    public static function getTours($cateIds) {
        $categoryTours = CategoryTourBusiness::getByCate($cateIds);
        if ($categoryTours == null || empty($categoryTours)) {
            return $categoryTours;
        }
        $categories = [];
        foreach ($categoryTours as $cateTour) {
            $categories[] = $cateTour->cate_id;
        }
        return CategoryBusiness::mGet($categories);
    }

    public static function getMoney($moneyIds) {
        return MoneyBusiness::getToKey($moneyIds);
    }

    public static function getPrices($tourIds) {
        
    }

    public static function getAuthors($authorIds) {
        return UserBusiness::getToKey($authorIds);
    }

    public static function getCities($cityIds) {
        return CityBusiness::getToKey($cityIds);
    }

}
