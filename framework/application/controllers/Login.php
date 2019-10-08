<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	// コンストラクタ
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}
	
	// 一覧を出力だけ
	public function index()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->view('login_views');
	}

	// メアド、パスワードが入力されていないときの処理
	public function check()
	{
		//ログインチェック
        $this->load->model('login_models');
        $logindata = array();
        $logindata = $this->login_models->checklogin();
        //パスワードがあっていたらログイン
        if(count($logindata) == 1){
			// セッション
			$data = array(
				"password" => $this->input->post("password"),
				"is_login" => 1
			);
			$this->session->set_userdata($data);
            echo "1";
        }else{
            echo "0";
        }
	}

	// 成功画面のログイン前にログインしているかどうかを確認する
	public function session_check()
	{
		if($this->session->userdata('is_login') == 1){
			$this->load->view('login_success');
		}else{
			redirect('/Login');
		}
	}

	// ログアウトの処理
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/Login');
	}
}
