<?php

namespace backend\modules\crm;
use backend\models\AuthMenu;
use backend\modules\purchase\models\PurchaseItem;
use backend\modules\purchase\models\PurchaseItemSearch;
use backend\modules\purchase\models\PurchaseRequest;
use common\components\FHtml;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\StringHelper;

/**
 * purchase module definition class
 */
class Crm extends \yii\base\Module
{
    const STATUS_NEW = FHtml::STATUS_NEW;
    const STATUS_CLOSED = FHtml::STATUS_DONE;
    const STATUS_PROCESSING = FHtml::STATUS_PROCESSING;

    const LOCATIONS = [];
    const LOOKUP = [
        'crm_client.sale_user' => 'common.user',
        'crm_quotation.status' => FHtml::STATUS_ARRAY,
        'crm_client.type' => 'provider.type',
        'crm_client.status' => 'provider.status'


    ];

    const FIELDS_GROUP = [
        'lang*', '*type', '*status', '*parent_id', '*parentid', '*category_id', 'is_*'
    ];

    public static function getLookupArray($column) {
        if (key_exists($column, self::LOOKUP)) {
            $data = self::LOOKUP[$column];
            if (is_string($data))
            {
                $arr = explode('.', $data);
                if (count($arr) > 1)
                    $data = FHtml::getComboArray($data, $arr[0], $arr[1]);
                else if (StringHelper::startsWith($data, '@'))
                    $data = FHtml::getComboArray($data);
            }

            return $data;
        }

//        if (FHtml::isInArray($column, ['*client_id']))
//            $data = FHtml::getComboArray('crm_client', 'crm_client', 'client_id');

        if (FHtml::isInArray($column, ['*_user']))
            return FHtml::getArray('', 'user');

        if ($column == 'product_id')
            return FHtml::getProducts();

        return [];
    }

    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'backend\modules\crm\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
    }

    public static function createModuleMenu($menu = ['crm*', 'crm-client', 'crm-quotation'])
    {
        $controller = FHtml::currentController();

        $menu[] = AuthMenu::menuItem(
            '#',
            'CRM',
            'glyphicon glyphicon-th',
            FHtml::isInArray($controller, $menu),
            [],
            [

                !FHtml::isInArray('crm-client', $menu) ? null : AuthMenu::menuItem(
                    '/crm/crm-client/index',
                    'Clients',
                    'glyphicon glyphicon-book',
                    $controller == 'crm-client',
                    []
                ),
                !FHtml::isInArray('crm-quotation', $menu) ? null : AuthMenu::menuItem(
                    '/crm/crm-quotation/index',
                    'Quotations',
                    'glyphicon glyphicon-book',
                    $controller == 'crm-quotation',
                    []
                ),

            ]
        );
        return $menu;
    }

}
