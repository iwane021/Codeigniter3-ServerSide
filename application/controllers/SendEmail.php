<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SendEmail extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
        $this->load->library('email');
        
        $config = array();
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'smtp.office365.com';
        $config['smtp_timeout'] = 60;
        // $config['smtp_port'] = 25;
        $config['smtp_port'] = 587;
        $config['smtp_crypto'] = 'tls';
        $config['smtp_user'] = 'admin@pkri.co.id';
        $config['smtp_pass'] = 'kuningan@26';
        $config['charset'] = 'utf-8';
        $config['mailtype'] = 'html';
        $config['newline'] = '\r\n';
        $config['wordwrap'] = TRUE;

        $this->email->initialize($config);

        // Mail config
        $to = 'iwane.prasetiyo@gmail.com';
        $from = 'admin@pkri.co.id';
        $fromName = 'TestingYa';
        $mailSubject = 'Testing Email Settings';
        
        // Mail content
        $mailContent = '
            <h2>Contact Request Submitted</h2>
            <p><b>Name: </b>Iwan P</p>
            <p><b>Email: </b>iwane.prasetiyo@gmail.com</p>
            <p><b>Subject: </b>Testing Contact us</p>
            <p><b>Message: </b>Tolong di respon segera ya</p>
        ';

        $this->email->to($to);
        $this->email->from($from, $fromName);
        $this->email->subject($mailSubject);
        $this->email->message($mailContent);

        // Send email & return status
        if($this->email->send()) {
            echo "Email Succes terkirim";
        } else { 
            echo "Sorry, Email gagal terkirim!";
            print_r($this->email->print_debugger());
        }

        // return $this->email->send() ? "Email Succes terkirim" : "Sorry Email gagal!!";
	}

}
