<?php
class Post_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function get_posts($slug = FALSE) {
        if ($slug === FALSE) {
            $this->db->order_by('posts.id', 'DESC');
            $this->db->select('
            posts.id AS post_id,
            posts.category_id,
            posts.post_image,
            categories.id AS id_category,
            posts.body, posts.created_at, posts.slug, posts.title, categories.name AS category_name');
            $this->db->from('posts');
            $this->db->join('categories', 'categories.id = posts.category_id', 'left');
            $query = $this->db->get();
            return $query->result_array();
        }

        $this->db->select('
        posts.id AS post_id,
        posts.category_id,
        posts.post_image,
        categories.id AS id_category,
        posts.body, posts.created_at, posts.slug, posts.title, categories.name AS category_name');
        $this->db->from('posts');
        $this->db->join('categories', 'categories.id = posts.category_id');
        $this->db->where(array('posts.slug' => $slug));
        $query = $this->db->get();
        return $query->row_array();
    }

    public function create_post($post_image) {
        $slug = url_title(strtolower($this->input->post('title')));
        $data = [
            "title" => $this->input->post('title'),
            "slug" => $slug,
            "body" => $this->input->post('body'),
            "category_id" => $this->input->post('category'),
            'post_image' => $post_image
        ];

        return $this->db->insert('posts', $data);
    }

    public function delete_post($id) {
        $this->db->where('id', $id);
        $this->db->delete('posts');
        return true;
    }

    public function update_post() {
        $slug = url_title(strtolower($this->input->post('title')));
        $data = [
            "title" => $this->input->post('title'),
            "slug" => $slug,
            "body" => $this->input->post('body')
        ];

        $this->db->where('id', $this->input->post('id'));
        return $this->db->update('posts', $data);
    }

    public function get_categories() {
        $this->db->order_by('name', 'ASC');
        $query = $this->db->get('categories');
        return $query->result_array();
    }
}
