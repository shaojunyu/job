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

    public function job_list()
    {
    	if ($this->session->userdata('business')) {
    		$this->db->where('published_by',$this->session->userdata('business'));
    		$this->db->order_by('Id','DESC');
    		$res = $this->db->get('job_job')->result_array();
    		$this->load->view('business_published_job_view.php',[
    			'published_jobs'=>$res
    			]);
    	}else{
    		header('Location: '.base_url('business/login'));
    	}
    }

    public function publish_new()
    {
    	if ($this->session->userdata('business')) {
    		$this->load->view('business_publish_new_view');
    	}else{
    		header('Location: '.base_url('business/login'));
    	}
    }

    public function job_info($job_id = '')
    {
    	if ($this->session->userdata('business')) {
    		$res = $this->db->where('id',$job_id)->get('job_job')->result_array();
    		$res = $res[0];
    		$this->load->view('business_job_info_view',[
    			'job'=>$res
    			]);
    	}else{
    		header('Location: '.base_url('business/login'));
    	}
    }

    public function apply_info($job_id='')
    {
    	if ($this->session->userdata('business')) {
    		$res = $this->db->where('id',$job_id)->get('job_apply')->result_array();
    		// $res = $res[0];
    		$this->load->view('business_apply_info_view',[
    			'job_apply'=>$res
    			]);
    	}else{
    		header('Location: '.base_url('business/login'));
    	}
    }

    public function pay($job_id = '')
    {
    	if ($this->session->userdata('business')) {
    		$res = $this->db->where('id',$job_id)->get('job_job')->result_array();
    		$res = $res[0];
    		$this->load->view('business_job_info_view',[
    			'job'=>$res
    			]);
    	}else{
    		header('Location: '.base_url('business/login'));
    	}
    	# code...
    }

    public function submit_job()
    {
    	if (!$this->session->userdata('business')) {
    		header('Location: '.base_url('business/login'));
    	}
    	var_dump($this->input->post());
    	$this->db->insert('job_job',[
    		'tag1'=>$this->input->post('tag1'),
    		'tag2'=>$this->input->post('tag2'),
    		'name'=>$this->input->post('name'),
    		'number'=>$this->input->post('number'),
    		'left'=>$this->input->post('number'),
    		'start_date'=>$this->input->post('start_date'),
    		'end_date'=>$this->input->post('end_date'),
    		'period'=>$this->input->post('period'),
    		'site'=>$this->input->post('site'),
    		'salary'=>$this->input->post('salary'),
    		'requirement'=>$this->input->post('requirement'),
			'published_by'=>$this->session->userdata('business')
    		]);
    	header('Location: '.base_url('business/job_list'));
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