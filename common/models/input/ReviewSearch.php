<?php

namespace common\models\input;

use common\models\business\ImageBusiness;
use common\models\business\UserBusiness;
use common\models\db\Review;
use common\models\output\DataPage;
use yii\base\Model;
use yii\data\Pagination;

class ReviewSearch extends Model {

    public $id;
    public $user_id;
    public $rate;
    public $review_comment;
    public $submit_timeFrom;
    public $submit_timeTo;
    public $sort;
    public $page;
    public $pageSize;

    public function rules() {
        return [
            [['review_comment', 'sort'], 'string'],
            [['id', 'rate', 'pageSize', 'page', 'submit_timeFrom', 'submit_timeTo'], 'integer'],
        ];
    }

    /**
     * search
     * @param type $page
     * @return DataPage
     */
    public function search($page = false) {
        $query = Review::find();
        if ($this->id > 0) {
            $query->andWhere(['=', 'id', $this->id]);
        }
        if ($this->user_id > 0) {
            $query->andWhere(['=', 'user_id', $this->user_id]);
        }
        if ($this->rate > 0) {
            $query->andWhere(['=', 'rate', $this->rate]);
        }
        if ($this->review_comment != null && $this->review_comment != '') {
            $query->andWhere(['LIKE', 'review_comment', $this->review_comment]);
        }
        if ($this->submit_timeFrom > 0 && $this->submit_timeTo > 0) {
            $query->andWhere(['between', 'submit_time', $this->submit_timeFrom / 1000, $this->submit_timeTo / 1000]);
        } else if ($this->submit_timeFrom > 0) {
            $query->andWhere('submit_time >= :time', [':time' => $this->submit_timeFrom / 1000]);
        } elseif ($this->submit_timeTo > 0) {
            $query->andWhere('submit_time <= :time', [':time' => $this->submit_timeTo / 1000]);
        }
        switch ($this->sort) {
            case 'rate_asc':
                $query->orderBy("rate ASC");
                break;
            case 'rate_desc':
                $query->orderBy("rate DESC");
                break;
            case 'submitTime_asc':
                $query->orderBy("submit_time ASC");
                break;
            case 'submitTime_desc':
                $query->orderBy("submit_time DESC");
                break;
            default :
                $query->orderBy("rate DESC");
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
        if ($dataPage->pageCount % $dataPage->pageSize != 0) {
            $dataPage->pageCount = ceil($dataPage->pageCount) + 1;
        }
        $dataPage->pageCount = $dataPage->pageCount < 1 ? 1 : $dataPage->pageCount - 1;
        foreach ($dataPage->data as $review) {
            $user = UserBusiness::get($review->user_id);
            $user->images = ImageBusiness::getByTarget($review->user_id, "user");
            $review->user = $user;
//            $review->image = $user->images[0]->imageId;
        }
        return $dataPage;
    }

}
