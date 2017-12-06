<?php
/**
 * Created by PhpStorm.
 * User: Quyen_Bui
 * Date: 7/12/2016
 * Time: 3:10 PM
 */

namespace frontend\modules\travel;

use backend\modules\travel\models\TravelAttractions;
use backend\modules\travel\models\TravelPlans;
use backend\modules\travel\models\TravelScores;
use backend\modules\travel\models\TravelSites;
use common\components\FHtml;
use frontend\modules\travel\controllers\TravelController;
use yii\base\Exception;
use yii\helpers\Html;
use yii\base\Controller;
use Yii;
use yii\helpers\HtmlPurifier;
use yii\helpers\StringHelper;
use yii\helpers\Url;
use frontend\components\Helper;

class TravelHelper extends Helper
{
    public static function showItineraryTitle($model) {
        $title = FHtml::getFieldValue($model, ['name', 'title']);
        $title = "<span style='text-transform: capitalize; '>$title</span>";
        $title = str_replace(' in ', '</span><br/> <span style="text-transform: uppercase">  in ', $title);
        return $title;
    }
    public static function buildTutorJsAttribute($data_step, $data_title, $data_intro = '', $condition = true,  $data_position = 'top') {
        if (!$condition)
            return '';

        $result = '';
        $result .= " data-step='$data_step' ";
        $content = empty($data_intro) ? $data_title : "<span style='font-weight:bold;color:darkblue; margin-bottom: 25px'>$data_title</span> <br/><p>$data_intro</p>";
        $content = str_replace('[', '[<span style=\'color:darkblue;font-weight:bold\'>', $content);
        $content = str_replace(']', '</span>]', $content);

        $result .= " data-intro=\"$content\"";
        $result .= " data-position='$data_position'";

        return $result;
    }

    public static function showAttractionLinks($attraction, $startindex = 1, $label = '<h4>As Featured on</h4>')
    {
        if (!isset($attraction) || empty($attraction->getObjectAttributes()))
            return '';
        $attributes = $attraction->getObjectAttributes();

        $result = '';
        $i = $startindex;
        $count = count($attributes);

        if (!empty($label))
            $result = $label;
        foreach ($attributes as $attribute) {
            $result .= '<a href="' . $attribute->meta_value . '" target="_blank">' . $attribute->meta_key . '</a>' . (($startindex < $count) ? ' | ' : '');
            $startindex = $startindex + 1;
        }

        return $result;
    }

    public static function showOpenHours($model, $default = 'Public space', $no_style = false)
    {
        if (!empty($model->description))
            $result = trim($model->description);
        else if (empty($model->open) && empty($model->close))
            $result = $default;
        else
            $result = 'Open: ' . $model->open . ' - ' . $model->close;

        if ($no_style)
            return $result;
        else
            return '<span style="color:gray;">' . $result . '</span>';
    }

    public static function showDefaultDuration($model, $default = '', $no_style = false)
    {
        if (empty($model->default_duration))
            $result = $default;
        else
            $result = self::showDuration($model->default_duration);

        if ($no_style)
            return $result;
        else
            return '<span style="color:gray;">Visit Duration: ' . $result . '</span>';
    }

    public static function showItineraryLinks($itinerary, $displayAttractionName = false, $label = '<h4>As Featured on</h4>')
    {
        if (!isset($itinerary))
            return '';

        $plans = FHtml::getModels('travel_plans', ['user_itinerary_id' => $itinerary->id]);
        $result = '';
        $startindex = 1;

        $trash = [];
        $trash2 = [];
        $list = [];

        foreach ($plans as $plan) {
            if (in_array($plan->attraction_id, $trash))
                continue;

            $trash[] = $plan->attraction_id;

            $attraction = $plan->getAttraction();
            if (!isset($attraction))
                continue;

            $attributes = $attraction->getObjectAttributes();
            if (!isset($attraction) || empty($attributes))
                continue;

            if ($displayAttractionName)
                $result .= '<b style="margin-bottom:10px">' . $attraction->name . '</b><br/>';

            foreach ($attributes as $attribute) {
                if (in_array($attribute->meta_value, $trash2))
                    continue;

                if (strpos(strtolower($attribute->meta_key), 'tripadvisor') > 0 || StringHelper::startsWith(strtolower($attribute->meta_key), 'tripadvisor')) {
                    //$attribute->meta_key .= ' (' . $attraction->name . ')';
                } else {

                    //$result = $result . ' <a href="' . $attribute->meta_value . '" target="_blank">' . $attribute->meta_key . '</a> <br/> ';
                    $list = array_merge($list, [$attribute->meta_key => '<a href="' . $attribute->meta_value . '" target="_blank">' . $attribute->meta_key . '</a>']);
                }
                $trash2[] = $attribute->meta_value;

                $startindex = $startindex + 1;
            }
        }

        ksort($list);
        $i = 0;
        foreach ($list as $key => $value) {
            $i += 1;
            $result .= "<div style='margin-bottom:10px; padding-bottom:10px; border-bottom:dashed 1px lightgrey'> $value </div>";
        }

        if ($startindex > 1 && !empty($label))
            $result = $label . $result;

        return $result;
    }

    public static function get_coordinates_from_model($model, $defaultCountry = 'Malaysia')
    {
        if (isset($model)) {
            if (isset($model->lat) && isset($model->long)) {
                $return = array('lat' => $lat = $model->lat, 'long' => $long = $model->long);
                return $return;
            } else {
                $country = empty($model->country) ? $defaultCountry : $model->country;
                $city = empty($model->city) ? '' : $model->city;
                $province = empty($model->province) ? '' : $model->province;
                $street = empty($model->street) ? '' : $model->street;

                $return = self::get_coordinates($city, $street, $province, $country);
                return $return;
            }
        }
    }

    public static function get_coordinates($city, $street, $province, $country = 'Malaysia')
    {
        $address = urlencode($city . ',' . $street . ',' . $province);
        $url = "http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&region=$country";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);
        curl_close($ch);
        $response_a = json_decode($response);
        $status = $response_a->status;

        if ($status == 'ZERO_RESULTS') {
            return FALSE;
        } else {
            $return = array('lat' => $response_a->results[0]->geometry->location->lat, 'long' => $long = $response_a->results[0]->geometry->location->lng);
            return $return;
        }
    }

    public static function GetDrivingDistance($lat1, $lat2, $long1, $long2)
    {
        if (isset($lat1) && isset($lat2) && isset($long1) && isset($long2)) {
            $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=" . $lat1 . "," . $long1 . "&destinations=" . $lat2 . "," . $long2 . "&mode=driving&language=pl-PL";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            $response = curl_exec($ch);
            curl_close($ch);
            $response_a = json_decode($response, true);
            $dist = $response_a['rows'][0]['elements'][0]['distance']['text'];
            $time = $response_a['rows'][0]['elements'][0]['duration']['text'];
        } else {
            $dist = '';
            $time = '';
        }

        $time = str_replace('godz.', 'hours', $time);

        return array('distance' => $dist, 'time' => $time);
    }

    public static function showDistance($distance, $time)
    {
        if (\yii\helpers\StringHelper::endsWith($distance, ' m'))
            $distance = FHtml::t('common', 'Short walk') . ' / ' . $time;
        else
            $distance = str_replace(',', '.', $distance) . ' / ' . $time;

        return $distance;
    }

    public static function getDistance($plan, $plan2 = null, $sort_order = 0)
    {
        if (!isset($plan))
            return null;


        if (!empty($plan->travel_distance))
            $distance = $plan->travel_distance;

        if (!empty($plan->travel_duration))
            $time = $plan->travel_duration;

        if (isset($time) && strpos($time, 'godz.') !== false) {
            $time = str_replace('godz.', 'hours', $time);
            $plan->save();
        }

        if (empty($distance) || empty($time) || $plan->next_plan_id != $plan2->id || $plan->next_attraction_id != $plan2->attraction_id) {
            $dist = TravelHelper::updateDistance($plan, $plan2, $sort_order);
            $distance = $dist['distance'];
            $time = $dist['time'];
        }

        //Check freetime here
        self::updateFreeTime($plan, $plan2);

        return self::showDistance($distance, $time);
    }

    public function updateFreeTime($plan, $plan2)
    {
        if (isset($plan) && isset($plan2)) {
            $end = self::timeToNumeric(self::getEndTime($plan));
            $start2 = self::timeToNumeric(self::getStartTime($plan2));

            if ($start2 > $end) {
                $plan->free_time = $start2 - $end;
                $plan->save();
            }
        }
    }

    public static function setPlans($plan, $plan2 = null, $sort_order = 0, $changed_plan = null, $log = null)
    {
        if (!isset($plan))
            return '';

        $attraction = $plan->getAttraction();

        if ($sort_order == 0) {
            if (empty($plan->attraction_start)) {
                $plan->attraction_arrived = self::showTime(FHtml::getFieldValue($attraction, 'open', '8:00'));
                $duration = self::timeToNumeric(FHtml::getFieldValue($attraction, 'close', '23:00')) - self::timeToNumeric($plan->attraction_arrived);
                $duration2 = self::timeToNumeric(FHtml::getFieldValue($attraction, 'default_duration', 60));
                if ($duration > $duration2 || $duration < 0)
                    $duration = $duration2;

                $plan->attraction_duration = empty($plan->attraction_duration) ? $duration : $plan->attraction_duration;
                $plan->attraction_start = null;
                $plan->free_time = null;
                $plan->save();
            } else {
                $plan->attraction_arrived = $plan->attraction_start;
                $plan->attraction_duration = empty($plan->attraction_duration) ? FHtml::getFieldValue($attraction, 'default_duration', 60) : $plan->attraction_duration;
                $plan->free_time = null;
                $plan->save();
            }
        }

        if (!isset($plan2)) {
            $plan->next_plan_id = null;
            $plan->next_attraction_id = null;
            $plan->free_time = null;
            $plan->save();
            return '';
        } else {
            $end = self::timeToNumeric(self::getEndTime($plan));
            $start2 = self::timeToNumeric($plan2->attraction_start);
            $attraction2 = $plan2->getAttraction();
            //$time = self::timeToNumeric(self::getStartTime($plan), 8 * 60) + self::timeToNumeric($plan->attraction_duration, 60) + self::timeToNumeric($plan->travel_duration, 15);
            //return $plan->name . ' ' . self::timeToNumeric(self::getStartTime($plan), 8 * 60) . ' (' . self::getStartTime($plan) . ') + Duration: ' . self::timeToNumeric($plan->attraction_duration, 60) . ' + Travel: ' . self::timeToNumeric($plan->travel_duration, 15) . ' (' . $plan->travel_duration . ')';
            //return 'End time of ' .$plan->name . ' ' . self::getEndTime($plan) . '. Starttime: ' . self::getStartTime($plan) . ' Duration: ' . $plan->attraction_duration. '. Total time numeric: ' . $time . '.End: ' . self::showTime($time);
            if ($start2 > $end) {
                $plan2->attraction_arrived = self::showTime($start2);
                $plan->free_time = $start2 - $end;
            } else {

                if ($plan2->is_locked) {
                    if (isset($changed_plan) && $changed_plan->id == $plan2->id)
                        return 'Sorry, the actual arrive time of ' . $attraction2->name . ' should be later than ' . self::showTime($start2);

                    return 'Sorry, the end time of ' . $attraction->name . '(' . self::showTime($end) . ') should be less than ' . self::showTime($start2);
                } else {
                    $plan->free_time = null;
                    $plan2->is_locked = null;
                    $plan2->attraction_arrived = self::showTime($end);
                    $plan2->attraction_start = null;
                }
            }

            $plan2->attraction_duration = empty($plan2->attraction_duration) ? FHtml::getFieldValue($attraction2, 'default_duration', 60) : $plan2->attraction_duration;
            $plan2->save();

            $plan->next_plan_id = $plan2->id;
            $plan->next_attraction_id = $attraction2->id;
            $plan->save();
        }

        return '';
    }

    public static function showFreeTime($plan)
    {
        if (!empty($plan->free_time)) {
            return '<span class="round-border" style="background-color: lightgrey; padding:5px; font-size:80%; color:white"> Free time: ' . self::showTime($plan->free_time, false) . '</span>';
        }
        return '';
    }

    public static function getStartTime($plan, $showText = false)
    {

        $result = self::getStartTimeValue($plan);
        if ($showText)
            return self::showTime($result);
        else
            return $result;
    }

    public static function getStartTimeValue($plan)
    {
        //if (!empty($plan->attraction_start) && $plan->is_locked == 1)
        if (!empty($plan->attraction_start))
            $result = $plan->attraction_start;
        else
            $result = $plan->attraction_arrived;
        //$result = $plan->attraction_arrived;
        return $result;
    }

    public static function showStartTime($plan)
    {
        $result = self::getStartTime($plan); //self::showTime($plan->attraction_start) . ': ' . self::getStartTime($plan);
        if ($plan->is_locked)
            return '<b>' . self::showTime($result) . '</b>';
        else
            return self::showTime($result);
    }

    public static function showLock($plan, $canEdit = true)
    {
        if ($plan->is_locked)
            $text = '<b> <a style="font-size:8pt;margin-left:5px" alt = "Click to unlock from position" href="#" onclick="lockPlan(' . $plan->id . ')"> <i class="fa fa-lock" aria-hidden="true"></i> </a></b>';
        else
            $text = '<a style="font-size:8pt;color:lightgrey;margin-left:5px" alt = "Click to lock in position" href="#" onclick="lockPlan(' . $plan->id . ')"> <i class="fa fa-unlock-alt" aria-hidden="true"></i> </a>';

        if ($canEdit)
            return '<span>' . $text . '</span>';
        else
            return '';
    }

    public static function showTime($time, $show_time = true, $open_time = true, $cleanString = true)
    {
        if (isset($time))
            $time = trim($time);

        if (is_numeric($time)) {
            if (empty($time)) {
                if ($show_time)
                    return '12:00';
                else
                    return '';
            }

            $hour = floor($time / 60);
            $mins = $time - ($hour * 60);
            $am = '';
            $nextday = '';
            if ($show_time) {
//                if ($hour > 12 && $hour < 24) {
//                    $hour = $hour - 12;
//                    $am = 'PM';
//                } else if ($hour == 12) {
//                    $hour = 12;
//                    $am = 'PM';
//                }else if ($hour == 24) {
//                    $hour = 12;
//                    $am = 'AM';
//                } else if ($hour > 24) {
//                    $hour = $hour - 24;
//                    $am = 'PM';
//                } else {
//                    $am = 'AM';
//                }
                if ($hour >= 24) {
                    $hour = $hour - 24;
                    $nextday = '';
                }

                if ($hour < 10)
                    $hour = '0' . $hour;
                if ($mins < 10)
                    $mins = '0' . $mins;
                return $nextday . $hour . ':' . $mins . ' ' . $am;

            } else {
                $am = '';
//                if ($hour < 10)
//                    $hour = '0' . $hour;
//                if ($mins < 10)
//                    $mins = '0' . $mins;

                if ($hour >= 1)
                    $result = $hour;
                else if ($hour == 1)
                    $result = '1';
                else
                    $result = '';

                if ($mins > 0)
                    $result = $result . (empty($result) ? '' : ($result > 1 ? ' hours ' : ' hour ')) . $mins . ' mins';
                else
                    $result = $result . ($result > 1 ? ' hours' : ' hour');

                return $result;
            }

        } else if (is_string($time)) {
            if ($cleanString) {
                $time = preg_replace("/[^:0-9]/", '', $time);
                $time = substr($time, 0, 5);
            }

            return $time;
            //return self::showTime(self::timeToNumeric($time));
        } else {
            return $time;
        }
    }

    public static function showEndTime($plan)
    {
        $time = self::getEndTime($plan);
        return '<b>' . FHtml::t('common', 'End at') . '</b> ' . $time;
    }

    public static function showTravelEditorButton($planid, $field, $canEdit = true)
    {
        if ($canEdit != true)
            return '';

        $result = '<span onMouseOver="this.style.cursor=\'pointer\'" onclick="showEditor(\'' . $planid . '-' . $field . '\')" style="font-size:8pt;color:lightgrey;margin-left:5px" class="glyphicon glyphicon-pencil"></span>';
        return $result;
    }

    public static function createHours($value)
    {
        $result = '';
        $selected = '';
        $result = '<select class="{css}" type="text" style="width:100px; height:30px;padding:5px" id="{id}-{field}" value="{value}">';

        for ($i = 5 * 60; $i < 24 * 60; $i = $i + 15) {
            if ($i == $value || $i == self::timeToNumeric($value))
                $selected = ' selected ';
            else
                $selected = '';
            $result .= '<option value = "' . self::showTime($i) . '"' . $selected . '>' . self::showTime($i) . '</option>';
        }

        $result .= '</select>';
        return $result;
    }

    public static function createDuration($value)
    {
        $result = '';
        $selected = '';
        $result = '<select class="{css}" type="text" style="width:100px; height:30px;padding:5px" id="{id}-{field}" value="{value}">';

        for ($i = 15; $i < 5 * 60; $i = $i + 15) {
            if ($i == $value || $i == self::timeToNumeric($value))
                $selected = ' selected ';
            else
                $selected = '';
            $result .= '<option value = "' . $i . '"' . $selected . '>' . self::showTime($i, false) . '</option>';
        }

        $result .= '</select>';
        return $result;
    }

    public static function createEditor($value, $type = 'text')
    {
        if ($type == 'time')
            return self::createHours($value);
        else if ($type == 'duration')
            return self::createDuration($value);
        else
            return '<input class="{css}" type="text" style="height:30px;padding:5px" id="{id}-{field}" value="{value}" />';
    }

    public static function showEditorForm($id, $field, $value, $css, $canEdit = true, $type = 'text')
    {
        if ($canEdit != true)
            return '';
        $result = '<div class="form input-append {css}" id="{id}-{field}-form" style="display:none">'
            . self::createEditor($value, $type)
            . '<span class="add-on">
              <i data-time-icon="icon-time" data-date-icon="icon-calendar">
              </i>
            </span>
            <input type="submit" class="save btn btn-sm btn-success" value=" Save " onclick="saveEditor(\'{id}\', \'{field}\', $(\'#{id}-{field}\').val())" />
            <input type="submit" class="cancel btn btn-sm btn-default" value=" Cancel " onclick="closeEditor(\'{id}-{field}\')"/>
        </div>';
        $result = str_replace('{id}', $id, $result);
        $result = str_replace('{field}', $field, $result);
        $result = str_replace('{value}', $value, $result);
        $result = str_replace('{css}', $css, $result);

        return $result;
    }

    public static function showEditorForm1($id, $field, $value, $css, $canEdit = true, $type = 'text')
    {
        if ($canEdit != true)
            return '';
        $result = '<div class="form input-append {css}" id="{id}-{field}-form" style="display:none">'
            . self::createEditor($value, $type)
            . '<span class="add-on">
              <i data-time-icon="icon-time" data-date-icon="icon-calendar">
              </i>
            </span>
            <input type="submit" class="save btn btn-sm btn-success" value=" Save " onclick="saveEditor1(\'{id}\', \'{field}\', $(\'#{id}-{field}\').val())" />
            <input type="submit" class="cancel btn btn-sm btn-default" value=" Cancel " onclick="closeEditor(\'{id}-{field}\')"/>
        </div>';
        $result = str_replace('{id}', $id, $result);
        $result = str_replace('{field}', $field, $result);
        $result = str_replace('{value}', $value, $result);
        $result = str_replace('{css}', $css, $result);

        return $result;
    }

    public static function timeToNumeric($time, $default = 0)
    {
        if (empty($time))
            return $default;

        if (is_numeric($time))
            return $time;
        else if (is_string($time)) {
            $time = strtolower($time);
            if (strpos($time, '24 hours') !== false)
                return $default;
            $is_hour = strpos($time, 'h') > 0;
            $is_min = strpos($time, 'min') > 0;

            $time = str_replace('hours', ':', $time);
            $time = str_replace('hour', ':', $time);
            $time = str_replace('hrs', ':', $time);
            $time = str_replace('hr', ':', $time);
            $time = str_replace('h', ':', $time);
            $time = str_replace('minutes', '', $time);
            $time = str_replace('mins', '', $time);
            $time = str_replace('min', '', $time);
            $time = str_replace('am', '', $time);
            $time = str_replace(' ', '', $time);
            $time = preg_replace('/[^:0-9]/', '', $time);
            $time = substr($time, 0, 5);

            $am = 0;
            if (StringHelper::endsWith($time, 'pm')) {
                $time = str_replace('pm', '', $time);
                $am = 12;
                $is_min = false;
            }

            $arr = explode(':', $time);
            if (!is_numeric($arr[0]))
                return $default;

            if (StringHelper::startsWith($arr[0], '0'))
                $arr[0] = substr($arr[0], 1, strlen($arr[0]) - 1);

            if (count($arr) == 2 && StringHelper::startsWith($arr[1], '0'))
                $arr[1] = substr($arr[1], 1, strlen($arr[1]) - 1);

            if (count($arr) == 2) {
                if ($arr[0] == 0 && $arr[1] == 0)
                    return 24 * 60;

                return ($arr[0] + $am) * 60 + $arr[1];
            } else {
                if ($is_min) {
                    return $arr[0];
                } else {
                    return ($am > 0) ? (($arr[0] + $am) * 60) : ($arr[0] * 60);
                }
            }
        }
    }

    public static function getEndTime($plan, $round_value = 15)
    {
        return self::showTime(self::getEndTimeValue($plan, $round_value));
    }

    public static function getEndTimeValue($plan, $round_value = 15)
    {

        $time = self::timeToNumeric(self::getStartTime($plan), 8 * 60) + self::timeToNumeric($plan->attraction_duration, 60) + self::timeToNumeric($plan->travel_duration, 15);
        $d = floor($time / $round_value);
        $t = $time - ($d * $round_value);

        return $d * $round_value + (($t < 1) ? 0 : $round_value);
    }

    public static function showDuration($time)
    {
        if (is_numeric($time)) {
            $hour = floor($time / 60);
            $mins = $time % 60;
            $result = '';
            $result .= empty($hour) ? '' : ($hour . ($hour > 1 ? ' hours ' : ' hour '));
            $result .= empty($mins) ? '' : ($mins . ' mins.');

            return $result;
        } else {
            return $time;
        }
    }

    public static function showImageCredit($description)
    {
        $description = trim($description);
        $description = strip_tags($description);
        $pos = strpos($description, ':');
        if ($pos > 0) {
            $text = substr($description, 0, $pos);
            $link = substr($description, $pos + 1);
            $link = str_replace(' ', '', $link);
            $link = str_replace('<br/>', '', $link);
            $link = str_replace('<br>', '', $link);
            $description = '<a target="_blank" href="' . $link . '">' . $text . '</a>';
        }
        $description = str_replace('...', '', $description);
        $description = str_replace('...', '', $description);

        if (isset($description) && !empty($description) && $description !== '...')
            return FHtml::t('common', 'Image Credit: ') . $description;

        return '';
    }

    public static function checkValidTime($plan1, $attraction1 = null)
    {

        if (empty($plan1->attraction_id))
            return '';

        if (!isset($attraction1))
            $attraction1 = $plan1->getAttraction();

        if (!isset($attraction1))
            return '';

        $arrived = self::timeToNumeric(self::getStartTimeValue($plan1));
        $closed = self::timeToNumeric($attraction1->close, 10000000000);
        $duration = self::timeToNumeric($plan1->attraction_duration);

        $open = self::timeToNumeric($attraction1->open, 0);
        if ($open > $closed || $closed < 5 * 60)
            $closed = $closed + 24 * 60;

        if (($arrived < $open) || ($arrived > $closed)) {
            return 'Sorry, your required time slots this day at ' . $attraction1->name . ', tentative arrival time ' . self::showTime($arrived) . ' clashes with opening/closing times (' . self::showTime($attraction1->open) . ' - ' . self::showTime($attraction1->close) . '). Please try again';
        }
        else if ($arrived + $duration > $closed) {
            return 'Sorry, your required time slots this day at ' . $attraction1->name . ', tentative leave time ' . self::showTime($arrived + $duration) . ' is later than closing times (' . self::showTime($attraction1->close) . '). Please try again';
        } else
            return '';
    }

    public static function checkValidAll($itineraryid, $day, $models = null, $currentPlan = null)
    {
        if (!isset($models)) {
            $models = FHtml::getModels('travel_plans', ['day' => $day, 'user_itinerary_id' => $itineraryid], 'sort_order asc');
            $rollback = true;
        } else {
            $rollback = false;
        }

        if (isset($models) && !empty($models)) {
            if ($rollback)
                $transaction = FHtml::currentDb()->beginTransaction();
            try {
                for ($i = 0; $i < count($models); $i++) {
                    $plan = $models[$i];
                    $plan2 = $i > count($models) - 2 ? null : $models[$i + 1];

                    $result = self::setPlans($plan, $plan2, $i, $currentPlan);
                    if (!empty($result))
                        throw new Exception($result);

                    $result = self::checkValidTime($plan);
                    if (!empty($result))
                        throw new Exception($result);

                }

                if (isset($currentPlan))
                    $currentPlan->save();

                if ($rollback)
                    $transaction->commit();

            } catch (Exception $e) {
                if ($rollback)
                    $transaction->rollback();
                return $e->getMessage();
            }
        }
        return '';
    }

    public static function updateDistance($plan, $plan2 = null, $sort_order = 0)
    {
        if (!isset($plan2)) {
            return self::showEndTime($plan);
        }

        if ($plan->next_plan_id != $plan2->id) //Need update
        {
            $plan->next_attraction_id = $plan2->attraction_id;
            $plan->next_plan_id = $plan2->id;
        }

        $model = isset($plan) ? $plan->getAttraction() : new \backend\models\TravelAttractions();
        $model2 = isset($plan2) ? $plan2->getAttraction() : FHtml::getModel('travel_attraction', '', $plan->next_attraction_id);

        $coordinates1 = self::get_coordinates_from_model($model);
        $coordinates2 = self::get_coordinates_from_model($model2);
        $dist = TravelHelper::GetDrivingDistance($coordinates1['lat'], $coordinates2['lat'], $coordinates1['long'], $coordinates2['long']);

        if (isset($dist) && key_exists('distance', $dist)) {
            $distance = $dist['distance'];
            $time = $dist['time'];

            $plan->travel_by = 'driving';
            $plan->travel_duration = $time;
            $plan->travel_distance = $distance;

            $plan->save();
        }
        return $dist;
    }

    public static function searchSite($travel_site)
    {
        $url = $travel_site->url;
        $html = FHtml::getHtmlDom($url);
        $content = $html->innertext;
        $search = $travel_site->search_element;
        $result = [];
        foreach ($html->find($search) as $e) {
            $item = trim($e->plaintext);
            $item = str_replace(',', '', $item);
            $item = str_replace('<br/>', '', $item);
            $result[] = $item;
        }
        $log = '';

        $attractions = TravelAttractions::findAll(['city' => $travel_site->city]);

        $i = 0;
        foreach ($result as $item) {
            $i = $i + 1;

            foreach ($attractions as $attraction) {
                $percent = 0;

                $similar_chars = similar_text($attraction->name, $item, $percent);
                $text = 'Mentioned text [' . $item . '] and Attraction [#' . $attraction->id . ':' . $attraction->name . '] are ' . round($percent) . '% similar';
                if ($similar_chars > 4 && $percent > 70) {
                    $log .= '<b>' . $text . '</b><br/>';
                    $score = FHtml::getModels('travel_scores', ['attraction_id' => $attraction->id, 'site_id' => $travel_site->id]);
                    if (!isset($score) || empty($score)) {
                        $score = new TravelScores();
                    } else {
                        $score = $score[0];
                    }
                    $score->attraction_id = $attraction->id;
                    $score->site_id = $travel_site->id;
                    $score->is_active = 1; //$travel_site->is_active;
                    $score->weight = $travel_site->weight;
                    $score->rank = $i;
                    $score->score = $score->weight * $score->is_active;
                    $score->created_date = date('Y-m-d');
                    $score->name = $text;

                    if (!$score->save())
                        $log .= 'Errors: ' . implode('; ', $score->getErrors()) . '<br/>';
                } else {
                    $log .= $text . '<br/>';
                }
            }
        }

        $travel_site->search_content = $log;
        $travel_site->search_result = implode('<br/>', $result);
        $travel_site->save();

        foreach ($attractions as $attraction) {
            self::calculatePoints($attraction);
        }
    }

    public static function calculatePoints($attraction, $site_id = 0)
    {
        $attraction_id = $attraction->id;
        $scores = FHtml::getModels('travel_scores', ['attraction_id' => $attraction->id]);
        $result = 0;
        foreach ($scores as $score) {
            if (!empty($score->site_id) && $score->getSite()->is_active)
                $result = $result + $score->score;
        }
        $attraction->score = $result;
        $attraction->save();
    }

    public static function showScore($model) {
        $result = (!empty($model->sort_order) && $model->sort_order < 10) ? '#' . $model->sort_order : '';
        if (empty($result))
            return '';

        if ($model->type == TravelAttractions::TYPE_LOCATION) {
            $result = 'Attraction Rank ' . $result;
            $css = 'primary';
        }
        else if ($model->type == TravelAttractions::TYPE_RESTAURANT) {
            $result = 'Food Rank ' . $result;
            $css = 'warning';
        }
        return "<span class='rounded label label-$css' style='padding-left:10px'> $result </span>";
    }

    public static function getItineraryName($itinerary, $days, $city) {
        if ($days > 1)
            $text = $days . ' days in ' . $city;
        else if ($days == 1)
            $text = $days . ' day in ' . $city;
        else
            $text = 'In ' . $city;

        return (isset($itinerary) && !empty($itinerary->name)) ? $itinerary->name : $text;
    }

    public static function calculatePointsAll($attractions = null, $city = '')
    {
        
        if (!isset($attractions))
            $attractions = FHtml::getModels('travel_attractions', []);
        foreach ($attractions as $attraction)
            self::calculatePoints($attraction);

    }

    public static function searchSite1($travel_site)
    {
        $url = $travel_site->url;
        $html = FHtml::getHtmlDom($url);
        $content = $html->innertext;
        $search = $travel_site->search_element;
        $result = [];
        foreach ($html->find($search) as $e) {
            $result[] = $e->plaintext;
        }
        $i = 0;
        foreach ($result as $item) {
            $i = $i + 1;
            $item = str_replace('KLCC', '', $item);

            //$attraction = FHtml::getModels('travel_attractions', ['like', 'name', $item]);
            //echo $item; echo '<br/>';
            $attraction = TravelAttractions::findOne(['name' => $item]);

            if (!isset($attraction))
                continue;
            if (!empty($attraction) && is_array($attraction))
                $attraction = $attraction[0];
            var_dump($attraction);

            if (isset($attraction)) {
                $score = FHtml::getModels('travel_scores', ['attraction_id' => $attraction->id, 'site_id' => $travel_site->id]);
                echo 'score: ';
                var_dump($score);
                if (!isset($score) || empty($score)) {
                    $score = new TravelScores();
                    //echo 'new score: ';

                } else {
                    $score = $score[0];
                    //echo 'old score: ';
                }
                $score->attraction_id = $attraction->id;
                $score->site_id = $travel_site->id;
                $score->is_active = 1; //$travel_site->is_active;
                $score->weight = $travel_site->weight;
                $score->rank = $i;
                $score->score = $score->weight * $score->is_active;
                $score->created_date = date('Y-m-d');

                if (!$score->save())
                    var_dump($score->getErrors());
            }
        }
        //$travel_site->search_content = $content;
        $travel_site->search_result = implode('<br/>', $result);
        $travel_site->save();
    }

    public static function searchOffers($cities = ['Kuala Lumpur', 'Penang'], $field_label = '<br/><br/><b>{label}</b>: ') {
        $t_destinations = FHtml::loadJsonFromUrl('https://api.touristly.com/api/destinations', 'destinations');
        $result = [];

        foreach ($t_destinations as $item) {
            if ($item['country'] == 'MY' && FHtml::isInArray($item['name'], $cities)) {

                foreach ($item['offer_ids'] as $offer_id) {
                    $t_offer = FHtml::loadJsonFromUrl('https://api.touristly.com/api/offers/' . $offer_id, 'offer');
                    if (!isset($t_offer) && !key_exists('title', $t_offer))
                        continue;
                    $product = FHtml::getModel('product', '', ['name' => FHtml::getFieldValue($t_offer, ['title'])]);
                    if (!isset($product))
                        continue;
                    $skus = FHtml::getFieldValue($t_offer, 'sku_ids');
                    $pickup = '';
                    if (is_array($skus) && !empty($skus)) {
                        $product->promotion_id = implode(',', FHtml::getFieldValue($t_offer, 'sku_ids'));

                        foreach ($skus as $sku) {
                            $t_sku = FHtml::loadJsonFromUrl('https://api.touristly.com/api/sku/' . $sku, 'sku');
                            $is_available = FHtml::getFieldValue($t_sku, 'is_available');
                            $product->price = FHtml::getFieldValue($t_sku, 'value_price_in_cents') * 0.01;

                            if ($is_available == true || $is_available == 1) {
                                break;
                            }
                        }
                    }

                    $product->name = FHtml::getFieldValue($t_offer, ['title']);
                    $product->type = $item['name']; //city

                    $product->code = FHtml::getFieldValue($t_offer, ['id']); //. '; SKU_IDS: ' . implode(',', $t_offer['sku_ids']);
                    $product->overview = FHtml::getFieldValue($t_offer, ['summary']);
                    $product->content = FHtml::getFieldValue($t_offer, ['description']);
                    $product->is_active = FHtml::getFieldValue($t_offer, ['is_available']);
                    $product->is_hot = FHtml::getFieldValue($t_offer, ['is_highlighted']);
                    $product->is_top = FHtml::getFieldValue($t_offer, ['is_published']);

                    $product->image = FHtml::getFieldValue($t_offer, ['image_url']);
                    $product->content .= str_replace('{label}', 'Departure Time', $field_label) . FHtml::getFieldValue($t_offer, ['departure_time']) . ' (' . FHtml::getFieldValue($t_offer, ['departure_time_comments']) . ')';
                    $product->content .= str_replace('{label}', 'Departure Point', $field_label) . FHtml::getFieldValue($t_offer, ['departure_point']);
                    $product->content .= str_replace('{label}', 'Return Details', $field_label) . FHtml::getFieldValue($t_offer, ['return_details']);

                    $product->content .= str_replace('{label}', 'Duration', $field_label) . FHtml::getFieldValue($t_offer, ['duration_in_words']);

                    $product->content .= str_replace('{label}', 'Hightlights', $field_label) . FHtml::getFieldValue($t_offer, ['highlights']);

                    $product->content .= str_replace('{label}', 'Operations', $field_label) . FHtml::getFieldValue($t_offer, ['operates']);

                    $product->content .= str_replace('{label}', 'Voucher', $field_label) . FHtml::getFieldValue($t_offer, ['voucher_requirements']);
                    $product->content .= str_replace('{label}', 'Excerpt', $field_label) . FHtml::getFieldValue($t_offer, ['excerpt']);
                    $product->content .=  str_replace('{label}', 'Inclusions', $field_label) . implode('<br/>', (array) FHtml::getFieldValue($t_offer, ['inclusions']));
                    $product->content .= str_replace('{label}', 'Exclusions', $field_label) . implode('<br/>', (array) FHtml::getFieldValue($t_offer, ['exclusions']));

                    $product->content .= str_replace('{label}', 'Additional Info', $field_label) . implode('<br/>', (array) FHtml::getFieldValue($t_offer, ['additional_info']));
                    $product->save();

                    $result[] = $product;
                }
            }
        }

        return $result;
    }

    public static function showProductLinks($attraction) {
        return ''; // due to Ken's feedback 3/3/2017
        if (!empty($attraction->Product)) {
            $product = $attraction->Product[0];
        } else {
            $city = FHtml::getFieldValue($attraction, 'city');
            $product = FHtml::getModel('product', '', ['type' => $city], [], false);
        }

        if (isset($product)) {
            $price = empty($product->price) ? '' : '$' . $product->price;
            $title = FHtml::t('common', 'Tours for attraction: ' . $attraction->name);
            return "<a href='#' modal-title='$title' modal-type='iframe' modal-size='xl'
                           data-load-url='" . FHtml::createUrl('travel/travel/tour', ['id' => $product->id, 'header' => 'no', 'footer' => 'no']) .
                    "' role='modal-remote' data-toggle='modal' data-target='#modalView'>See Tours $price</a>";
        }
        else
            return '<br/>';
    }
}