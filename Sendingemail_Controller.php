<?php
class Sendingemail_Controller extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
    }
    //tes
    public function index() {
        $this->load->helper('form');
        $this->load->view('contact_email_form');
    }
    public function send_mail() {
        $from_email = 'hiro@gijagijug.com';
        $to_email = $this->input->post('email');
        //Load email library
		        $config = array(
        'protocol'  => 'smtp',
        'smtp_host' => 'smtp.gmail.com',
        'smtp_port' => 465,
        'smtp_user' => 'helpdesk.nam19@gmail.com',
        'smtp_pass' => 'Narada1234!@#$',
        'mailtype'  => 'html',
        'charset'   => 'utf-8'
        )
		
        // $this->load->library('email'$config);

        $config = array(
        'protocol'  => 'smtp',
        'smtp_host' => 'smtp.gmail.com',
        'smtp_port' => 465,
        'smtp_user' => 'helpdesk.nam19@gmail.com',
        'smtp_pass' => 'Narada1234!@#$',
        'mailtype'  => 'html',
        'charset'   => 'utf-8'
        );
		        $this->load->library("email", $config);
        
        if ($file_path!=''){
        $this->email->attach($file_path);
        }
        
        $this->email->set_newline("\r\n");
        $this->email->from($from_email, $from_email);
        $this->email->to($to_email);
        $this->email->cc($cc_email);
        $this->email->bcc($bcc_email);
        $this->email->subject($subject);
        $this->email->set_mailtype('html');
        $this->email->initialize($config);


        $this->email->from($from_email, 'Identification');
        $this->email->to($to_email);
        $this->email->subject('Send Email Codeigniter');
        $this->email->message('The email send using codeigniter library');
        //Send mail
        if($this->email->send())
        $this->session->set_flashdata("email_sent","Congragulation Email Send Successfully.");
        else
        $this->session->set_flashdata("email_sent","You have encountered an error");
        $this->load->view('contact_email_form');
    }
}
?>