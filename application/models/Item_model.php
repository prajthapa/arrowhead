<?php
class Item_model extends CI_Model {
    
    public function add_item($data) {
        $this->db->insert('item', $data);
    }

    public function get_items() {
        $this->db->select();
        $this->db->from('item');
        $this->db->order_by('item_name', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_item($id) {
        $query = $this->db->get_where('item', array('item_id' => $id));
        return $query->first_row();
    }

    public function update_item($data, $id) {
        $this->db->update('item', $data, array('item_id' => $id));
    }

    public function delete_item($id) {
        $this->db->delete('item', array('item_id' => $id));
    }

    public function item_check($item_name, $id) {
        $this->db->select('count(1) as count');
        $this->db->from('item');
        $array = array('item_name' => $item_name, 'id <>' => $id);
        $this->db->where($array);
        $query = $this->db->get();
        return $query->first_row();
    }

}