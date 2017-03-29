<?php
namespace Home\Controller;
use Think\Controller;
class EnrollController extends Controller {
    
    public function index(){
        $this->display();
    }
    
    public function register(){
        $this->display();
    }

    public function registerhandle(){
        $data = array();
        $model = D('register');
        $person = $model->field('user,SUM(rdata) as rdata')->where(array('usertype'=>'个人用户'))->group('user')->select();
        $data[] = $person;
        $company = $model->field('user,SUM(rdata) as rdata')->where(array('usertype'=>'单位用户'))->group('user')->select();
        $data[] = $company;
        echo json_encode($data);
    }

    public function business(){  
        $this->display();
    }
    
    public function businesshandle(){
        $data = array();
        $model = D('business');
        $driver = $model->field('bcategory,SUM(bdata) as bdata')->where(array('category'=>'驾驶证业务'))->group('bcategory')->select();
        $data[] = $driver;
        $car = $model->field('bcategory,SUM(bdata) as bdata')->where(array('category'=>'机动车业务'))->group('bcategory')->select();
        $data[] = $car;
        $illegal = $model->field('bcategory,SUM(bdata) as bdata')->where(array('category'=>'违法处理业务'))->group('bcategory')->select();
        $data[] = $illegal;
        echo json_encode($data);
    }

    public function feedback(){
        $this->display();
    }

    
}