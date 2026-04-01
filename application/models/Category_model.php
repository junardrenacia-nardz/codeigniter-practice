<?php

class Category_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function get_categories($id = FALSE) {
        if ($id === FALSE) {
            $this->db->order_by('name', 'DESC');
            $query = $this->db->get('categories');
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
        $this->db->where(array('categories.id' => $id));
        $query = $this->db->get();
        return $query->row_array();
    }
}
