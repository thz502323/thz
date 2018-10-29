create table sp_doc(
`id` int (11) not null AUTO_INCREMENT,
`title` varchar(50) NOT NULL COMMENT '公文标题',
`filepath` varchar(255) DEFAULT NULL COMMENT '附件存储路径',
`filename` varchar(255) DEFAULT NULL COMMENT '附件名',
`hasfile` smallint(1) DEFAULT '0' COMMENT '是否存在',
`content` text COMMENT '公文内容',
`author` varchar(40) NOT NULL COMMENT '作者',
PRimary key (`id`)
)engine=myisam auto_increment=1 default charset=utf8;