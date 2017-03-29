<?php
namespace Home\Controller;
use Think\Controller;
class RegionController extends Controller {
    public function region(){
        $xian=$_GET['value'];


       //echo $xian;die;
       // echo U('Map/fulin1','value='.$value);

        $this->assign(array(
            'value' => $xian,
        ));
        $this->display();
    }
    public function get(){
        $xian=$_POST['s'];
        $value=C($xian);
        //var_dump($_POST);
        // echo $value;die;
        echo U('Region/region','value='.$value);

    }
}