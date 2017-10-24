<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() {
        parent::__construct();

        $this->load->model(array('user_model'));
    }

    public function create_user() {
 		$data_header['active'] = 'user';
        $this->load->view('template/header', $data_header);
        if ($_POST) {
            $config = array(
                array(
                        'field' => 'user_name',
                        'label' => 'Username',
                        'rules' => 'trim|required|max_length[50]|is_unique[user.user_name]'
                ),
                array(
                        'field' => 'user_password',
                        'label' => 'Password',
                        'rules' => 'trim|max_length[50]'
                ),
                array(
                        'field' => 'user_type',
                        'label' => 'Type',
                        'rules' => 'trim|max_length[50]'
                )
            );
            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('user/create');
            } else {
                $data = array(
                    'user_name'     => $this->input->post('user_name'),
                    'user_password'    => $this->input->post('user_password'),
                    'user_type'     => $this->input->post('user_type')
                );
                $this->user_model->create_user($data);
                $resdata = array(
                    'restaurant_name'     => $this->input->post('user_name'),
                    'created_by'    => $this->session->userdata['user_id']
                );
                $this->user_model->create_restaurant($resdata);
                $this->session->set_flashdata('message', '<strong>User Successfully Created.</strong>');
                redirect('user/list_user');    
            }
        } else {
            $this->load->view('user/create');
        }

        $this->load->view('template/footer');   	
    }

    public function list_user() {
        $data_header['active'] = 'user';
        $data['users'] = $this->user_model->get_users();
        $this->load->view('template/header', $data_header);
        $this->load->view('user/list', $data);
        $this->load->view('template/footer');
    }

    public function edit_user($id) {
        $data_header['active'] = 'user';
        $this->load->view('template/header', $data_header);
        $data['user'] = $this->user_model->get_user($id);
        if ($_POST) {
            $config = array(
                array(
                        'field' => 'user_name',
                        'label' => 'Username',
                        'rules' => 'trim|required|max_length[50]|callback_user_check[' . $id . ']'
                ),
                array(
                        'field' => 'user_email',
                        'label' => 'Email',
                        'rules' => 'trim|max_length[50]'
                ),
            );
            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('user/edit', $data);
            } else {
                $data = array(
                    'user_name'     => $this->input->post('user_name'),
                    'user_email'    => $this->input->post('user_email')
                );

                $this->user_model->update_user($data, $id);
                $this->session->set_flashdata('message', '<strong>User Successfully Updated.</strong>');
                redirect('user/list_user');
            }
        } else {
            $this->load->view('user/edit', $data);
        }

        $this->load->view('template/footer');       
    }

    public function delete_user($id) {
        $this->user_model->delete_user($id);
        $this->session->set_flashdata('message', '<strong>User Successfully Deleted.</strong>');
        redirect('user/list_user');
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

    public function dashboard() {
        $this->load->view('template/header');
        $this->load->view('dashboard');
        $this->load->view('template/footer');
    }
}