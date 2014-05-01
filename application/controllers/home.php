<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
 	function __construct()
	 {
		parent::__construct();
		$this->load->model('user_model');//其他的在配置里面自动装载
	 }
	 
	public function index()
	{
		if(!$this->session->userdata('username'))
			redirect('home/login');
		else 
		redirect('epay');	
	}
	
	public function verify()
	{
		$username= $this->input->post('login_username');
		$password= $this->input->post('login_password');
		$login=$this->user_model->login($username,$password);
		redirect('home');
	}
	public function login()
	{
			$this->load->view('login');
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('home');
	}
	public function register()
	{	
		$this->load->view('register');
	}
	
	//注册新用户
    public function signup(){
        $userdata['username']=$this->input->post('signup_username');   //获取表单中输入的用户名
       // $userdata['email']=$_POST['email'];         //获取表单中输入的电子邮件地址
        $userdata['password']=$this->input->post('signup_password');  //获取表单中输入的密码
        $userdata['rank']=0;                       //定义用户角色，0表示普通用户
        $query=$this->db->get_where('user',array('username'=>$userdata['username']));
        if( !($query->row_array()==null)){
				redirect('home');
                return;		
		}
		else{
                $status=$this->user_model->add_new_user($userdata);  //调用用户模型中的函数，并将参数以数组的形式传递过去
                if($status==1){
					$this->session->set_userdata('username', $userdata['username']);
                    redirect('home');
                }
                else{
					redirect('home/login');
				}		
		}
    }
	
	public function info($webInfo)
	{
		$ip=$this->input->ip_address();
		$now = now();
		$gmt = unix_to_human(gmt_to_local($now), false, 'eu');
		$info['time']=$gmt;
		$info['ip']=$ip;
		$info['webInfo']=$webInfo;
		$info['user']=$this->session->userdata('user_data');
		$this->db->insert('info',$info);	
	}	
	
	public function sum()
	{
		if(!$this->session->userdata('user_data')) redirect('home');
		$info=$this->db->get('info')->result();
		$data = array('info'=>$info);
		$this->load->view('info',$data);	
	}
	
	public function clear()
	{
		$this->db->truncate('info'); 
		echo "访问信息已清空";
	}
	
	public function dizhu()
	{
		$this->load->view('dizhu');
	}	
}