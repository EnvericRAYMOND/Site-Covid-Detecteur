<?php
class model_connexion extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
		$this->load->helper('string');
	}
	public function getAll($email){
		$this->db->where('email',$email);
		$query=$this->db->get('PT_user');
		foreach ($query->result() as $row)
		{

		}
		return $row;

	}
	public function login($data){
		$this->db->select('*');
		$this->db->from('PT_user');
		$this->db->where(['email'=>$data['email']]);
		$query = $this->db->get();
		foreach ($query->result_array() as $array);

		if (isset($array)) {

			if (password_verify($data['password'], $array['password'])) {
				return $array;
			}else{
				return false;
			}
		} else {
			return false;
		}
	}
	public function getCount($email){
		$this->db->where('email',$email);
		$this->db->from('PT_user');
		$count= $this->db->count_all_results();
		return $count;
	}
	public function check($data)
	{
		$this->db->where($data);
		$query = $this->db->get('PT_user');

		if($arg=$query->num_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function createKeyForUser()
	{
		$key = random_string('numeric', 12);
		$this->db->where('cle', $key);
		$query = $this->db->get('PT_user_waiting');
		if ($arg = $query->num_rows() > 0) {
			$this->createKeyForUser();
		} else {
			return $key;
		}
	}
	public function createNewUser($data){
		$this->db->insert('PT_user',$data);

	}
	public function ActivateAccount($key){
		$this->db->where('cle', $key);
		$this->db->select('login,email,password');
		$query=$this->db->get('PT_user_waiting');
		foreach ($query->result() as $data)
		{

		}
		$this->db->insert('PT_user',$data);
	}


}

