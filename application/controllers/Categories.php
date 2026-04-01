<?php

/**
 * @property Category_model $category_model
 */

class Categories extends CI_Controller {
    public function index() {
        $data['title'] = "Categories";
        $data['categories'] = $this->category_model->get_categories();

        $this->load->view('templates/header');
        $this->load->view('categories/category_index', $data);
        $this->load->view('templates/footer');
    }
}
