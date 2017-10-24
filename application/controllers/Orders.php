<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {

	public function __construct() {
        parent::__construct();

        $this->load->model(array('item_model','orders_model'));
    }

    public function create_order() {
 		$data_header['active'] = 'orders';
        $data['items'] = $this->item_model->get_items();

        $this->load->view('template/header', $data_header);
        if ($_POST) {
            $config = array(
                array(
                        'field' => 'order_item',
                        'label' => 'Item',
                        'rules' => 'trim|required|max_length[50]'
                ),
                array(
                        'field' => 'order_quantity',
                        'label' => 'Quantity',
                        'rules' => 'trim|max_length[50]'
                ),
                array(
                        'field' => 'ordered_date',
                        'label' => 'Order Date',
                        'rules' => 'trim|max_length[50]'
                ),
                array(
                        'field' => 'delivery_date',
                        'label' => 'Delivery Date',
                        'rules' => 'trim|max_length[50]'
                )
            );
            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('orders/createOrder', $data);
            } else {
                $data = array(
                    'item_id'     => $this->input->post('order_item'),
                    'quantity'    => $this->input->post('order_quantity'),
                    'ordered_date'    => $this->input->post('ordered_date'),
                    'delivery_date'    => $this->input->post('delivery_date'),
                    'order_by'  => $this->session->userdata['user_name'],
                    'delivery_flag' => 'N'
                );
                $this->orders_model->create_order($data);
                $this->session->set_flashdata('message', '<strong>Order Successfully Placed.</strong>');
                redirect('orders/view_order');    
            }
        } else {
            $this->load->view('orders/createOrder', $data);
        }

        $this->load->view('template/footer');   	
    }

    public function list_order() {
        $data_header['active'] = 'user';
        $data['users'] = $this->orders_model->get_orders();
        $this->load->view('template/header', $data_header);
        $this->load->view('orders/listOrder', $data);
        $this->load->view('template/footer');
    }

    public function list_todayorder() {
        $data_header['active'] = 'user';
        $data['users'] = $this->orders_model->get_todayorders();
        $this->load->view('template/header', $data_header);
        $this->load->view('orders/listOrder', $data);
        $this->load->view('template/footer');
    }

    public function view_order() {
        $data_header['active'] = 'user';
        $data['users'] = $this->orders_model->view_orders($this->session->userdata['user_name']);
        $this->load->view('template/header', $data_header);
        $this->load->view('orders/viewOrder', $data);
        $this->load->view('template/footer');
    }

    public function edit_order($id) {
        $data_header['active'] = 'user';
        $this->load->view('template/header', $data_header);
        $data['users'] = $this->orders_model->get_order($id);
        $data['items'] = $this->orders_model->get_items();
        if ($_POST) {
           $config = array(
                array(
                        'field' => 'order_item',
                        'label' => 'Item',
                        'rules' => 'trim|required|max_length[50]'
                ),
                array(
                        'field' => 'order_quantity',
                        'label' => 'Quantity',
                        'rules' => 'trim|max_length[50]'
                ),
                array(
                        'field' => 'ordered_date',
                        'label' => 'Order Date',
                        'rules' => 'trim|max_length[50]'
                ),
                array(
                        'field' => 'delivery_date',
                        'label' => 'Delivery Date',
                        'rules' => 'trim|max_length[50]'
                )
            );
           $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('orders/createOrder', $data);
            } else {
                $data = array(
                    'item_id'     => $this->input->post('order_item'),
                    'quantity'    => $this->input->post('quantity'),
                    'ordered_date'    => $this->input->post('ordered_date'),
                    'delivery_date'    => $this->input->post('delivery_date')
                );

                $this->orders_model->update_order($data, $id);
                $this->session->set_flashdata('message', '<strong>Order Successfully Updated.</strong>');
                redirect('orders/list_order');
            }
        } else {
            $this->load->view('orders/editOrder', $data);
        }

        $this->load->view('template/footer');       
    }

    public function delete_order($id) {
        $this->orders_model->delete_user($id);
        $this->session->set_flashdata('message', '<strong>Order Successfully Deleted.</strong>');
        redirect('orders/list_order');
    }

    public function user_check($str, $id)
    {
        /*
            CallBack Function
            $str = user_name
            And the value given inside [] are assigned to $id
        */
        $user_id = $this->user_model->user_check($str, $id);
        if($user_id->count == 0) {
            return TRUE;
        } else {
            $this->form_validation->set_message('user_check', 'The Username field must contain a unique value.');
            return FALSE;
        }
    }

    public function deliver_order($id){
        $this->orders_model->deliver_order($id);
        redirect('orders/list_order');
    }
}