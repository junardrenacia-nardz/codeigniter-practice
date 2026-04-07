<?php

/**
 * @property Category_model $category_model
 * @property Category_model $category_model
 * @property CI_Form_validation $form_validation
 * @property CI_Session $session
 */

class Categories extends CI_Controller {
    public function index() {
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }

        $data['title'] = "Categories";
        $data['categories'] = $this->category_model->get_categories();

        $this->load->view('templates/header');
        $this->load->view('categories/category_index', $data);
        $this->load->view('templates/footer');
    }

    public function view($id = NULL, $name = NULL) {
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }

        $data['posts'] = $this->category_model->get_categories($id);
        $data['title'] = urldecode($name);

        $this->load->view('templates/header');
        $this->load->view('categories/category_view', $data);
        $this->load->view('templates/footer');
    }

    public function create() {
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }

        $data['title'] = 'Create Categories';

        $this->form_validation->set_rules('category', 'Category', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('categories/category_create', $data);
            $this->load->view('templates/footer');
        } else {
            $this->category_model->create_category();

            $this->session->set_flashdata('category_created', 'Your category has been created');
            redirect('categories');
        }
    }

    public function delete($id, $image) {
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }

        $this->category_model->delete_post_per_category($id, $image);
        $this->session->set_flashdata('category_post_deleted', 'The posts has been deleted');
        redirect('categories');
    }
}
