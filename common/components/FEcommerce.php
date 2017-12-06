<?php
/**
 * Created by PhpStorm.
 * User: Quyen_Bui
 * Date: 7/12/2016
 * Time: 3:10 PM
 */

namespace common\components;

use backend\models\ObjectCategory;
use backend\modules\app\models\AppUserFeedback;
use backend\modules\ecommerce\models\Product;
use common\components\FHtml;
use yii\helpers\Html;
use yii\base\Controller;
use Yii;
use yii\helpers\Url;


class FEcommerce extends FFrontend
{
    public static function isCartEnabled() {
        return self::getApplicationConfig('ecommerce', true);
    }

    public static function getTotal(){
        $result = '';
        $data = self::getCart();
        FHtml::showPre($data);
        return $result;
    }

    public static function showCartButton() {
        $result = '';
        if (FEcommerce::isCartEnabled()) {
            $total = 0;
            $data = FEcommerce::getCart();
            foreach ($data as $cart) {
                $total += $cart['sl'];
            }

            $result = '
                <a href="'.  FHtml::createUrl('ecommerce/order/viewcart')  . '" class="link-cart" >
                    <?= \frontend\components\FEcommerce::showCartButton() ?>
                <span id="quantity_top"  class="cart-item-count branding " >' . (count($data)>0?count($data):0) . '</span>
                </a>
           ';
        }

        return $result;
    }

    public static function getImageUrl($image, $model_dir = false, $position = false)
    {
        return FHtml::getFileURL($image, $model_dir, $position);
    }

    // Display price with currency
    public static function displayPrice($value)
    {
        return number_format($value);
    }

    public static function checkHiddenField($name, $array)
    {
        foreach ($array as $item) {
            if (strpos($item, '*') == 0) {
                if (strpos($name, trim($item, '*')) !== false) {
                    return true;
                }
            } else {
                if ($name == $item) {
                    return true;
                }
            }
        }

        return false;
    }

    public static function addToCart($id, $sl)
    {
        $session = Yii::$app->session;
        $session->open();
        $cart = $session['cart'];
        if (count($cart) > 0) {
            $check = false;
            $cartTemp = array();
            foreach ($cart as $item) {
                if ($item['id'] == $id) {
                    $check = true;
                    $item['sl'] += $sl;
                }
                $cartTemp[] = $item;
            }
            if ($check) {
                $session['cart'] = $cartTemp;
            } else {
                $item = ['id' => $id, 'sl' => $sl];
                $cart[] = $item;
                $session['cart'] = $cart;
            }
        } else {
            $item = ['id' => $id, 'sl' => $sl];
            $cart[] = $item;
            $session['cart'] = $cart;
        }
    }

    public static function minusCart($id)
    {
        $session = Yii::$app->session;
        $session->open();
        $cart = $session['cart'];
        if (count($cart) > 0) {
            $cartTemp = array();
            foreach ($cart as $item) {
                if ($item['id'] == $id) {
                    if ($item['sl'] == 1) {

                    } else {
                        $item['sl'] = $item['sl'] - 1;
                        $cartTemp[] = $item;
                    }
                } else {
                    $cartTemp[] = $item;
                }
            }
            $session['cart'] = $cartTemp;
        }
    }

    public static function removeCart($id)
    {
        $session = Yii::$app->session;
        $session->open();
        $cart = $session['cart'];
        if (count($cart) > 0) {
            $cartTemp = array();
            foreach ($cart as $item) {
                if (!($item['id'] == $id )) {
                    $cartTemp[] = $item;
                }
            }
            $session['cart'] = $cartTemp;
        }
    }

    public static function getCart()
    {
        $session = Yii::$app->session;
        $session->open();
        if ($session['cart'] == null) {
            return array();
        } else {
            return $session['cart'];
        }
    }

    public static function getOrder()
    {
        $session = Yii::$app->session;
        $session->open();
        if ($session['cart_order'] == null) {
            return null;
        } else {
            return $session['cart_order'];
        }
    }

    public static function setOrder($order)
    {
        $session = Yii::$app->session;
        $session->open();
        $session['cart_order'] = $order;
    }

    public static function getPromotionCode()
    {
        $session = Yii::$app->session;
        $session->open();
        if ($session['cart_promotion_code'] == null) {
            return '';
        } else {
            return $session['cart_promotion_code'];
        }
    }

    public static function setPromotionCode($order)
    {
        $session = Yii::$app->session;
        $session->open();
        $session['cart_promotion_code'] = $order;
    }

    public static function getPromotion()
    {
        $session = Yii::$app->session;
        $session->open();
        if ($session['cart_promotion'] == null) {
            return '';
        } else {
            return $session['cart_promotion'];
        }
    }

    public static function setPromotion($order)
    {
        $session = Yii::$app->session;
        $session->open();
        $session['cart_promotion'] = $order;
    }

    public static function settingGlobalSaleOff($default_value = 0) {
        return FHtml::settingApplication('Sale Off (%)', $default_value, [], 'Ecommerce');
    }

    public static function settingShippingFee($default_value = 0) {
        return FHtml::settingApplication('Shipping Fee', $default_value, [], 'Ecommerce');
    }

    public static function settingShippingEnabled($default_value = false) {
        return FHtml::settingApplication('Shipping Enabled', $default_value, [], 'Ecommerce', FHtml::EDITOR_BOOLEAN);
    }

    public static function settingVATEnabled($default_value = false) {
        return FHtml::settingApplication('VAT Enabled', $default_value, [], 'Ecommerce', FHtml::EDITOR_BOOLEAN);
    }

    public static function getCartData() {
        $data = self::getCart();
        $total = 0; $price = 0;
        $list_product = [];
        $discount = self::settingGlobalSaleOff(0);
        $discount_text = '0%';
        $vat = self::settingGlobalSaleOff();
        $shipping = self::settingShippingFee();
        $promotion_code = self::getPromotionCode();
        $promotion = self::getPromotion();

        $description = [];

        foreach ($data as $cart) {
            $product = Product::find()->where('id=' . $cart['id'])->one();
            if (!isset($product))
                continue;
            /* @var Product $product */
            $total += $cart['sl'];

            $price += $cart['sl'] * $product->price;
            $list_product[] = array(
                'id' => $cart['id'],
                'thumnail' => $product->thumbnail,
                'image' => $product->image,
                'quantity' => $cart['sl'],
                'price' => $product->price,
                'name' => $product->name,
                'overview' => $product->overview
            );
            $description[] = $product->name . ' [' . $product->code . ']';
        }

        if (isset($promotion) && is_object($promotion)) // Promotion code valid        {
        {
            if ($promotion->discount_type == 'percent' && $promotion->discount > 0)
            {
                $discount = $promotion->discount;
                $discount = $discount/100 * $price;
                $discount_text = FHtml::showPercentage($discount);
            } else if ($promotion->discount_type == 'price_off' && $promotion->discount > 0)
            {
                $discount = $promotion->discount;
                $discount_text = FHtml::showCurrency($discount);
            }
        }

        $total_price = ($price - $discount) * (1 + $vat/100) + $shipping;
        return [
            'total' => $total,
            'price' => $price,
            'data' => $list_product,
            'discount' => $discount,
            'discount_text' => $discount_text,
            'description' => implode('; ', $description),
            'vat' => $vat, 'vat_type' => '',
            'total_price' => $total_price,
            'promotion_code' => $promotion_code,
            'shipping' => $shipping
        ];
    }

    public static function checkoutPaypal($data = []) {
        if (empty($data))
            $data = FEcommerce::getCartData();

        $products = $data['data'];
        $quantity = $data['total'];
        $total_price = $data['total_price'];
        $description = '';

        foreach ($products as $product) {
            $description .= $product['name'] . ' #' . $product['id'] . '. ';
        }

        $paymentInfo['Order']['theTotal'] = $total_price;
        $paymentInfo['Order']['description'] = $description;
        $paymentInfo['Order']['quantity'] = $quantity;
        // call paypal
        //$result = Yii::$app->Paypal->SetExpressCheckout($paymentInfo);
        $result = \Yii::$app->Paypal->SetRecurringPayment($paymentInfo);
        //Detect Errors
        if (!\Yii::$app->Paypal->isCallSucceeded($result)) {
            if (\Yii::$app->Paypal->apiLive === true) {
                //Live mode basic error message
                $error = FHtml::t('common', 'Paypal configuration is invalid. We could not proceed your reuest !');
            } else {
                //Sandbox output the actual error message to dive in.
                $error = $result['L_LONGMESSAGE0'];
            }
            return $error;
        } else {
            // send user to paypal
            $token = urldecode($result["TOKEN"]);
            $payPalURL = \Yii::$app->Paypal->paypalUrl . $token;
            Yii::$app->getResponse()->redirect($payPalURL);
        }
    }

    public static function isEmptyCart() {
        return empty(self::getCart());
    }

    public static function getMember()
    {
        $session = Yii::$app->session;
        $session->open();
        if ($session['member'] == null) {
            return array();
        } else {
            return $session['member'];
        }
    }

    public static function clearCart()
    {
        $session = Yii::$app->session;
        $session->open();
        $session['cart'] = array();
        $session['cart_order'] = null;
    }

    public static function setToken($token)
    {
        $session = Yii::$app->session;
        $session->open();
        $session['token'] = $token;
    }

    public static function sendMessageToUser($comment = '', $response = '', $app_user_id = '', $object_id = '', $object_type = '') {
        $model = new AppUserFeedback();
        $model->created_user = FHtml::currentUserId();
        $model->created_date = date('Y-m-d');
        $model->object_type = $object_type;
        $model->object_id = $object_id;
        $model->user_id = $app_user_id;
        $model->comment = $comment;
        $model->response = $response;

        $model->save();
    }
}