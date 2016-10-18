<?php
/**
 * Created by PhpStorm.
 * User: yushaojun
 * Date: 10/19/2016
 * Time: 3:49 AM
 */
class Job_model extends CI_Model{
    public function create_job(){
        $this->db->insert('job_job',array(
        ));
    }

    public function complete_job($jobID,$cellphone){

    }

}