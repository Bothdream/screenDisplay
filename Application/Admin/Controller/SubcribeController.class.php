<?php
namespace Admin\Controller;
use Think\Controller;
class SubcribeController extends Controller {
    public function subcribe(){
        if(IS_POST)
        {   
            //var_dump(I('post.'));die;
            $model = D('subcribe');

            if($model->create(I('post.'), 1))
            {
                // 插入到数据库中
                if($model->add())  // 在add()里又先调用了_before_insert方法
                {    
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
}