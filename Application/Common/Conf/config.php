<?php
return array(
	//'配置项'=>'配置值'

    //模板常量
    'TMPL_PARSE_STRING'=>array(
        '__ADMIN__'=>__ROOT__.'/Public/Admin'
        ),

     /* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'db_oa',          // 数据库名
    'DB_USER'               =>  'thz',      // 用户名
    'DB_PWD'                =>  'Thz.502323',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'sp_',    // 数据库表前缀
    'SHOW_PAGE_TRACE'       =>   ture,   //默认false关闭
    'LOAD_EXT_FILE'         =>  'info',//包含文件名的字符串，多个文件名由“,”隔开

    //RBAC权限数据信息
    //角色数组
    'RBAC_ROLES'  => array(
                 1 => '高层领导',
                 2 => '中层管理',
                 3 => '普通职员'
        ),

    //权限数组
    'RBAC_ROLE_AUTHS' =>array(
                 1 => '*/*' ,//全部权限
                 2 => array('index/*','email/*','doc/*','konwledge/*'),
                 3 => array('index/*','email/*','konwledge/*','doc/add')
         )

);