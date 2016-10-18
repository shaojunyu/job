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
        if (empty($cellphone)){

        }else{
            $this->db->where('cellphone',$cellphone);
            $this->db->get('user');
            if ($this->db->affected_rows() == 1){
                $this->load->view('user_login_view',array('cellphone'=>$cellphone));
            }else{
                echo $cellphone;
                //echo $this->db->affected_rows();
//                $this->load->view('signup1_view',array('cellphone'=>$cellphone));
                header('Location:./signup1/'.$cellphone);
            }
        }
    }

    public function signup1($cellphone = ''){
        $this->load->view('signup1_view',array('cellphone'=>$cellphone));
    }

    public function signup2($cellphone){
        if (empty($cellphone)){
            header('Location:./signup1/');
        }else{
            $this->load->view('signup2_view',array('cellphone'=>$cellphone));
        }
    }

    public function complete_info($step = 0){
//        $this->load->view('complete_entrance_view');
        if ($step == 0){
            $this->load->view('complete_entrance_view');
        }
        if ($step == 1){
            $this->load->view('complete_view');
        }
    }

    public function myself(){
        $session_data = $this->session->userdata();
        if (empty($session_data['tag1']) or empty($session_data['tag2'])){
            header('Location:./complete_info');
        }else if (empty($session_data['name']) or empty($session_data['sex']) or empty($session_data['QQ'])){
            header('Location:./complete_info');
        }else{
            $this->load->view('myself_view');
        }
    }
}