<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Level_model extends CI_Model
{

    public function __construct() 
    {
        parent::__construct();
    }

    public function get_all_level()
    {
        // Urutkan berdasar abjad
        $this->db->order_by('id_level');

        $query = $this->db->query('select * from level');
        return $query->result_array();
    }

    public function getCategoryByID($idKat)
    {
        $query = $this->db->query("select * from categories where cat_id ='".$idKat."'");
        return $query->result_array();
    }

    public function create_level()
    {
        $data = array(
            'nama_level' => $this->input->post('nama_level'),
        );

        return $this->db->insert('level', $data);
    }

    public function edit($data, $id)
    {
        if(!empty($data) && !empty($id)){
            $update = $this->db->update('categories', $data, array('cat_id' =>$id));
        }else{
            return false;
        }
    }

    public function delete($id)
    {
        $this->db->query("DELETE from level where id_level = ".$id);
    }
    
}
?>