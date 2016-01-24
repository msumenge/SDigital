<?php
class Contact extends CI_Controller {

	public function index()
	{
		$this->load->library('email');
		
		$config = Array(
		    'protocol' => 'mail',
		    'smtp_host' => 'mail.sigmadigital.com.au',
		    'smtp_port' => 25,
		    'smtp_user' => 'admin@sigmadigital.com.au',
		    'smtp_pass' => 'admin123!@#',
		    'mailtype'  => 'html', 
		    'charset'   => 'iso-8859-1',
		    'wordwrap'	=> TRUE
		);
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");
		
		$this->email->from($this->input->post('email'), ucwords($this->input->post('name')));
		#$this->email->to('msumenge@hotmail.com', 'allyeastmanwebdesign@gmail.com');
		$this->email->to('msumenge@hotmail.com');
		
		$this->email->subject('Email from Sigma Digital contact form');
		$this->email->message(
			$this->input->post('msg').'<br/><br/>'.
			ucwords($this->input->post('name')).'<br/>'.
			$this->input->post('phone')
		);
		
		if($this->email->send()) {
			echo '1';
		} else {
			echo '0';
		}
	}
}