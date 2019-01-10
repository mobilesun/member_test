<?php

namespace Home\Model;
use Think\Model;
class MemberGroupModel extends Model {
	/**
	*统计会员数量
	*id 为null 统计分组中所有的会员数 否则统计某个分组的会员数
	*/
	public function getMembersNum($id=null){
		$model = $this->join('left join members on member_group.id IN(members.group_ids)')->field("count(members.id)as nums,member_group.id,member_group.name,member_group.creattime")->group('member_group.id');
		if(!$ids){
			$data = $model->select();
		}else{
			$data = $model->where('`member_group.id`='.$id)->select();
			//$membersModel->field("")
		}
		return $data;
	}
	public function getMembers($id){
		$model = $this->join('right join members on member_group.id IN(members.group_ids)')->field("members.id,members.name,members.creattime,members.sex,members.certinum")->where("member_group.id=".$id);
		$data = $model->select();
		return $data;
	}
}