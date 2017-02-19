<?php
/**Created by Intellij IDEA
 * Author: Al-assad
 * E-mail: yulinying_1994@outlook.com
 * Github: https://github.com/Al-assad
 * Date: 2017/2/17 16:19
 * Description:
 */
class Email extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->library('email');
        $this->load->helper('url');
    }

    public function index(){
        $content = htmlspecialchars(trim($_POST['content']));
        if($content == NULL){
            $data['message'] = 'The email is empty.';
            $data['title'] = 'email.';
            $data['base_url'] = base_url();
            $this->load->view('basic_module/header',$data);
            $this->load->view('basic_module/popup-back',$data);
        }

        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'smtp.163.com';
        $config['smtp_user'] = 'helloworld_assad@163.com';
        $config['smtp_pass'] = "helloworld123";           //填写邮箱的 SMTP/POP 等的授权码
        $config['smtp_port'] = 25;
        $config['charset'] = 'utf-8';
        $config['smtp_timeout'] = 30;
        $config['mailtype'] = 'text';
        $config['validate'] = TRUE;
        $config['wordwrap'] = TRUE;
        $config['crlf'] = '\r\n';
        $config['newline'] = '\r\n';

        $this->email->initialize($config);
        $this->email->from('helloworld_assad@163.com',$_POST['username']);
        $this->email->to('yulinying_1994@foxmail.com');
        $this->email->subject('IO Game Hub');
        $this->email->message($_POST['content']);

        if($this->email->send()){
            $data['message'] = 'The email was sent.';
        }else{
            $data['message'] = 'Fail to send the email, Please try again.';
        }
        $data['title'] = 'email.';
        $data['base_url'] = base_url();
        $this->load->view('basic_module/header',$data);
        $this->load->view('basic_module/popup-back',$data);
    }

}

?>