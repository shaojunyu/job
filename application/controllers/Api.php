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
            $this->db->where('cellphone',$this->session->userdata('cellphone'));
            $this->db->update('job_user',array(
                'name'=>$this->post_data->name,
                'sex'=>$this->post_data->sex,
                'QQ'=>$this->post_data->QQ,
                'college'=>$this->post_data->college,
                'major'=>$this->post_data->major,
                'grade'=>$this->post_data->grade,
                'dormitory'=>$this->post_data->dormitory,
                'tag1'=>$this->post_data->tag1,
                'tag2'=>$this->post_data->tag2
            ));
            $this->echo_msg(true);
        }catch (exception $e){
            $this->echo_msg(false);
        }

    }

    private function echo_msg($success=false, $msg=''){
        echo json_encode(array('success'=>$success,'msg'=>$msg));
    }
}