<?php

/**
 * @property Post_model $post_model
 * @property Comment_model $comment_model
 * @property CI_Form_validation $form_validation
 * @property CI_Upload $upload
 * @property CI_Session $session
 * @property CI_DB $db
 * @property CI_Pagination $pagination
 */

class Posts extends CI_Controller {
    public function index($offset = 0) {
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }

        $user_id = $this->session->userdata('user_id');

        //Pagination
        $config['base_url'] = base_url() . 'posts/index';
        $this->db->from('posts');
        $this->db->where('user_id', $user_id);
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 3;
        $config['uri_segment'] = 3;
        // Produces: class="myclass"
        $config['attributes'] = array('class' => 'pagination-link');

        //Init Pagination
        $this->pagination->initialize($config);

        $data['title'] = 'Latest Posts';

        $data['posts'] = $this->post_model->get_posts(FALSE, $config['per_page'], $offset);

        $this->load->view('templates/header');
        $this->load->view('posts/index', $data);
        $this->load->view('templates/footer');
    }

    public function view($slug = NULL) {
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }

        $data['post'] = $this->post_model->get_posts($slug);
        $post_id = $data['post']['post_id'];
        $data['comments'] = $this->comment_model->get_comment($post_id);

        if (empty($data['post'])) {
            show_404();
        }

        $data['title'] = $data['post']['title'];

        $this->load->view('templates/header');
        $this->load->view('posts/view', $data);
        $this->load->view('templates/footer');
    }

    public function create() {
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }

        $data['title'] = 'Create Post';

        $data['categories'] = $this->post_model->get_categories();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('body', 'Body', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('posts/create', $data);
            $this->load->view('templates/footer');
        } else {
            //Upload Image
            $config['upload_path'] = './assets/images/posts';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['encrypt_name']  = TRUE;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('userfile')) {
                $errors = ['error' => $this->upload->display_errors()];
                $post_image = 'noimage.jpg';
            } else {
                // $data = ['upload_data' => $this->upload->data()];
                // $post_image = $_FILES['userfile']['name'];
                $uploadData = $this->upload->data();
                $post_image = $uploadData['file_name'];
                $origName = $uploadData['orig_name'];
            }

            $this->post_model->create_post($post_image, $origName);

            $this->session->set_flashdata('post_created', 'Your Post has been created');
            redirect('posts');
        }
    }

    public function delete($id, $image) {
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }

        $this->post_model->delete_post($id, $image);

        $this->session->set_flashdata('post_deleted', 'Your post has been deleted');
        redirect('posts');
    }

    public function edit($slug) {
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }

        $data['post'] = $this->post_model->get_posts($slug);
        $data['categories'] = $this->post_model->get_categories();

        if (empty($data['post'])) {
            show_404();
        }

        $data['title'] = "Edit " . $data['post']['title'];

        $this->load->view('templates/header');
        $this->load->view('posts/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update() {
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }

        //Upload Image
        $config['upload_path'] = './assets/images/posts';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name']  = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            $post_image = 'noimage.jpg';
        } else {
            // $data = ['upload_data' => $this->upload->data()];
            // $post_image = $_FILES['userfile']['name'];
            $uploadData = $this->upload->data();
            $post_image = $uploadData['file_name'];
            $origName = $uploadData['orig_name'];
        }
        $this->post_model->update_post($post_image, $origName);

        $this->session->set_flashdata('post_updated', 'Your post has been updated');
        redirect('posts');
    }
}
