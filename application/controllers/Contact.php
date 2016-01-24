<?php
class Contact extends CI_Controller {

	public function index()
	{
		$config = Array(
		    'protocol' => 'smtp',
		    'smtp_host' => 'sg2plcpnl0006.prod.sin2.secureserver.net',
		    'smtp_port' => 465,
		    'smtp_user' => 'admin@sigmadigital.com.au',
		    'smtp_pass' => 'admin123!@#',
		    'mailtype'  => 'html', 
		    'charset'   => 'iso-8859-1',
			'wordwrap'	=> TRUE
		);
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		
		$this->email->from($this->input->post('email'), $this->input->post('name'));
		#$this->email->to('msumenge@hotmail.com', 'allyeastmanwebdesign@gmail.com');
		$this->email->to('msumenge@hotmail.com');
		
		$this->email->subject('Email from Sigma Digital contact form');
		$this->email->message(
			$this->input->post('msg').'
			------------------------
			'.$this->input->post('name').'
			'.$this->input->post('phone')
		);
		
		if($this->email->send()) {
			echo '1';
		} else {
			echo '0';
		}
	}
}
