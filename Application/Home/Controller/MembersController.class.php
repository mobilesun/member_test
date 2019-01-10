<?php
/**
* 会员管理
* by sunruying 
* datetime 20190110
**/
namespace Home\Controller;
use Think\Controller;
class MembersController extends Controller {
	public function _initialize(){
		$this->model = D('Members');
	}
	/**
	* 分组列表
	*
	*/

	public function index(){
    
    	$data = $this->model->select();

        //获取所有分组信息
        $groupInfo = D('MemberGroup')->select();
        $groupInfo = $groupInfo?array_column($groupInfo,'name','id'):[];
    	
        foreach($data as &$d){
            $group_name = $d['group_ids']?array_map(function($v)use($groupInfo){return $groupInfo[$v];},explode(',',$d['group_ids'])):[];
            $d['group_name'] = implode(',',$group_name);
            $d['creattime'] = date('Y-m-d',strtotime($d['creattime']));
            $d['sex'] = $d['sex']==1?'男':'女';
        }
        //var_dump($data);exit;
    	$this->assign('list',$data);
    	$this->display();
    }
	    
    /**
	* 添加
    */
    public function add(){
    	if(IS_POST){
            //var_dump($_POST);exit;
    		$name = trim(I('post.name',''));
    		if(empty($name)) {
    			$this->error('会员姓名不能为空');
    		}
            $certinum = trim(I('post.certinum',''));
            if(empty($certinum)) {
                $this->error('身份证不能为空');
            }
            $creattime  = I('post.creattime');
            if(!preg_match('/^\d{4}-\d{2}-\d{2}$/', $creattime)){
                $this->error('创建时间不能为空或格式不正确');
            }
            $sex = I('post.sex');
            $group_ids = I('post.group_ids',[]);
            $group_ids = implode(',',$group_ids);
    		$remark = I('post.remark','');
    		
    		$data = compact('name','certinum','sex','group_ids','remark','creattime');
    		if($this->model->add($data)){
    			$this->success("操作成功","/index.php?m=home&c=Members&a=index");
    		}else{
                $this->error('操作失败');
            }
    		
    	}else{
            //获取所有分组信息
            $groupInfo = D('MemberGroup')->select();
            $groupInfo = $groupInfo?array_column($groupInfo,'name','id'):[];
            $this->assign('groups',$groupInfo);
    		$this->display();
    	}
    }
    /**
    * 编辑
    */
    public function edit(){
        $id = I('get.id');
    	if(IS_POST){
            //var_dump($_POST);exit;
            $name = trim(I('post.name',''));
            if(empty($name)) {
                $this->error('会员姓名不能为空');
            }
            $certinum = trim(I('post.certinum',''));
            if(empty($certinum)) {
                $this->error('身份证不能为空');
            }
            $creattime  = I('post.creattime');
            if(!preg_match('/^\d{4}-\d{2}-\d{2}$/', $creattime)){
                $this->error('创建时间不能为空或格式不正确');
            }
            $sex = I('post.sex');
            $group_ids = I('post.group_ids',[]);
            $group_ids = implode(',',$group_ids);
            $remark = I('post.remark','');
            
            $data = compact('name','certinum','sex','group_ids','remark','creattime');
            if($this->model->where('id='.$id)->save($data)){
                $this->success("操作成功","/index.php?m=home&c=Members&a=index");
            }else{
                $this->error('操作失败');
            }
            
        }else{
            //获取所有分组信息
            $groupInfo = D('MemberGroup')->select();
            $groupInfo = $groupInfo?array_column($groupInfo,'name','id'):[];
            $data = $this->model->where("id=".$id)->find();
            $this->assign('data',$data);
            //var_dump($data);exit;
            $this->assign('groups',$groupInfo);
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
        //获取所有分组信息
        $groupInfo = D('MemberGroup')->select();
        $groupInfo = $groupInfo?array_column($groupInfo,'name','id'):[];

    	$data = $this->model->where("`id`=$id")->find();
        $group_ids =$data['group_ids']?explode(',',$data['group_ids']):[];
        $group_name = $group_ids?array_map(function($v)use($groupInfo){return $groupInfo[$v];},$group_ids):[];
        $data['group_name'] = implode(',',$group_name);
        $data['creattime'] = date('Y-m-d',strtotime($d['creattime']));
        $data['sex'] = $data['sex']==1?'男':'女';
        $data['group_num']= count($group_ids);
    	//var_dump($data);exit;
    	$this->assign('data',$data);
    	$this->display();
    }
    /**
    *删除
    */
    public function delete(){

    }
}