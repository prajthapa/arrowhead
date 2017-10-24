<?php
class Login_model extends CI_Model {
    
    public function user_check($username, $password) {
        $this->db->select('*');
		$this->db->from('user');
		$this->db->where('user_name', $username);
		$this->db->where('user_password', $password);
		$query = $this->db->get();
		return $query->first_row();
    }

}