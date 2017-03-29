<?php
namespace Admin\Controller;
use Think\Controller;
class WorkerController extends Controller {
    public function user(){
        if(IS_POST)
        {   
            //var_dump(I('post.'));die;
            $model = D('worker');

            if($model->create(I('post.'), 1))
            {
                // 插入到数据库中
                if($model->add())  // 在add()里又先调用了_before_insert方法
                {   
                    $data = array('wid'=>I('post.wid'),'tnum'=>0,'ttime'=>0,'stype'=>'','status'=>'','date'=>date('Y-m-d H:i:s',time()));
                    //员工信息插入成功以后，继续插入员工工作信息数据
                    $wmodel = D('workerdata');
                    $wmodel->add($data); 
                    // 显示成功信息并等待1秒之后跳转
                    $this->success('操作成功！');
                    exit;
                }
            }
            // 如果走到 这说明上面失败了在这里处理失败的请求
            // 从模型中取出失败的原因
            $error = $model->getError();
            // 由控制器显示错误信息,并在3秒跳回上一个页面
            $this->error($error);
        }
        $this->display();
    }

    /***************判断用户名是否已经存在********************/ 
    public function wnameisExist(){
        $wname['wname'] = trim(I('post.wname'));
        $model = D('worker');
        if($model->where($wname)->count()){
           echo true; 
        }else{
           echo false;
        }
    }
    /***************判断工号是否已经存在********************/ 
    public function widisExist(){
        $wid['wid'] = trim(I('post.wid'));
        $model = D('worker');
        if($model->where($wid)->count()){
           echo true;  
        }else{
           echo false;
        }
    }
    
    /***********************工作数据的录入***********************/
    public function userdata(){
        //员工模型
        $model = D('worker');
        $data = $model->field("wname")->select();
        if(IS_POST)
        {   //员工数据模型
            $wmodel = D('workerdata');       
            if($wmodel->create(I('post.'), 1))
            {
                // 插入到数据库中
                if($wmodel->add())  // 在add()里又先调用了_before_insert方法
                {
                    // 显示成功信息并等待1秒之后跳转
                    $this->success('操作成功！');
                    exit;
                }
            }
            // 如果走到 这说明上面失败了在这里处理失败的请求
            // 从模型中取出失败的原因
            $error = $wmodel->getError();
            // 由控制器显示错误信息,并在3秒跳回上一个页面
            $this->error($error);
        }
        $this->assign('data',$data);
        $this->display();
    }
    /*************根据指定的名字获取用户的工号**************/
   function getWorkerWid(){
        $wname['wname'] = trim(I('post.wname'));
        $model = D('worker');
        $data = $model->field('wid')->where($wname)->select();
        echo json_encode($data);
   }

}