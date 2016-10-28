<?php
/**
 * Created by PhpStorm.
 * User: yushaojun
 * Date: 10/20/2016
 * Time: 10:42 PM
 */
class Business extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
    	# code...
    }

    public function login()
    {
    	$cellphone = $this->input->post('cellphone');
    	$password = $this->input->post('password');
    	if ( !empty($cellphone) and !empty($password) ) {
    		$this->db->where('cellphone', $cellphone);
    		$this->db->where('password', $password);
    		$this->db->where('approved','YES');
    		$res = $this->db->count_all_results('job_business');
    		// echo $res;
    		if ($res == 1) {
    			$this->session->set_userdata('business','business');
    			$this->load->view('business_view');
    		}else{
    			header(base_url('business/login?error'));
    		}
    	}else{
    		$this->load->view('business_login_view');
    	}
    }

    public function apply()
    {
    	# code...
    }


}