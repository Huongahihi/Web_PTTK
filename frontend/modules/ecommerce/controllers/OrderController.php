<?php

namespace frontend\modules\ecommerce\controllers;

use backend\models\Category;
use backend\models\ObjectCategory;
use backend\modules\ecommerce\models\EcommerceOrder;
use backend\modules\ecommerce\models\EcommerceOrderItem;
use backend\modules\ecommerce\models\Product;
use backend\modules\ecommerce\models\Products;
use common\components\FEmail;
use frontend\components\FEcommerce;
use frontend\components\FrontendController;
use yii\base\Exception;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;
use common\components\FHtml;


class OrderController extends FrontendController
{
    public function actionViewcart()
    {
        $action = FHtml::getRequestParam('action');
        if ($action == 'clear')
            FEcommerce::clearCart();

        return $this->render('view', [
        ]);
    }
    public function actionBraintree()
    {
        $params = array(
            "testmode" => "on",
            "merchantid" => "8yr78c6tqj5q5rrx",
            "publickey" => "2c52bt22qr4dzxxp",
            "privatekey" => "560bdf1e60a79393c7d26554e107db15",
        );

        if ($params['testmode'] == "on") {
            \Braintree_Configuration::environment('sandbox');
        } else {
            \Braintree_Configuration::environment('production');
        }

        \Braintree_Configuration::merchantId($params["merchantid"]);
        \Braintree_Configuration::publicKey($params["publickey"]);
        \Braintree_Configuration::privateKey($params["privatekey"]);
        $cardholder =$_POST['cardholder'];
        $card_number = $_POST['cardnumber'];
        $cvv = $_POST['cvv'];
        $mm=$_POST['mm'];
        $yy=$_POST['yy'];
        $result = \Braintree_Customer::create(array(
            'creditCard' => array(
                'number' => $card_number,
                'cardholderName' => $cardholder,
                'expirationMonth' => $mm,
                'expirationYear' => $yy,
                'cvv' => $cvv,
                'billingAddress' => array(
                )
            )
        ));

        if (isset($_POST['make_payment'])) {
            // Customer details
            if ($result->success) {
                // Save this Braintree_cust_id in DB and use for future transactions too
                $braintree_cust_id = $result->customer->id;
            } else {
                $this->redirect(array('ecommerce/order/braintree','error'=>"Error : " . $result->message));
                //die("Error : " . $result->message);
            }
            echo "<pre>";
            print_r($result); exit;
            // EOF Create customer in braintree Vault

            $sale = array(
                'customerId' => $braintree_cust_id,
                'amount' => $_POST['amount'],
                'orderId' => $_POST['invoiceid'],
                'options' => array('submitForSettlement' => true)
            );

            $result = Braintree_Transaction::sale($sale);

            if ($result->success) {
                // Execute on payment success event at here
            } else {
                //$this->redirect('site/braintree',array('error'=>"Error : " . $result->message));
                echo "Error : " . $result->_attributes['message'];
            }
            FEcommerce::clearCart();
            //$this->redirect(array('order/order', 'msg' => $msg));

        } else
            if (isset($_POST['braintree_cust_id'])) {

                $sale = array(
                    'customerId' => $result->customer->id,
                    'amount' => $_POST['amount'],
                    'orderId' => $_POST['invoiceid'],  // This field is get back in responce to track this transaction
                    'options' => array('submitForSettlement' => true)
                );
            }
    }

    public function actionBill(){
        return $this->render('bill', [
        ]);
    }

    public function actionCheckout() {
        return $this->render('checkout', [
        ]);
    }

    public function actionInvoice(){
        return $this->render('invoice', [
        ]);
    }

    public  function actionCheckcode(){
        $code= FHtml::getRequestParam('code');
        $promotion = FHtml::getModel('promotion', '', ['code' => $code], null, false);
        if (isset($promotion)) {

            if ($promotion->is_active !== 1)
            {
                return FHtml::t('common', 'Locked Coupon');
            } else if (isset($promotion->end_date) && $promotion->end_date < date('Y-m-d')) {
                return FHtml::t('common', 'Expired Coupon');
            }
            FEcommerce::setPromotionCode($code);
            FEcommerce::setPromotion($promotion);
            return '';
        }

        FEcommerce::setPromotionCode('');
        FEcommerce::setPromotion(null);

        return FHtml::t('common', 'Voucher Code Invalid') . '. ' . FHtml::t('common', 'Please check your voucher code again');
    }

    public function actionComplete(){
        $cart = FEcommerce::getCartData();
        $model = $cart['data'];

        return $this->render('complete', [

        ]);
    }

    public function actionOrder()
    {
        try {
            $firstname = FHtml::getRequestParam(['name', 'firstname']);
            $lastname = FHtml::getRequestParam('lastname');
            $email = FHtml::getRequestParam('email');
            $phone = FHtml::getRequestParam('phone');
            $address = FHtml::getRequestParam('address');
            $country = FHtml::getRequestParam('country');
            $city = FHtml::getRequestParam('city');
            $zip = FHtml::getRequestParam('zip');

            if (empty($address) && empty($phone) && empty($email)) {
                throw new \yii\db\Exception(FHtml::t('common', 'Please give us either Email, Phone or Address so that we can confirm with you later. Many thanks. '));
            }

            if (empty($name))
                $name = 'Guest ' . FHtml::time();

            $session = \Yii::$app->session;
            $cart = FEcommerce::getCart();
            $cartData = FEcommerce::getCartData();

            $order = FEcommerce::getOrder();
            if (!isset($order) || empty($order))
                $order = new EcommerceOrder();

            $order->billing_name = trim($firstname . ' ' . $lastname);
            $order->billing_phone = $phone;
            $order->billing_address = $address;
            $order->billing_email = $email;


            if (empty($order->billing_address))
                $order->billing_address = '';

            $order->billing_city = $city;
            $order->billing_country = $country;
            $order->billing_postcode = $zip;
            $order->price_tax = $cartData['vat'];
            if (!isset($order->price_tax) || empty($order->price_tax)) $order->price_tax = 0;
            $order->price_discount = $cartData['discount'];
            if (!isset($order->price_discount) || empty($order->price_discount)) $order->price_discount = 0;
            $order->price_total = $cartData['price'];
            if (!isset($order->price_total) || empty($order->price_total)) $order->price_total = 0;
            $order->price_final = $cartData['total_price'];
            if (!isset($order->price_final) || empty($order->price_final)) $order->price_final = 0;
            $order->price_shipping = $cartData['shipping'];
            if (!isset($order->price_shipping) || empty($order->price_shipping)) $order->price_shipping = 0;

            $order->promotion_code = $cartData['promotion_code'];
            $order->tax = $cartData['vat_type'];

            $data_product_item = array();
            foreach ($cart as $val) {
                $product = Product::find()->select(['name', 'price', 'overview'])->where(['id' => FHtml::getFieldValue($val, ['id'])])->one();

                $data_product_item[] = [
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => $val['sl']
                ];
                if (!isset($product))
                    continue;
            }

            $order->is_active = \Globals::STATE_ACTIVE;
            $order->order_detail = FHtml::encode($data_product_item);
            $order->save();

            FEcommerce::setOrder($order);

            if (count($order->getErrors()) > 0)
                throw new Exception(FHtml::encode($order->getErrors()));

            $this->sendEmailToAdmin();

            $this->redirect(FHtml::createUrl('ecommerce/order/checkout'));

        } catch (Exception $e) {
            $this->redirect(FHtml::createUrl('ecommerce/order/bill', ['message' => $e->getMessage()]));
        }
    }


    public function sendEmailToAdmin()
    {
        $cart = FEcommerce::getCart();
        $cartData = FEcommerce::getCartData();

        $order = FEcommerce::getOrder();
        if (isset($order)) {
            $client_name = $order->billing_name;
            $client_email = $order->billing_email;
            $title = 'Purchase Order #' . $order->id . ' on ' . FHtml::showDate(FHtml::Today());
            $price = FHtml::showPrice($order->price_final);
            $promotion = $order->promotion_code;
            return FEmail::sendEmailFromAdmin($client_email, $client_name, FEmail::MAIL_ORDER,
                [
                    'name' => $client_name,
                    'email' => $client_email,
                    'title' => $title,
                    'items' => FHtml::showJsonAsTable($order->order_detail),
                    'promotion' => $promotion,
                    'final price' => $price
                ], 'message', 'html');
        }
    }

}