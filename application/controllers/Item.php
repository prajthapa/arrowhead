<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {

	public function __construct() {
        parent::__construct();

        $this->load->model(array('item_model'));
    }

    public function add_item() {
 		$data_header['active'] = 'user';
        $this->load->view('template/header', $data_header);
        if ($_POST) {
            $config = array(
                array(
                        'field' => 'item_name',
                        'label' => 'Item Name',
                        'rules' => 'trim|required|max_length[50]|is_unique[user.user_name]'
                ),
                array(
                        'field' => 'unit_type',
                        'label' => 'Unit Type',
                        'rules' => 'trim|max_length[50]'
                ),
                array(
                        'field' => 'unit_price',
                        'label' => 'Unit Price',
                        'rules' => 'trim|max_length[50]'
                )
            );
            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('items/addItem');
            } else {
                $data = array(
                    'item_name'     => $this->input->post('item_name'),
                    'unit_type'    => $this->input->post('unit_type'),
                    'unit_price'     => $this->input->post('unit_price')
                );
                $this->item_model->add_item($data);
                $this->session->set_flashdata('message', '<strong>Item Added Successfully.</strong>');
                redirect('item/list_item');    
            }
        } else {
            $this->load->view('items/addItem');
        }

        $this->load->view('template/footer');   	
    }

    public function list_item() {
        $data_header['active'] = 'user';
        $data['users'] = $this->item_model->get_items();
        $this->load->view('template/header', $data_header);
        $this->load->view('items/manageItem', $data);
        $this->load->view('template/footer');
    }

    public function edit_item($id) {
        $data_header['active'] = 'user';
        $this->load->view('template/header', $data_header);
        $data['user'] = $this->item_model->get_item($id);
        if ($_POST) {
            $config = array(
                array(
                        'field' => 'item_name',
                        'label' => 'Item Name',
                        'rules' => 'trim|required|max_length[50]'
                ),
                array(
                        'field' => 'unit_type',
                        'label' => 'Unit Type',
                        'rules' => 'trim|max_length[50]'
                ),
                array(
                        'field' => 'unit_price',
                        'label' => 'Unit Price',
                        'rules' => 'trim|max_length[50]'
                )
            );
            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('item/editItem', $data);
            } else {
                $data = array(
                    'item_name'     => $this->input->post('item_name'),
                    'unit_type'    => $this->input->post('unit_type'),
                    'unit_price' => $this->input->post('unit_price')
                );

                $this->item_model->update_item($data, $id);
                $this->session->set_flashdata('message', '<strong>User Successfully Updated.</strong>');
                redirect('item/list_item');
            }
        } else {
            $this->load->view('items/editItem', $data);
        }

        $this->load->view('template/footer');       
    }

    public function delete_item($id) {
        $this->item_model->delete_item($id);
        $this->session->set_flashdata('message', '<strong>User Successfully Deleted.</strong>');
        redirect('item/list_item');
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
}