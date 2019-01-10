<?php
/**
* 会员分组表
* by sunruying 
* datetime 20190110
**/
namespace Home\Controller;
use Think\Controller;
//use Home\Model\MemberGroupModel;
class MemberGroupController extends Controller {
	public function _initialize(){
		$this->model = D('MemberGroup');
	}
	/**
	* 分组列表
	*
	*/

	public function index(){
    	//$memberGroupModel = D('MemberGroup');
    	//$data = $memberGroupModel->select();
    	$data = $this->model->getMembersNum();
    	//var_dump($data);exit;
    	$this->assign('list',$data);
    	$this->display();
    }
	    
    /**
	* 添加
    */
    public function add(){
    	if(IS_POST){
    		$name = trim(I('post.name',''));
    		if(empty($name)) {
    			$this->error('会员姓名不能为空');
    		}
    		$remark = I('post.remark','');
    		$creattime  = date('Y-m-d H:i:s');
    		$data = compact('name','remark','creattime');
    		if($this->model->add($data)){
    			$this->success("操作成功","/index.php?m=home&c=MemberGroup&a=index");
    		}else{
    			$this->error("操作失败");
    		}
    		
    	}else{
    		$this->display();
    	}
    }
    /**
    * 编辑
    */
    public function edit(){
    	$id = I('get.id');
    	if(IS_POST){
    		$name = trim(I('post.name',''));
    		if(empty($name)) {
    			$this->error('分组名称不能为空');
    		}
    		$remark = I('post.remark','');
    		//$creattime  = date('Y-m-d H:i:s');
    		$data = compact('name','remark');
    		if($this->model->where('id='.$id)->save($data)){
    			$this->success("操作成功","/index.php?m=home&c=MemberGroup&a=index");
    		}else{
    			$this->error('操作失败');
    		}
    	}else{
    		$data = $this->model->where('id='.$id)->find();
    		$this->assign('data',$data);
    		$this->display();
    	}

    }
    /**
    *详情
    */
    public function detail(){
    	$id = I('get.id');
    	//var_dump($id);
    	if(empty($id)) die('参数错误');
    	$data = $this->model->where("`id`=$id")->find();
    	//var_dump($data);
    	//获取分组下的会员
    	//$membersModel = D("Members")
    	$members = $this->model->getMembers($id);
    	$data['nums'] = $members?count($members):0;
    	//var_dump($members);exit;
    	$this->assign('data',$data);
    	$this->assign('members',$members);
    	$this->display();
    }
    /**
    *删除
    */
    public function delete(){

    }
}