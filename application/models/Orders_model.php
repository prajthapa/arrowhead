<?php
class Orders_model extends CI_Model {
    
    public function create_order($data) {
        $this->db->insert('orders', $data);
    }

    public function get_items() {
        $this->db->select();
        $this->db->from('item');
        $this->db->order_by('item_name', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_orders() {
        $this->db->select();
        $this->db->from('orders');
        $this->db->join('item', 'item.item_id = orders.item_id');
        $this->db->order_by('ordered_date', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_todayorders() {
        $date = date("y-m-d");
        $this->db->select();
        $this->db->from('orders');
        $this->db->join('item', 'item.item_id = orders.item_id');
        $this->db->where('ordered_date =', $date);
        $this->db->order_by('ordered_date', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function view_orders($id) {
        $this->db->select();
        $this->db->from('orders');
        $this->db->join('item', 'item.item_id = orders.item_id');
        $this->db->where('order_by =', $id);
        $this->db->order_by('ordered_date', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_order($id) {
        // $query = $this->db->get_where('orders', array('id' => $id));
        $this->db->select();
        $this->db->from('orders');
        $this->db->join('item', 'item.item_id = orders.item_id');
        $this->db->where('orders_id =', $id);
        $query = $this->db->get();
        return $query->first_row();
    }

    public function update_order($data, $id) {
        $this->db->update('orders', $data, array('orders_id' => $id));
    }

    public function delete_user($id) {
        $this->db->delete('orders', array('orders_id' => $id));
    }

    public function user_check($user_name, $id) {
        $this->db->select('count(1) as count');
        $this->db->from('user');
        $array = array('user_name' => $user_name, 'user_id <>' => $id);
        $this->db->where($array);
        $query = $this->db->get();
        return $query->first_row();
    }

    public function deliver_order($id) {
        $this->db->set('delivery_flag', 'Y');
        $this->db->where('orders_id', $id);
        $this->db->update('orders');
    }

}