<?php
class User_model extends CI_Model {
    
    public function create_user($data) {
        $this->db->insert('user', $data);
    }

    public function create_restaurant($data) {
        $this->db->insert('restaurant', $data);
    }

    public function get_users() {
        $this->db->select();
        $this->db->from('user');
        $this->db->order_by('user_name', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_user($id) {
        $query = $this->db->get_where('user', array('user_id' => $id));
        return $query->first_row();
    }

    public function update_user($data, $id) {
        $this->db->update('user', $data, array('user_id' => $id));
    }

    public function delete_user($id) {
        $this->db->delete('user', array('user_id' => $id));
    }

    public function user_check($user_name, $id) {
        $this->db->select('count(1) as count');
        $this->db->from('user');
        $array = array('user_name' => $user_name, 'user_id <>' => $id);
        $this->db->where($array);
        $query = $this->db->get();
        return $query->first_row();
    }

}