<?php
namespace frontend\modules\travel\controllers;

use backend\modules\ecommerce\models\Product;
use frontend\components\FEcommerce;
use frontend\components\FrontendController;

/**
 * Cart controller
 */
class CartController extends FrontendController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'ruleConfig' => [
                    'class' => \yii\filters\AccessRule::className(),
                ],
                'only' => ['create', 'update', 'delete', 'view', 'index'],
                'rules' => [
                    [
                        'actions' => ['view', 'index', 'create', 'update', 'attraction'],
                        'allow' => true,
                    ],
                ],
            ],
        ];
    }


    public $defaultAction = 'index';

    public function actionIndex($page = false, $keyword = false, $category_id = false, $id = false)
    {
        if (empty($id))
            return $this->render('list', []);
        else
            return $this->render('view', []);
    }

    public function actionTest()
    {
        echo "<pre>";
        if (isset($_REQUEST['firstname_adult_travel'])) {
            var_dump($_REQUEST['firstname_adult_travel']);
            die;
        }
    }

    public function actionRemove()
    {
        if (isset($_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            FEcommerce::removeCart($id);
            $session = \Yii::$app->session;
            $session->open();
            $cart = $session['cart'];
            $total = 0;
            $total_price = 0;
            $cart = $session['cart'];
            if (count($cart) > 0) {
                $cartTemp = array();
                foreach ($cart as $item) {
                    $product = Product::find()->where('id=' . $item['id'])->one();
                    if (count($product) > 0) {
                        $total_price = $total_price + $item['sl'] * $product->price;
                    }
                }
                $total = count($cart);
            }
            echo 'success' . '^' . $total_price . '^' . $total;
        } else {
            echo 'fail';
        }
    }

    public function actionChangequantity()
    {
        if (isset($_REQUEST['id'])) {
            $session = \Yii::$app->session;
            $cart = $session['cart'];
            $id = $_REQUEST['id'];
            $sl = $_REQUEST['sl'];
            if ($sl == '') {
                echo 'fail';
            } else {
                if ($sl > 0) {
                    $cartTemp = array();

                    foreach ($cart as $row) {
                        if ($row['id'] == $id) {
                            $row['sl'] = $sl;
                        }
                        $cartTemp[] = $row;
                    }
                    $session['cart'] = $cartTemp;
                    $total = 0;
                    $price = 0;
                    $total_price = 0;
                    $cart = $session['cart'];
                    if (count($cart) > 0) {
                        $cartTemp = array();
                        foreach ($cart as $item) {
                            $total += $item['sl'];
                            $product = Product::find()->where('id=' . $item['id'])->one();
                            if (count($product) > 0) {
                                if ($item['id'] == $id) {
                                    $price = $item['sl'] * $product->price;
                                }

                                $total_price = $total_price + $item['sl'] * $product->price;
                            }
                        }
                    }
                    echo 'success' . '^' . count($cart) . '^' . $total_price . '^' . $price;
                    //echo Cart::returnHTML($id);
                } else {
                    FEcommerce::removeCart($id);
                    echo "remove";
                }

            }
        } else {
            echo 'fail';
        }
    }

    public function actionCart()
    {
        $data = '';
        if (isset($_REQUEST['id']) && isset($_REQUEST['sl']) && isset($_REQUEST['action'])) {
            if ($_REQUEST['action'] == 'add') {
                FEcommerce::addToCart($_REQUEST['id'], $_REQUEST['sl']);
            } else {
                if ($_REQUEST['action'] == 'minus') {
                    FEcommerce::minusCart($_REQUEST['id']);
                } else {
                    if ($_REQUEST['action'] == 'remove') {
                        FEcommerce::removeCart($_REQUEST['id']);
                    }
                }
            }
            $session = \Yii::$app->session;
            $session->open();
            $cart = $session['cart'];
            $total = 0;
            $price = 0;
            $total_price = 0;
            $cart = $session['cart'];
            if (count($cart) > 0) {
                $cartTemp = array();
                foreach ($cart as $item) {
                    $product = Product::find()->where('id=' . $item['id'])->one();
                    if (count($product) > 0) {
                        if($item['id']==$_REQUEST['id']){
                            $price = $item['sl'] * $product->price;
                        }
                        $total_price = $total_price + $item['sl'] * $product->price;
                    }
                }
                $total = count($cart);
            }
            echo 'success' . '^' . $total_price . '^' . $total . '^' . $price;
        } else {
            echo 'fail';
        }
    }

    public function actionMember()
    {
        $session = \Yii::$app->session;
        $session->open();
        $member = $session['member'];
        if ($_REQUEST['member'] == 'child') {
            $sl = $_REQUEST['sl'];
            if (count($member) > 0) {
                $member_item = array();
                foreach ($member as $row) {
                    $row['child'] = $sl;
                    $member_item = $row;
                }
                $member[0] = $member_item;
            } else {
                $item = ["adult" => 0, 'child' => $sl];
                $member[0] = $item;

            }
            $session['member'] = array();
            $session['member'] = $member;
            echo 'success';
        } else {
            $sl = $_REQUEST['sl'];
            if (count($member) > 0) {
                $member_item = array();
                foreach ($member as $row) {
                    $row['adult'] = $sl;
                    $member_item = $row;
                }
                $member[0] = $member_item;
            } else {
                $item = ["adult" => $sl, 'child' => 0];
                $member[0] = $item;
            }
            $session['member'] = array();
            $session['member'] = $member;
            echo 'success';
        }
    }
}


