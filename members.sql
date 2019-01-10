
##会员分组表
Drop Table IF EXISTS `member_group`;
Create Table `member_group` (
	`id` int(11) not null  AUTO_INCREMENT comment "自增id",
	`name` char(20) default "" not null comment "名称" ,
	`creattime` datetime default null comment "创建时间",
	`remark` varchar(200) default "" comment "注释",
	PRIMARY key (`id`)
)ENGINE=MyISAM  DEFAULT CHARSET=utf8;

###会员表
Drop Table IF EXISTS `members`;
Create Table `members` (
	`id` int(11) not null  AUTO_INCREMENT comment "自增id",
	`name` char(20) default "" not null comment "会员姓名",
	`sex` tinyint(1) default 1 not null comment "性别：1为男;2为女",
	`certinum` varchar(30) default "" not null comment "身份证号码", 
	`group_ids` varchar(100) default "" comment "所属分组id,用逗号隔开",
	`photos` varchar(200) default "" comment "照片", 
	`creattime` datetime default null comment "添加时间",
	`remark` varchar(200) default "" comment "注释",
	PRIMARY key (`id`),
	unique index `certinum` (`certinum`)
)ENGINE=MyISAM  DEFAULT CHARSET=utf8;
