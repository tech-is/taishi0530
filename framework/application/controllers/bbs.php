<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bbs extends CI_Controller {

	// コンストラクタ
	public function __construct()
	{
		parent::__construct();
	}
	
	// 一覧を出力だけ
	public function index()
	{
		// ヘルパー読み込み
		$this->load->library('pagination');

		// BBSモデル読み込み
		$this->load->model('bbs_model');

		// データ取得
		$data = array();
		$config = array();
		$config['base_url'] = 'http://test.com/bbs/index/';
		//ページに表示させる件数
		$config['per_page'] = 10;
		$comment_list = $this->bbs_model->getbbs($config);
		$data['comment_list'] = $comment_list;
		// データベースから合計の行を取得する
		$config["total_rows"] = $this->db->get("bulletin_board")->num_rows();

		// リンク作成
		// ページ送り
		$this->pagination->initialize($config);
		$data["records"] = $this->db->get("bulletin_board", $config["per_page"], $this->uri->segment(3));

		// 表示
		$this->load->view('view_bbs' , $data);
	}

	// データを削除する
	public function delete()
	{
		// BBSモデル読み込み
		$this->load->model('bbs_model');
		$this->load->helper('url');
		// 書き込みメソッド実行
		$this->bbs_model->deletebbs();
		redirect('/bbs');
	}

	// データを登録する
	public function add()
	{
		$btn = $this->input->post('btn');
		// BBSモデル読み込み
		$this->load->model('bbs_model');
		$this->load->helper('url');

		// 書き込みメソッド実行
		$this->bbs_model->addbbs();
		redirect('/bbs');
	}
}
