<?php

/**
* 
*/
class Apply extends CI_controller
{
	public function job($code='')
	{
		if (empty($code)) {
			header('Location: '.base_url());
		}
		$res = $this->db->where('code',$code)->get('job_leader')->result_array();
		if (count($res) == 0) {
			header('Location: '.base_url());
		}
		$job_id = $res[0]['job_id'];
		$res = $this->db->where('id',$job_id)->get('job_job')->result_array();
		$res = $res[0];
		$this->load->view('rush_job_view',['job'=>$res,'code'=>$code]);
	}

	public function apply_job($code='')
	{
		if (empty($code)) {
			header('Location: '.base_url());
		}
		$res = $this->db->where('code',$code)->get('job_leader')->result_array();
		if (count($res) == 0) {
			header('Location: '.base_url());
		}
		if (!$this->session->userdata('cellphone')) {
			header('Location: '.base_url('user/login?code='.$code));
		}
		$job_id = $res[0]['job_id'];
		$this->load->view('rush_payment_view');
	}
}