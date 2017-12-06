<?php

namespace backend\modules\app\models;

use backend\models\UserSearch;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\components\FHtml;

use backend\modules\app\models\AppUser;

/**
 * AppUser represents the model behind the search form about `backend\modules\app\models\AppUser`.
 */
class AppUserSearch extends UserSearch {

    public function search($params)
    {
        $this->role = FHtml::ROLE_USER;
        return parent::search($params);
    }

}
