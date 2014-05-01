<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model {

  public function __construct()
  {
    $this->load->database();
	$this->load->library('session');
  }
  
  function login($username,$password)
  {
	$query=$this->db->get_where('user',array('username'=>$username,'password'=>$password));
  	if($query->num_rows()==1){
			$this->session->set_userdata('username',$username);
			return true;
		}
	else{
			return false;			 
		 }  
   }
   
    function add_new_user($userdata){
        $username=$userdata['username'];
        //$password=MD5($userdata['password']); //密码进行加密处理
		$password=$userdata['password'];
        //$email=$userdata['email'];
        $rank=$userdata['rank'];
        $data = array(
               'username' => $username ,
               'password' => $password ,
               //'email' => $email,
               'rank' => $rank
        );
        $this->db->insert('user', $data);    //插入数据
        if(($this->db->affected_rows())!=1){
            return 0;      //如果插入操作影响的行数不为1，则表示插入失败，返回0
        }
        else{
            return 1;    //如果插入成功，返回1
        }
    }
}