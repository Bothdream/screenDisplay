<?php
namespace Home\Controller;
use Think\Controller;
class SubcribeController extends Controller {
    /********累计数据展示*******/
    public function index(){
        $model = D('subcribe');
        //取出预约量和成功预约量
        $plan = $model->field('SUM(data) as data')->where(array('type'=>'预约量'))->select();
        $success = $model->field('SUM(data) as data')->where(array('type'=>'成功预约量'))->select();
        $data = $model->field('type,SUM(data) as data')->group('type')->select();
        $var = ((double)$plan[0]['data']/(int)$success[0]['data']*100).'%';
        $data[] = array('type'=>'预约成功率','data'=>$var);
        $this->assign('data',$data);
        $this->display();
    }

    /********按月数据展示*******/
    public function data(){
        $this->display();
    }

    public function datahandle(){
        //存放数据的数组
        $arr = array();
        //获取查询的年份，默认是2017年
        $time = I('post.year')?I('post.year'):2017;
        $where = array('year'=>$time);
        $model = D('subcribe');
        $where['type'] = '计划量';
        $plan = $model->field("month,SUM(data) as data")->where($where)->group('month')->select();
        $arr[] = $plan;
        $where['type'] = '预约量';
        $sub = $model->field("month,SUM(data) as data")->where($where)->group('month')->select();
        $arr[] = $sub;
        $where['type'] = '成功预约量';
        $success = $model->field("month,SUM(data) as data")->where($where)->group('month')->select();
        $arr[] = $success;
        echo json_encode($arr);
    }
}