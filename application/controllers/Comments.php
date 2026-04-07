<?php

/**
 * @property Post_model $post_model
 * @property Comment_model $comment_model
 * @property CI_Form_validation $form_validation
 * @property CI_Input $input
 * @property CI_Session $session
 */

class Comments extends CI_Controller {
    public function create($post_id) {
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }

        $slug = $this->input->post('slug');
        $data['post'] = $this->post_model->get_posts($slug);
        $post_id = $data['post']['post_id'];
        $data['comments'] = $this->comment_model->get_comment($post_id);

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('body', 'Body', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('posts/view', $data);
            $this->load->view('templates/footer');
        } else {
            $this->comment_model->create_comment($post_id);
            redirect('posts/' . $slug);
        }
    }
}
