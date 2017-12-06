<?php
/**
 * Created by PhpStorm.
 * User: tongd
 * Date: 2017-07-31
 * Time: 08:53
 */
namespace common\components;

use Yii;
use yii\helpers\ArrayHelper;
use yii\web\UrlRule;

class FUrlManager extends \yii\web\UrlManager
{
    public function createUrl($params)
    {
        $params = (array) $params;
        $anchor = isset($params['#']) ? '#' . $params['#'] : '';

        unset($params['#'], $params[$this->routeParam]);
        unset($params[0]);
        unset($params['code']);
        unset($params['category_id']);

        $route = '';

        if ($this->enablePrettyUrl) {
//            Khi nào lỗi fix trong này
            echo 'ahihi';die;
        } else {
            $url = "?";
            if (!empty($params) && ($query = http_build_query($params)) !== '') {
                $url .= empty($route) ? $query : '&' . $query;
            }

            return $url . $anchor;
        }
    }

    public function createAbsoluteUrl($params, $scheme = null)
    {
        $params = (array)$params;
        $url = $this->createUrl($params);
        if (strpos($url, '://') === false) {
            $url = $this->getHostInfo() . $url;
        }
        if (is_string($scheme) && ($pos = strpos($url, '://')) !== false) {
            $url = $scheme . substr($url, $pos);
        }

        return $url;
    }
}