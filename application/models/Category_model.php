<?php

class Category_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function get_categories($id = FALSE) {
        $currentUser = $this->session->userdata('user_id');
        if ($id === FALSE) {
            $this->db->select("posts.id AS post_id, MAX(posts.user_id = {$currentUser}) AS has_user_post, 
                categories.id AS category_id, posts.post_image, posts.user_id, categories.name");
            $this->db->from('categories');
            $this->db->join('posts', 'posts.category_id = categories.id', 'left');
            $this->db->order_by("(user_id = {$currentUser})", "DESC");
            $this->db->group_by('categories.id');
            $query = $this->db->get();
            return $query->result_array();
        }

        $this->db->select('
        posts.id AS post_id,
        posts.category_id,
        posts.post_image,
        posts.image_orig_name,
        categories.id AS id_category,
        posts.body, posts.created_at, posts.slug, posts.title, categories.name AS category_name');
        $this->db->from('posts');
        $this->db->join('categories', 'categories.id = posts.category_id');
        $this->db->where(array(
            'categories.id' => $id,
            'user_id' => $this->session->userdata('user_id')
        ));
        $query = $this->db->get();
        return $query->result_array();
    }

    public function create_category() {
        $category = ucwords(strtolower($this->input->post('category')));

        $data['name'] = $category;

        return $this->db->insert('categories', $data);
    }

    public function delete_post_per_category($id, $image) {
        $this->db->where(array(
            'category_id' => $id,
            'user_id' => $this->session->userdata('user_id')
        ));

        $old_image = $image;
        if ($old_image != 'noimage.jpg') {
            unlink('./assets/images/posts/' . $old_image);
        }

        $this->db->delete('posts');
    }
}
