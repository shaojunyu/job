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
        $this->load->view('leader_view');
    }
}