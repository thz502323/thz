<?php
namespace Admin\Controller;
use Think\Controller;

//防止翻墙
class CommonController extends Controller{

    public function __construct(){
        parent::__construct();//需要构造父类才能调用祖父的方法（如display()方法）
        //_initialize():由thinkphp提供的构造方法 不需要构造父类即可使用
        //if(empty(session('id')))empty不能使用函数的返回值作为值来判断
        $id=session('id');
        if(empty($id)){
            //判断登陆，没有则跳转到登陆页面
            /*$this-> error('你没有登陆，请先登陆...',U('Public/login'),3);
            exit;//需要关闭服务防止代码在后台继续执行*/
            //使用js代码解决
            $url=U('Public/login');
            echo "<script>top.location.href='$url'</script>";exit;
        }

        //RBAC
        $role_id = session('role_id');//获取当前用户角色id
        $rbac_role_auths=C('RBAC_ROLE_AUTHS');//获取全部用户组权限
        $currRoleAuth=$rbac_role_auths[$role_id];//获取当前用户的对应权限

        //使用常量获得当前路由中的控制器名和方法名
        $controller = strtolower(CONTROLLER_NAME);
        $action=strtolower(ACTION_NAME);

        //判断权限是否具有
        if($role_id>1){//用户不为超级管理员
            if (!in_array($controller . '/' .$action,$currRoleAuth)&&!in_array($controller . '/*' , $currRoleAuth)) {
                $this->error('你没有相关权限',U('index/home'),3);exit;
            }
        }
    }
}