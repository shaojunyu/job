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
            $this->db->trans_start();
            $this->db->where('cellphone',$this->session->userdata('cellphone'));
            $this->db->update('job_user',array(
                'name'=>$this->post_data->name,
                'sex'=>$this->post_data->sex,
                'QQ'=>$this->post_data->QQ,
                'college'=>$this->post_data->college,
//                'major'=>$this->post_data->major,
                'grade'=>$this->post_data->grade,
                'dormitory'=>$this->post_data->dormitory,
                'tag1'=>$this->post_data->tag1,
                'tag2'=>$this->post_data->tag2
            ));
            //积分
            $this->db->insert('job_point',array(
                'cellphone'=>$this->session->userdata('cellphone'),
                'point'=>200,
                'remark'=>'完善信息，赠送200积分'
            ));
            $this->db->trans_complete();
            $this->echo_msg(true);
        }catch (exception $e){
            $this->echo_msg(false);
        }
    }

    public function signup(){
        try{
            $this->load->model('User_model');
            $this->User_model->signup(
                $this->post_data->cellphone,
                $this->post_data->password,
                $this->post_data->school
                );
            $this->echo_msg(true);
        }catch (exception $e){
            $this->echo_msg(false);
        }
    }

    public function send_sms_code($cellphone='')
    {
        $res = $this->db->where('cellphone',$cellphone)->where('used','NO')->get('sms_code')->result_array();
        if (count($res) == 1) {
            $this->echo_msg(true);
            exit();
        }

        $code = rand(111111,999999);
        $sendUrl = 'http://v.juhe.cn/sms/send'; //短信接口的URL
        $smsConf = array(
            'key'   => '38a6fc73bf3492e98988fd918a639327', //您申请的APPKEY
            'mobile'    => $cellphone, //接受短信的用户手机号码
            'tpl_id'    => '22007', //您申请的短信模板ID，根据实际情况修改
            'tpl_value' =>'#app#=四年兼职&#code#='.$code.'&#hour#=1' //您设置的模板变量，根据实际情况修改
        );
        $content = $this->juhecurl($sendUrl,$smsConf,1);
        if($content){
            $result = json_decode($content,true);
            $error_code = $result['error_code'];
            if($error_code == 0){
                //状态为0，说明短信发送成功
                $this->db->insert('sms_code',[
                    'cellphone'=>$cellphone,
                    'code'=>$code
                    ]);
                // echo "短信发送成功,短信ID：".$result['result']['sid'];
                $this->echo_msg(true);
            }else{
                //状态非0，说明失败
                $msg = $result['reason'];
                // echo "短信发送失败(".$error_code.")：".$msg;
                $this->echo_msg(false,$msg);
            }
        }else{
            //返回内容异常，以下可根据业务逻辑自行修改
            // echo "请求发送短信失败";
            $this->echo_msg(false,'请稍后再试');
        }
    }


    /**
     * 请求接口返回内容
     * @param  string $url [请求的URL地址]
     * @param  string $params [请求的参数]
     * @param  int $ipost [是否采用POST形式]
     * @return  string
     */
    private function juhecurl($url,$params=false,$ispost=0){
        $httpInfo = array();
        $ch = curl_init();
        curl_setopt( $ch, CURLOPT_HTTP_VERSION , CURL_HTTP_VERSION_1_1 );
        curl_setopt( $ch, CURLOPT_USERAGENT , 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22' );
        curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT , 30 );
        curl_setopt( $ch, CURLOPT_TIMEOUT , 30);
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER , true );
        if( $ispost )
        {
            curl_setopt( $ch , CURLOPT_POST , true );
            curl_setopt( $ch , CURLOPT_POSTFIELDS , $params );
            curl_setopt( $ch , CURLOPT_URL , $url );
        }
        else
        {
            if($params){
                curl_setopt( $ch , CURLOPT_URL , $url.'?'.$params );
            }else{
                curl_setopt( $ch , CURLOPT_URL , $url);
            }
        }
        $response = curl_exec( $ch );
        if ($response === FALSE) {
            //echo "cURL Error: " . curl_error($ch);
            return false;
        }
        $httpCode = curl_getinfo( $ch , CURLINFO_HTTP_CODE );
        $httpInfo = array_merge( $httpInfo , curl_getinfo( $ch ) );
        curl_close( $ch );
        return $response;
    }


    private function echo_msg($success=false, $msg=''){
        echo json_encode(array('success'=>$success,'msg'=>$msg));
    }
}