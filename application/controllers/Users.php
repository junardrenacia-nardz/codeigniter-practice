<?php

/**
 * @property CI_Form_validation $form_validation
 * @property CI_Input $input
 * @property User_Model $user_model
 * @property CI_Session $session
 */
class Users extends CI_Controller {
    public function register() {
        $data['title'] = 'Sign-Up';

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
        $this->form_validation->set_rules('zipcode', 'Zip Code', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('users/register', $data);
            $this->load->view('templates/footer');
        } else {
            $hashed_pass = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $this->user_model->register($hashed_pass);

            $this->session->set_flashdata('user_registered', 'You are now registered and can log in');
            redirect('posts');
        }
    }

    public function login() {
        $data['title'] = 'Login';

        $this->form_validation->set_rules('username', 'Username', 'required|callback_find_username');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('users/login', $data);
            $this->load->view('templates/footer');
        } else {

            $user_id = $this->user_model->login($this->input->post('password'));
            $username = $this->input->post('username');

            if ($user_id) {

                $user_data = [
                    'user_id' => $user_id,
                    'username' => $username,
                    'logged_in' => true
                ];

                $this->session->set_userdata($user_data);
                $this->session->set_flashdata('user_loggedin', 'You are now logged in');
                redirect('posts');
            } else {
                $this->session->set_flashdata('login_failed', 'Password is incorrect. Login is invalid');
                redirect('users/login');
            }
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        $this->session->set_flashdata('user_loggedout', 'You are now logged out');
        redirect('users/login');
    }

    function check_username_exists($username) {
        $this->form_validation->set_message(['check_username_exists' => 'That username is taken. Please choose a different one']);
        if ($this->user_model->check_username_exists($username)) {
            return true;
        } else {
            return false;
        }
    }

    function find_username($username) {
        $this->form_validation->set_message(['find_username' => 'That username does not exist']);
        if (!$this->user_model->check_username_exists($username)) {
            return true;
        } else {
            return false;
        }
    }


    function check_email_exists($email) {
        $this->form_validation->set_message(['check_email_exists' => 'That email is taken. Please choose a different one']);
        if ($this->user_model->check_email_exists($email)) {
            return true;
        } else {
            return false;
        }
    }
}
