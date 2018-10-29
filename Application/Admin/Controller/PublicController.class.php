<?php
namespace Admin\Controller;

use Think\Controller;

class PublicController extends Controller{

        public function login(){
        $this->display();
        }

        public function captcha(){
            $fig=array(
                'fontSize'=>12,
                'useCurve'=>false,
                'useNoise'=>false,
                'length'=>4,
                'fontttf'=>'4.ttf'
                );
            $ver=new \Think\Verify($fig);
            $ver->entry();
        }


        public function checkLogin(){
            $post=I('post.');
        //验证验证码
            $verify=new \Think\Verify();
        //验证
            $result=$verify->check($post['captcha']);
        //判断验证码是否正确
            if($result){
                //验证码正确，处理用户名和密码
                $model=M('User');
                //删除验证码
                unset($post['captcha']);
                //查询
                $data=$model->where($post)->find();
                //判断是否存在用户
                if($data){
                    //存在用户
                    session('id',$data['id']);
                    session('username',$data['username']);
                    session('role_id',$data['role_id']);
                    $this->success('登陆成功~',U('Index/index'),3);
                }
                else{
                    //不存在
                    $this->error('用户名或者密码错误',U('Public/login'));
                }
            }else{
                $this->error('验证码错误',U('Public/login'));
            }

        }

        public function logout(){
            //清除session
            session(null);
            //跳转到登陆页面
            $this->success('成功退出！',U('login'),3);
        }
}