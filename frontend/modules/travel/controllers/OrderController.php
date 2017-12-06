<?php
namespace frontend\modules\travel\controllers;

use backend\models\Category;
use backend\models\ObjectCategory;
use backend\modules\ecommerce\models\EcommerceOrder;
use backend\modules\ecommerce\models\EcommerceOrderItem;
use backend\modules\ecommerce\models\Product;
use backend\modules\ecommerce\models\Products;
use frontend\components\FEcommerce;
use frontend\components\FrontendController;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;
use common\components\FHtml;

class OrderController extends FrontendController
{
    public function actionViewcart()
    {

        return $this->render('view', [
        ]);
    }

    public function actionCheckout()
    {
        return $this->render('view', [
            'pageview' => '_view_checkout'
        ]);
    }
    function actionComplete(){
        FEcommerce::clearCart();
        return $this->redirect(FHtml::createUrl('site/index'));
    }
    function actionBraintree()
    {
        return $this->render('bill',[]);
    }

    public function actionOrder()

    {
        $session = \Yii::$app->session;
        $cart = $session['cart'];
        if (isset($_POST['firstname']) && $_POST['firstname'] != '') {
            $firstname = $_POST['firstname'];
            if (isset($_POST['lastname']) && $_POST['lastname'] != '') {
                $lastname = $_POST['lastname'];
                if (isset($_POST['email']) && $_POST['email'] != '') {
                    $email = $_POST['email'];
                    if (isset($_POST['phone']) && $_POST['phone'] != '') {
                        $phone = $_POST['phone'];
                        if (isset($_POST['address']) && $_POST['address'] != '') {
                            $address = $_POST['address'];
                            if (isset($_POST['country']) && $_POST['country'] != '') {
                                $country = $_POST['country'];
                                if (isset($_POST['city']) && $_POST['city'] != '') {
                                    $city = $_POST['city'];
                                    if (isset($_POST['zip']) && $_POST['zip'] != '') {
                                        $zip = $_POST['zip'];
                                        if (isset($_REQUEST['leader'])) {
                                            $leader = $_REQUEST['leader'];
                                            if (isset($_REQUEST['firstname_adult_travel'])) {
                                                $firstname_adult_travel = $_REQUEST['firstname_adult_travel'];
                                                if (isset($_REQUEST['lastname_adult_travel'])) {
                                                    $lastname_adult_travel = $_REQUEST['lastname_adult_travel'];
                                                    if (isset($_REQUEST['firstname_frant_travel'])) {
                                                        $firstname_frant_travel = $_REQUEST['firstname_frant_travel'];
                                                        if (isset($_REQUEST['lastname_frant_travel'])) {
                                                            $lastname_frant_travel = $_REQUEST['lastname_frant_travel'];
                                                            $data = array();
                                                            for ($i=0;$i<count($firstname_adult_travel);$i++){
                                                                $item=array(
                                                                    "firstname"=>$firstname_adult_travel[$i],
                                                                );
                                                                for ($j=0;$j<count($lastname_adult_travel);$j++){
                                                                    if($i==$j){
                                                                        $item['lastname']=$lastname_adult_travel[$j];
                                                                       $item["type"]="adult";
                                                                    }
                                                                }
                                                                if($i==$leader){
                                                                    $item['leader']=1;
                                                                }
                                                                else{
                                                                    $item['leader']=0;
                                                                }
                                                                $data[]=$item;
                                                            }
                                                            for ($i=0;$i<count($firstname_frant_travel);$i++){
                                                                $item=array(
                                                                    "firstname"=>$firstname_frant_travel[$i],
                                                                );
                                                                for ($j=0;$j<count($lastname_frant_travel);$j++){
                                                                    if($i==$j){
                                                                        $item['lastname']=$lastname_frant_travel[$j];
                                                                        $item["type"]="frant";
                                                                        $item['leader']=0;
                                                                    }
                                                                }
                                                                $data[]=$item;
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                        $order = new EcommerceOrder();
                                        $order->billing_name = $firstname . $lastname;
                                        $order->billing_phone = $phone;
                                        $order->billing_address = $address;
                                        $order->billing_city = $city;
                                        $order->billing_country = $country;
                                        $order->billing_postcode = $zip;
                                        $order->billing_email = $email;

                                        $order->save();
                                        $id = $order->id;

                                        foreach ($cart as $val) {
                                            $product = Product::find()->where('id=' . $val['id'])->one();
                                            $orderItem = new EcommerceOrderItem();
                                            $orderItem->name= $firstname . $lastname;
                                            $orderItem->order_id = $id;
                                            $orderItem->product_id = $val['id'];
                                            if(isset($data) && count($data)>0){
                                                $orderItem->note=json_encode($data);
                                            }
                                            $orderItem->quantity = $val['sl'];
                                            $orderItem->price = $product->price;
                                            $orderItem->total= $val['sl']*$product->price;
                                            $orderItem->save();
                                            $result = count($orderItem->save());
                                        }

                                        if($order->save() && $result == 1){
                                            return $this->render('bill', [
                                            ]);
                                        }

                                    }
                                }

                            }
                        }


                    }
                }

            }
        }
    }

}