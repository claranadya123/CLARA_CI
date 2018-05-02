<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model
{

    public function __construct() 
    {
        parent::__construct();
    }

    public function get_all_categories()
    {
        // Urutkan berdasar abjad
        $this->db->order_by('cat_name');

        $query = $this->db->query('select * from categories');
        return $query->result_array();
    }

    public function getCategoryByID($idKat)
    {
        $query = $this->db->query("select * from categories where cat_id ='".$idKat."'");
        return $query->result_array();
    }

    public function create_category()
    {
        $data = array(
            'cat_name'          => $this->input->post('cat_name'),
            'cat_description'   => $this->input->post('cat_description')
        );

        return $this->db->insert('categories', $data);
    }

    public function edit($data, $id)
    {
        if(!empty($data) && !empty($id)){
            $update = $this->db->update('categories', $data, array('cat_id' =>$id));
        }else{
            return false;
        }
    }

    public function deleteCategory($cat_id, $cat_name)
    {
        $this->db->query("DELETE from categories where cat_id = ".$cat_id);
    }
    
}
?>