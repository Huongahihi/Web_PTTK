<?php
namespace common\widgets\FButton;

use common\widgets\BaseWidget;

class FButton extends BaseWidget
{
    public $btn_label ='';
    public $btn_url ='';
    public function run()
    {
        $this->show_headline =false;

        self::prepareData();

        return $this->render($this->display_type,
            [
                'background_css' => $this->background_css,
                'title' => $this->title,
                'btn_label' => $this->btn_label,
                'btn_url' => $this->btn_url,
                'style' => $this->style
            ]);
    }

    protected function prepareData()
    {
        if (empty($this->display_type))
            $this->display_type = 'button';

        parent::prepareData(); // TODO: Change the autogenerated stub
    }
}

?>