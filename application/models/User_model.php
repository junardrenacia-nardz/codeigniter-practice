<?php

class User_model extends CI_Model {
    public function register($hashed_pass) {
        $data = [
            'name' => $this->input->post('name'),
            'zipcode' => $this->input->post('zipcode'),
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'password' => $hashed_pass
        ];

        return $this->db->insert('users', $data);
    }

    public function login($password) {
        $username = $this->input->post('username');

        $this->db->where('username', $username);
        $result = $this->db->get('users');
        $row = $result->row();
        $password_stored = $row->password;

        if (password_verify($password, $password_stored)) {
            if ($result->num_rows() == 1) {
                return $result->row(0)->user_id;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }


    public function check_username_exists($username) {
        $query = $this->db->get_where('users', array('username' => $username));
        if (empty($query->row_array())) {
            return true;
        } else {
            return false;
        }
    }

    public function check_email_exists($email) {
        $query = $this->db->get_where('users', array('email' => $email));
        if (empty($query->row_array())) {
            return true;
        } else {
            return false;
        }
    }
}
