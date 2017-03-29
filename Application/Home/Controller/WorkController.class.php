<?php
namespace Home\Controller;
use Think\Controller;
class WorkController extends Controller {
    
    public function index(){
        $this->display();
    }

    public function businessstatus(){
        $this->display();
    }
     
     //请求业务数据的处理ajax
    public function businessstatushandel(){
        $model = D('workerdata');
        /*
        $arr = array();
        $field = array(
                 array('status'=>'回访'),
                 array('status'=>'受理'),
                 array('status'=>'专办'),
                 array('status'=>'退办'),
                 array('status'=>'办结'),
                 array('status'=>'办理中')
        );
        foreach ($field as $key => $value) {
            $arr[$value['status']] = $model->where($value)->count();
        }
        $arr= json_encode($arr);
        echo $arr;
        */
       $field = array(
                 array('status'=>'回访'),
                 array('status'=>'受理'),
                 array('status'=>'专办'),
                 array('status'=>'退办'),
                 array('status'=>'办结'),
                 array('status'=>'办理中')
        );
        echo $model->getData($field);

    }

    public function telcounsel(){
          $this->display();
    }
    
    /***************************电话咨询ajax请求数据**************************/
    public function telcounselhandle(){
         // $data = $model->field('worker.wname,workerdata.tnum,workerdata.ttime')->join('worker on workerdata.wid=worker.wid')->where(array('stype'=>'业务咨询类'))->select();
          /*连接+分组+求和*/
          $model = D('workerdata');
          /*
          $data =[];
          $data[] = $model->field('worker.wname as wname,SUM(workerdata.tnum) as num,SUM(workerdata.ttime) as ttime')->join('worker on workerdata.wid=worker.wid')->where(array('stype'=>'业务咨询类'))->group('worker.wname')->select();
          $data[] = $model->field('worker.wname as wname,SUM(workerdata.tnum) as num,SUM(workerdata.ttime) as ttime')->join('worker on workerdata.wid=worker.wid')->where(array('stype'=>'故障申报类'))->group('worker.wname')->select();
          $data[] = $model->field('worker.wname as wname,SUM(workerdata.tnum) as num,SUM(workerdata.ttime) as ttime')->join('worker on workerdata.wid=worker.wid')->where(array('stype'=>'投诉建议类'))->group('worker.wname')->select();
          $data[] = $model->field('worker.wname as wname,SUM(workerdata.tnum) as num,SUM(workerdata.ttime) as ttime')->join('worker on workerdata.wid=worker.wid')->where(array('stype'=>'业务办理类'))->group('worker.wname')->select();
          echo json_encode($data);
          */
          echo $model->getCelData();
          
    }

    public function workdata(){
        $model = D('worker');
        $data = $model->getWorker(12);
        $this->assign('data',$data);
        $this->display();
    }

    public function workerdata(){
        $this->display();
    }
    
    /***************************ajax请求数据**************************/
    public function workerdatahandle(){
         // $data[] = $model->field('worker.wname as wname,SUM(workerdata.tnum) as num')->join('worker on workerdata.wid=worker.wid')->group('worker.wname')->select();
         // $data[] = $model->field('worker.wname as wname,SUM(workerdata.ttime) as ttime')->join('worker on workerdata.wid=worker.wid')->group('worker.wname')->select();
          /*连接+分组+求和*/
          $model = D('workerdata');
          /*
          $data =[];
          $data[] = $model->field('worker.wname as wname,SUM(workerdata.tnum) as num')->join('worker on workerdata.wid=worker.wid')->group('worker.wname')->select();
          $data[] = $model->field('worker.wname as wname,SUM(workerdata.ttime) as ttime')->join('worker on workerdata.wid=worker.wid')->group('worker.wname')->select();
          echo json_encode($data);
          */
         echo $model->getWorkerData();
    }

    /************************显示更多页面aja请求****************************/
    function more(){
        $model = D('worker');
        $data = $model->getWorker('12,6');
        echo json_encode($data);
    }
    
}