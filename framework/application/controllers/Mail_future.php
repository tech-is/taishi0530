<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mail_future extends CI_Controller {

	// コンストラクタ
	public function __cunstruct()
	{
		parent::__construct();
	}

	// 一覧を表示
	public function index()
	{
		$this->load->helper(array('form','url'));

		$this->load->library('form_validation');

		//$this->load->view('Mail_future_view');
		$this->send_mail();
	}

	// MAILの送信
	public function send_mail()
	{
		$this->load->library('email');

		$config = array(
			"protocol" =>"smtp",
			"smtp_host" => "ssl://smtp.gmail.com",
			"smtp_port"=> 587,
			"smtp_usre"=>"c.t.o.taishi.0530@gmail.com",
			"smtp_pass"=>"taishi0530"
		);
		$this->load->library("email", $config);
		$this->email->set_newline("rn");

		$this->email->from('c.t.o.taishi.0530@gmail.com','大本泰史');
		$this->email->to('c.t.o.taishi.0530@gmail.com');

		$this->email->subject('test');
		$this->email->message('こんにちは、テスト');

		if(! $this->email->send()){
			echo "送信失敗";
		}else{
			echo "送信成功";
		}
	}

}
