<?php
class Model_detector extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
		$this->load->helper('string');
	}
	public function getAllDetector($email){
		$this->db->select('*');
		$this->db->where(['email'=>$email]);
		$query=$this->db->get('PT_list_detector');


			$result = $query->result_array();
			if($result != null){
				$i=0;
				foreach($result as $row){
				foreach($row as $key => $value){
					$data["detecteur"][$i][$key] = $value;

				}
					$i++;

				}
				return $data;
		}else{
				return [];
			}

	}
	public function delete($key){
		$this->db->where('id',$key);
		$this->db->delete('PT_list_detector');
	}
	public function addDetector($data){
		$this->db->insert('PT_list_detector',$data);
	}
	public function getDetectorData($id){
		$this->db->select('*');
		$this->db->where(['id'=>$id]);
		$query=$this->db->get('PT_detector_data');


		$result = $query->result_array();
		if($result != null){
			$i=0;
			foreach($result as $row){
				foreach($row as $key => $value){
					$data["detecteur"][$i][$key] = $value;

				}
				$i++;

			}
			return $data;
		}else{
			return [];
		}
	}
}
