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
        // var_dump($res);
        $this->load->view('leader_view',[
            'my_leading_jobs'=>$res
            ]);
    }

    public function apply_info($job_id='')
    {
        $this->db->where('leader_cellphone',$this->session->userdata('cellphone'))->where('job_id',$job_id);
        $res = $this->db->get('job_apply')->result_array();

        // echo count($res);
        $this->load->view('leader_apply_info_view',[
            'applied_users'=>$res
            ]);
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

    public function get_apply_link($job_id = '')
    {
        // var_dump($this->session->userdata());
        # code...
        $this->db->where('leader_cellphone',$this->session->userdata('cellphone'))->where('job_id',$job_id);
        $res = $this->db->get('job_leader')->result_array();
        if (empty($res[0]['code'])) {
            $this->db->where('leader_cellphone',$this->session->userdata('cellphone'))->where('job_id',$job_id);
            $code = 'j'.$job_id.'u'.$this->session->userdata('job_user_id');
            $this->db->update('job_leader',[
                'code'=>$code
                ]);
            echo base_url('apply/job/'.$code);
        }else{
            echo base_url('apply/job/'.$res[0]['code']);
        }
    }
}