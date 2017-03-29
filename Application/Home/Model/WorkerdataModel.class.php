<?php
namespace Home\Model;
use Think\Model;
class WorkerdataModel extends Model
{   
	/***************获得业务受理状态的函数**************/
	function getData($field){
		$arr = array();
        foreach ($field as $key => $value) {
            $arr[$value['status']] = $this->where($value)->count();
        }
        return json_encode($arr);
	}

	/*******************获得电话咨询的业务数据*********************/
    function getCelData(){
    	 $data =[];
         $data[] = $this->field('worker.wname as wname,SUM(workerdata.tnum) as num,SUM(workerdata.ttime) as ttime')->join('worker on workerdata.wid=worker.wid')->where(array('stype'=>'业务咨询类'))->group('worker.wname')->select();
         $data[] = $this->field('worker.wname as wname,SUM(workerdata.tnum) as num,SUM(workerdata.ttime) as ttime')->join('worker on workerdata.wid=worker.wid')->where(array('stype'=>'故障申报类'))->group('worker.wname')->select();
         $data[] = $this->field('worker.wname as wname,SUM(workerdata.tnum) as num,SUM(workerdata.ttime) as ttime')->join('worker on workerdata.wid=worker.wid')->where(array('stype'=>'投诉建议类'))->group('worker.wname')->select();
         $data[] = $this->field('worker.wname as wname,SUM(workerdata.tnum) as num,SUM(workerdata.ttime) as ttime')->join('worker on workerdata.wid=worker.wid')->where(array('stype'=>'业务办理类'))->group('worker.wname')->select();
         return json_encode($data);
    }
    
    /************************获取员工的通话时长和接听电话的数量*****************************/
    function getWorkerData(){
         $data =[];
         $data[] = $this->field('worker.wname as wname,SUM(workerdata.tnum) as num')->join('worker on workerdata.wid=worker.wid')->group('worker.wname')->select();
         $data[] = $this->field('worker.wname as wname,SUM(workerdata.ttime) as ttime')->join('worker on workerdata.wid=worker.wid')->group('worker.wname')->select();
         return json_encode($data);
    }
}