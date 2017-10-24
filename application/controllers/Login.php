<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
        parent::__construct();

        $this->load->model(array('login_model'));
    }

    public function login() {
 		$data_header['active'] = 'home';
        
        if ($_POST) {
            $config = array(
                array(
                        'field' => 'username',
                        'label' => 'Username',
                        'rules' => 'trim|required|max_length[50]'
                ),
                array(
                        'field' => 'password',
                        'label' => 'Password',
                        'rules' => 'trim|max_length[50]'
                )
            );
            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('login');
            } else {                    
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $user = $this->login_model->user_check($username, $password);
                if(count($user) == 1) {
                    //Success
                    // print_r($user);
                    $data = array(
                        'user_id' => $user->user_id,
                        'user_name' => $user->user_name,
                        'user_type' => $user->user_type
                    );

                    $this->session->set_userdata($data);

                    $this->load->view('template/header', $data_header);
                    
                    if($user->user_type == 'R') {
                        $this->load->view('home');
                    } else {
                        $this->load->view('dashboard');
                    }

                    $this->load->view('template/footer');
                } else {
                    $this->load->view('login');
                }
            }
        } else {
            $this->load->view('login');
        }   	
    }

    public function logout(){
        $array_items = array('user_id' => '', 'user_name' => '', 'user_type' => '');
        $this->session->unset_userdata($array_items);
        $this->load->view('login');
    }
}