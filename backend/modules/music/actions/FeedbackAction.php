<?php

namespace backend\modules\music\actions;

use backend\actions\BaseAction;
use backend\modules\app\models\AppUserFeedbackAPI;

class FeedbackAction extends BaseAction
{
    public function run()
    {
        $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : '';
        $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';
        $comment = isset($_REQUEST['comment']) ? $_REQUEST['comment'] : '';

        if (strlen($name) == 0
            || strlen($email) == 0
            || strlen($comment) == 0
        ) {
            $response = array(
                'status' => 'ERROR',
                'data' => array(),
                'message' => 'Missing params'
            );
            return $response;
        }

        $feedback = new AppUserFeedbackAPI();
        $feedback->name = $name;
        $feedback->comment = $comment;
        $feedback->email = $email;
        $feedback->is_active = 1;
        $feedback->created_date = date('Y-m-d H:i:s', time());
        // $feedback->time = time();
        if($feedback->save()){
            $response = array(
                'status' => 'SUCCESS',
                'data' => array(),
                'message' => 'OK'
            );
            return $response;
        }else{
            $response = array(
                'status' => 'ERROR',
                'data' => array(),
                'message' => 'Fail'
            );
            return $response;
        }
    }
}
