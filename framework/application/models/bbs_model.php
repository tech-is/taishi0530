<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Bbs_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function deletebbs()
    {
        // 削除ボタンを押されたデータのdelete_flagを０→１
        $delete = $this->input->post('delete');
        $query = $this->db->query("update bulletin_board SET delete_flag = 1 where id = {$delete}");
    }

    function addbbs()
    {
        // DBに投稿内容を追加
        // 時間を日本/東京に設定
        date_default_timezone_set('Asia/Tokyo');
        $time=date('Y-m-d H:i:s');
        $name = $this->input->post('name');
        $message = $this->input->post('message');
        $data = array(
            'name' => $name,
            'message' => $message,
            'time' => $time,
            'delete_flag' => 0
        );
        $this->db->insert('bulletin_board', $data);
    }

    function getbbs($config = NULL)
    {
        // データ取得
        // delete_flagが０のデータのみ取り出す
        $query = $this->db->order_by('id','DESC');
        $query = $this->db->where('delete_flag',0);
        $query = $this->db->get('bulletin_board', 10, $this->uri->segment(3));
        $result = $query->result('array');
        return $result;
    }
}
