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
        //$password=MD5($userdata['password']); //������м��ܴ���
		$password=$userdata['password'];
        //$email=$userdata['email'];
        $rank=$userdata['rank'];
        $data = array(
               'username' => $username ,
               'password' => $password ,
               //'email' => $email,
               'rank' => $rank
        );
        $this->db->insert('user', $data);    //��������
        if(($this->db->affected_rows())!=1){
            return 0;      //����������Ӱ���������Ϊ1�����ʾ����ʧ�ܣ�����0
        }
        else{
            return 1;    //�������ɹ�������1
        }
    }
}