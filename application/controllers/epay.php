<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Epay extends CI_Controller {	
	function __construct()
	 {
		parent::__construct();
		if(!$this->session->userdata('username'))
			redirect('home');
	 }
	 
	public function index()
	{
		$this->load->view('epay');
	}
	public function expend()
	{
		$this->load->view('epay');
	}
	public function income()
	{
		$this->load->view('income');
	}
	public function get_data()
	{		
		$record=$this->input->post('pdata');
		$record['username']=$this->session->userdata('username'); 
		$this->db->insert('record',$record);
	}
	public function sum()
	{
		//$sum = $this->db->order_by("date","desc")->get('record')->result();
		//$sum=$this->db->get('record')->result();
		$username=$this->session->userdata('username'); 
		$zc_sum= $this->db->order_by("date","desc")->get_where('record',array('vendor !='=>0,'username'=>$username))->result();
		$sl_sum= $this->db->order_by("date","desc")->get_where('record',array('vendor'=>0,'username'=>$username))->result();
		$data = array('zc_sum'=>$zc_sum,'sl_sum'=>$sl_sum);
		$this->load->view('sum',$data);	
	}
	public function del(){
		$id = $this->input->post('fid');	
		$this->db->delete('record', array('id' => $id)); 
	} 
}
?>
