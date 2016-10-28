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
    	$this->load->view('business_login_view');
    	# code...
    }

    public function apply()
    {
    	# code...
    }

    
}