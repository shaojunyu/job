<?php
/**
 * Created by PhpStorm.
 * User: yushaojun
 * Date: 10/18/2016
 * Time: 6:48 PM
 */
class User extends CI_Controller{
    public function index(){
//        header('Location:/user/index');
        $this->load->view('index_view');
    }

    public function login(){
        $cellphone = $this->input->post('cellphone');
        if (empty($cellphone)){

        }else{
            $this->load->view('user_login_view',array('cellphone'=>$cellphone));
        }

    }

    public function myself(){
        
    }
}