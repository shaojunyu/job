<?php
/**
 * Created by PhpStorm.
 * User: yushaojun
 * Date: 10/18/2016
 * Time: 6:22 PM
 */
class Api extends CI_Controller{
    private $post_data;

    public function __construct()
    {
        parent::__construct();
        $this->post_data = json_decode($this->input->raw_input_stream);
    }

    public function login(){
        $cellphone = $this->post_data->cellphone;
        $password = $this->post_data->cellphone;
        $this->load->model('User');
        $res = $this->User->login($cellphone,$password);
        if ($res){
            $this->echo_msg(true);
        }else{
            $this->echo_msg(false);
        }
    }

    private function echo_msg($success=false, $msg=''){
        echo json_encode(array('success'=>$success,'msg'=>$msg));
    }
}