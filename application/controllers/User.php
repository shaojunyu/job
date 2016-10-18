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
        $password = $this->input->post('password');
        if (!empty($cellphone)){
        }else{
            $this->db->where('cellphone',$cellphone);
            $this->db->get('user');
            if ($this->db->affected_rows() == 1){
                $this->load->view('user_login_view',array('cellphone'=>$cellphone));
            }else{
//                echo $cellphone;
                //echo $this->db->affected_rows();
//                $this->load->view('signup1_view',array('cellphone'=>$cellphone));
                header('Location:./signup1/'.$cellphone);
            }
        }
    }

    public function signup1($cellphone = ''){
        $this->load->view('signup1_view',array('cellphone'=>$cellphone));
    }

    public function myself(){
        
    }
}