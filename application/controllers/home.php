<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
 	function __construct()
	 {
		parent::__construct();
		$this->load->model('user_model');//�����������������Զ�װ��
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
	
	//ע�����û�
    public function signup(){
        $userdata['username']=$this->input->post('signup_username');   //��ȡ����������û���
       // $userdata['email']=$_POST['email'];         //��ȡ��������ĵ����ʼ���ַ
        $userdata['password']=$this->input->post('signup_password');  //��ȡ�������������
        $userdata['rank']=0;                       //�����û���ɫ��0��ʾ��ͨ�û�
        $query=$this->db->get_where('user',array('username'=>$userdata['username']));
        if( !($query->row_array()==null)){
				redirect('home');
                return;		
		}
		else{
                $status=$this->user_model->add_new_user($userdata);  //�����û�ģ���еĺ����������������������ʽ���ݹ�ȥ
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
		echo "������Ϣ�����";
	}
	
	public function dizhu()
	{
		$this->load->view('dizhu');
	}	
}