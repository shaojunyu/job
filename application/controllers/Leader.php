<?php
/**
 * Created by PhpStorm.
 * User: yushaojun
 * Date: 10/20/2016
 * Time: 10:47 PM
 */

class Leader extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        if (empty($this->session->userdata('cellphone')) or $this->session->userdata('isLeader') != 'YES'){
            header('Location:'.base_url().'user/index');
        }
    }
    public function index(){
        $res = $this->db->where('leader_cellphone',$this->session->userdata('cellphone'))->get('job_leader')->result_array();
        $this->load->view('leader_view',[
            'my_leading_jobs'=>$res
            ]);
    }

    public function apply_info($job_id='')
    {
        $this->load->view('leader_apply_info_view');
    }

    public function job_info($job_id='')
    {
        $res = $this->db->where('id',$job_id)->get('job_job')->result_array();
        $res = $res[0];
        $this->load->view('leader_job_info_view',[
            'job'=>$res
            ]);
        # code...
    }
}