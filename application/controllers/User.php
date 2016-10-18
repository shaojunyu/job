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
        $this->load->view('user_login_view');
    }

    public function myself(){
        
    }
}