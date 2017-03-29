<?php
namespace Admin\Model;
use Think\Model;
class SubcribeModel extends Model
{   
	//允许插入的字段
	protected $insertFields = array('data','type');
	//字段验证
	protected $_validate = array(
		array('data', 'number', '预约数量必须为数值类型！', 1,'regex', 3),
		array('type', 'require', '业务类型不能为空值！', 1,'regex', 3),
	);

	/*******************插入之前**********************/
	protected function _before_insert(&$data,$option){
       // 获取当前的年份
       $data['year'] = date('Y',strtotime(I('post.date')));
       //获取当前的月份
       $data['month'] = date('m',strtotime(I('post.date')))=='10'?'10':str_replace('0','',date('m',strtotime(I('post.date'))));
	}
	
}