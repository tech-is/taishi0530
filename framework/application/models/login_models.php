<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login_models extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function checklogin()
    {
        // post値取得
        $mail = $this->input->post('mail',true);
        $password = $this->input->post('password',true);

        //データ取得
        $query = $this->db->get_where('login', array('mail' => "{$mail}" , 'password' => "{$password}"));
        $result = $query->result('array');
        return $result;
    }
}