<?php
//申明命名空间
namespace Admin\Model;

//引入父类模型
use Think\Model;

class DeptModel extends Model
{
     //protected $_patchValidate=true;//开启批量验证


     protected $_map=array(
        'qwer'=>'name',
        'wsad'=>'sort'
    );
     //字段映射
     //映射规则 键：表单的name=值：表中的字段名



     protected $_validate=array(
        array('name','require','部门不能为空！'),
        array('name','','部门已经存在',0,'unique'),
        array('sort','is_numeric','必须是数字！',0,'function'),
     );
     //语法 ：验证字段，验证规则，错误提示，可选参数：[验证条件，附加规则，验证时间]
     //验证字段：表单中每一个name值
     //验证规则：对针对的字段要求格式的限制,可以看开发手册
     //验证条件：0字段存在就验证（默认），1必须验证，2字段不为空的时候验证。
     //附加规则：配合验证规则：长度，正则，范围,自定义函数（验证规则是函数名）....可以看开发手册
     //验证时间：1新增数据验证，2编辑的时候验证，3全部清空都要验证

}
