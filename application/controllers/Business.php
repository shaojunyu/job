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
    	if ($this->session->userdata('business')) {
    		$this->load->view('business_view');
    	}else{
    		header('Location: '.base_url('business/login'));
    	}
    	
    }

    public function published()
    {
    	if ($this->session->userdata('business')) {
    		$this->db->where('published_by',$this->session->userdata('business'));
    		$this->db->where('isPaid','YES')->order_by('Id','DESC');
    		$res = $this->db->get('job_job')->result_array();
    		$this->load->view('business_published_job_view.php',[
    			'published_jobs'=>$res
    			]);
    		# code...
    	}else{
    		header('Location: '.base_url('business/login'));
    	}
    }

    public function publish_new($step = 1)
    {
    	if ($this->session->userdata('business')) {
    		if ($step == 1) {
    			
    		}else{

    		}
    	}else{
    		header('Location: '.base_url('business/login'));
    	}
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
    			$this->session->set_userdata('business',$cellphone);
    			// $this->load->view('business_view');
    			$this->business_info_to_session($cellphone);
    			header('Location: '.base_url('business'));
    		}else{
    			// header(base_url('business/login?error'));
    			$this->load->view('business_login_view');
    		}
    	}else{
    		$this->load->view('business_login_view');
    	}
    }

    public function cooperation()
    {

    	$this->load->view('business_cooperation_view');
    	# code...
    }

    private function business_info_to_session($cellphone='')
    {
    	$this->db->where('cellphone',$cellphone);
    	$res = $this->db->get('job_business')->result_array();
    	$res = $res[0];
    	$this->session->set_userdata($res);
    	# code...
    }


}