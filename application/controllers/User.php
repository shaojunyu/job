<?php
/**
 * Created by PhpStorm.
 * User: yushaojun
 * Date: 10/18/2016
 * Time: 6:48 PM
 */
class User extends CI_Controller{
    public function index(){
        if ( empty($this->session->userdata('cellphone')) ){
            $this->load->view('index_view');
        }else{
            header('Location:'.base_url().'user/myself');
        }

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
                header('Location:'.base_url().'user/signup1/'.$cellphone);
            }
        }
    }

    public function signup1($cellphone = ''){
        $this->load->view('signup1_view',array('cellphone'=>$cellphone));
    }

    public function signup2(){
        $cellphone = $this->input->post('cellphone');
        if (empty($cellphone)){
            header('Location:'.base_url().'user/signup1/');
        }else{
            $this->load->view('signup2_view',array('cellphone'=>$cellphone));
        }
    }

    public function complete_info($step = 0){
        if (empty($this->session->userdata('cellphone'))){
            header('Location:'.base_url().'user/index');
        }
        $this->load->model('User_model');
        $this->User_model->userInfo2session($this->session->userdata('cellphone'));
        $session_data = $this->session->userdata();
//        var_dump($this->session->userdata());
        if ( !empty($session_data['name']) and !empty($session_data['sex']) and !empty($session_data['QQ']) ){
            header('Location:'.base_url().'user/myself');
        }

        if ($step == 0){
            $this->load->view('complete_entrance_view');
        }
        if ($step == 1){
            $this->load->view('complete_view');
        }
    }

    public function myself(){
        if (empty($this->session->userdata('cellphone'))){
            header('Location:'.base_url().'/user/index');
        }
        $this->load->model('User_model');
        $this->User_model->userInfo2session($this->session->userdata('cellphone'));

        $session_data = $this->session->userdata();
        if (empty($session_data['tag1']) and empty($session_data['tag2'])){
            header('Location:'.base_url().'user/complete_info');
        }else if (empty($session_data['name']) or empty($session_data['sex']) or empty($session_data['QQ'])){
            header('Location:'.base_url().'user/complete_info');
        }else{
            //获取积分
            $this->db->where('cellphone',$this->session->userdata('cellphone'));
            $this->db->select_sum('point');
            $res = $this->db->get('job_point');
//            var_dump($res->result_array()[0]);
            $res = $res->result_array();
            $point = empty($res[0]['point'])?0:$res[0]['point'];

            //获取余额
            $this->db->where('cellphone',$this->session->userdata('cellphone'));
            $this->db->select_sum('amount');
            $res = $this->db->get('job_user_trade');
            $res = $res->result_array();
            $balance = empty($res[0]['amount'])?0:$res[0]['amount'];
            $this->load->view('myself_view',array(
                'point'=>$point,
                'balance'=>$balance
            ));
        }
    }

    public function balance(){
        if (empty($this->session->userdata('cellphone'))){
            header('Location:'.base_url().'user/index');
        }
        $this->load->model('User_model');
        $this->User_model->userInfo2session($this->session->userdata('cellphone'));

        $this->db->where('cellphone',$this->session->userdata('cellphone'));
        $res = $this->db->get('job_user_trade');
        $res = $res->result_array();

        $this->load->view('balance_view',array(
            'trade_array'=>$res
        ));

    }

    public function point(){
        
        if (empty($this->session->userdata('cellphone'))){
            header('Location:'.base_url().'user/index');
        }else{
            //获取积分
            $this->db->where('cellphone',$this->session->userdata('cellphone'));
            $res = $this->db->get('job_point');
            $res = $res->result_array();
            $this->load->view('points_view',array(
                'point_array'=>$res
            ));
        }
    }

    public function myjob($page = null, $jobId = null){
        if (($page == null) and ($jobId == null)){
            $this->load->view();
        }
    }
}