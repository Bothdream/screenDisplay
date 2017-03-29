<?php
namespace Home\Model;
use Think\Model;
class WorkerModel extends Model
{   
	/**************获取员工的基本信息*******************/
	function getWorker($limit){
	   //连表+人员分组(总的个数和时间)	
       $data = $this->field('worker.wname,worker.wid,worker.img,SUM(workerdata.tnum) as num,SUM(workerdata.ttime) as time')->join('workerdata on workerdata.wid=worker.wid')->group('worker.wname,worker.wid,worker.img')->limit($limit)->select();
       return $data;
	}
}