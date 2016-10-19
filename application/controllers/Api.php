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
        $password = $this->post_data->password;
        $this->load->model('User_model');
        $res = $this->User_model->login($cellphone,$password);
        if ($res){
            $this->echo_msg(true);
        }else{
            $this->echo_msg(false);
        }
    }

    public function submit_info(){
        try{
            $this->db->trans_start();
            $this->db->where('cellphone',$this->session->userdata('cellphone'));
            $this->db->update('job_user',array(
                'name'=>$this->post_data->name,
                'sex'=>$this->post_data->sex,
                'QQ'=>$this->post_data->QQ,
                'college'=>$this->post_data->college,
//                'major'=>$this->post_data->major,
                'grade'=>$this->post_data->grade,
                'dormitory'=>$this->post_data->dormitory,
                'tag1'=>$this->post_data->tag1,
                'tag2'=>$this->post_data->tag2
            ));
            //积分
            $this->db->insert('job_point',array(
                'cellphone'=>$this->session->userdata('cellphone'),
                'point'=>200,
                'remark'=>'完善信息，赠送200积分'
            ));
            $this->db->trans_complete();
            $this->echo_msg(true);
        }catch (exception $e){
            $this->echo_msg(false);
        }
    }

    public function signup(){
        try{
            $this->load->model('User_model');
            $this->User_model->signup(
                $this->post_data->cellphone,
                $this->post_data->password,
                $this->post_data->school
                );
            $this->echo_msg(true);
        }catch (exception $e){
            $this->echo_msg(false);
        }
    }

    private function echo_msg($success=false, $msg=''){
        echo json_encode(array('success'=>$success,'msg'=>$msg));
    }
}