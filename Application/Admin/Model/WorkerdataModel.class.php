<?php
namespace Admin\Model;
use Think\Model;
class WorkerdataModel extends Model
{
	protected $insertFields = array('wid','tnum','ttime','stype','status');
	protected $_validate = array(
		array('tnum', 'number', '接听电话数量必须为数值类型！', 1,'regex', 3),
		array('ttime', 'number', '接听电话时长必须为数值类型！', 1,'regex', 3),
            array('stype', 'require', '业务类型不能为空！', 1,'regex', 3),
            array('status', 'require', '状态不能为空！', 1,'regex', 3),
	);

	/*******************插入之前**********************/
	protected function before_insert(&$data,$option){
       // 获取当前时间
       $data['date'] = date('Y-m-d H:i:s',time());
	}
	
}