<?php
namespace Admin\Model;
use Think\Model;
class WorkerModel extends Model
{
	protected $insertFields = array('wname','wid');
	protected $_validate = array(
		array('wname', 'require', '用户名不能为空！', 1, 'regex', 3),
		array('wid', '1,30', '工号最长不能超过 15 个字符！', 1, 'length', 3),
	);
	/*************************插入数据之前**********************************/
	protected function _before_insert(&$data,$option){
       /******上传照片*******/
       $upload = new \Think\Upload();// 实例化上传类
       $upload->maxSize = 1024*1024 ;// 设置附件上传大小
       $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
       $upload->rootPath = './Public/Home/'; // 设置附件上传根目录
       $upload->savePath = 'images/'; // 设置附件上传（子）目录
       // 上传文件 
       $info = $upload->upload();
       if(!$info) {// 上传错误提示错误信息
            $this->error = $upload->getError();
       }else{// 上传成功
            $data['img'] = $info['img']['savepath'].$info['img']['savename'];
       }
	}
}