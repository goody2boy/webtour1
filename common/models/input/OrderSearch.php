<?php

namespace common\models\input;

use common\models\db\Order;
use common\models\output\DataPage;
use yii\base\Model;
use yii\data\Pagination;
use common\models\business\CityBusiness;
use common\models\business\HightLightBusiness;
use common\models\business\PriceBusiness;
use common\models\business\ImageBusiness;
use common\models\business\CategoryBusiness;
use common\models\business\CategoryTourBusiness;
use common\models\business\UserBusiness;
use common\models\business\MoneyBusiness;
use yii\db\Query;

/**
 * Description of OrderSearch
 *
 * @author CANH
 */
class OrderSearch extends Model {

    public $id;
    public $tour_id;
    public $user_id;
    public $price_id;
    public $number_adult;
    public $number_child;
    public $number_nochild;
    public $total_price;
    public $date_departure;
    public $create_timeFrom;
    public $create_timeTo;
    public $update_timeFrom;
    public $update_timeTo;
    public $promo_code;
    public $payment_method;
    public $status_payment;
    public $sort;
    public $page;
    public $pageSize;

    public function rules() {
        return [
            [['title', 'code', 'tourType', 'language', 'sort'], 'string'],
            [['id', 'user_id', 'tour_id', 'price_id', 'total_price', 'number_adult', 'number_child', 'number_nochild', 'create_timeFrom', 'create_timeTo', 'update_timeFrom', 'update-timeTo', 'pageSize', 'page'], 'integer'],
        ];
    }

    /**
     * search
     * @param type $page
     * @return DataPage
     */
    public function search($page = false) {
        $query = Order::find();
        if ($this->id > 0) {
            $query->andWhere(['=', 'id', $this->id]);
        }
        if ($this->tour_id != null && $this->tour_id != '') {
            $query->andWhere(['=', 'tour_id', $this->tour_id]);
        }
        if ($this->price_id > 0) {
            $query->andWhere(['=', 'price_id', $this->price_id]);
        }
        if ($this->user_id > 0) {
            $query->andWhere(['=', 'user_id', $this->user_id]);
        }
        if ($this->total_price > 0) {
            $query->andWhere(['=', 'total_price', $this->total_price]);
        }
        if ($this->promo_code != null && $this->promo_code != '') {
            $query->andWhere(['=', 'promo_code', strtoupper($this->promo_code)]);
        }
        if ($this->payment_method != null && $this->payment_method != '') {
            $query->andWhere(['LIKE', 'payment_method', strtoupper($this->payment_method)]);
        }
        if ($this->status_payment != null && $this->status_payment != '') {
            $query->andWhere(['LIKE', 'status_payment', strtoupper($this->status_payment)]);
        }

        //
        if ($this->create_timeFrom > 0 && $this->create_timeTo > 0) {
            $query->andWhere(['between', 'create_time', $this->create_timeFrom / 1000, $this->create_timeTo / 1000]);
        } else if ($this->create_timeFrom > 0) {
            $query->andWhere('create_time >= :time', [':time' => $this->create_timeFrom / 1000]);
        } elseif ($this->create_timeTo > 0) {
            $query->andWhere('create_time <= :time', [':time' => $this->create_timeTo / 1000]);
        }

        if ($this->update_timeFrom > 0 && $this->update_timeTo > 0) {
            $query->andWhere(['between', 'update_time', $this->update_timeFrom / 1000, $this->update_timeTo / 1000]);
        } else if ($this->update_timeFrom > 0) {
            $query->andWhere('update_time >= :time', [':time' => $this->update_timeFrom / 1000]);
        } else if ($this->update_timeTo > 0) {
            $query->andWhere('update_time <= :time', [':time' => $this->update_timeTo / 1000]);
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
        $userIds = [];
        $Ids = [];
        foreach ($dataPage->data as $order) {
            $userIds[] = $order->user_id;
            $Ids[] = $order->id;
        }
        $userArr = $this->getAuthors($userIds);
        foreach ($dataPage->data as $order) {
            $tourSearch = new TourSearch();
            $tourSearch->id = $order->tour_id;
            $tourSearch->status = 1;
            $result = $tourSearch->search(true)->data;
            $order->tour = $result[0];
            $order->user = $userArr[$order->user_id] != null ? $userArr[$order->user_id] : '';
            $order->price = PriceBusiness::get($order->price_id);
        }
        // lay trong vong for
        return $dataPage;
    }

    public static function getAuthors($authorIds) {
        return UserBusiness::getToKey($authorIds);
    }

}
