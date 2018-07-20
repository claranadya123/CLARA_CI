<?php 
defined('BASEPATH') or exit('No direct script access allowed'); 

class Level extends CI_Controller { 
 public function __construct() 
 { 
  parent::__construct();  
  $this->load->model('Level_model'); 
 } 

 public function index()  
 { 

  // Judul Halaman 
  $data['page_title'] = 'List Level'; 

  // Dapatkan semua kategori 
  $data['level'] = $this->Level_model->get_all_level(); 
  $this->load->view('level_view', $data); 
 } 
 

 public function create()  
 { 
  // Judul Halaman 
  $data['page_title'] = 'Tambah Level Baru'; 

  // Form validasi untuk Nama Kategori 
  $this->form_validation->set_rules( 
   'nama_level',
   'Nama Level',
   'required|is_unique[level.nama_level]', 
   array( 
    'required' => 'Isi %s donk, males amat.', 
    'is_unique' => 'Judul <strong>' . $this->input->post('nama_level') . '</strong> sudah ada bosque.' 
   )
  ); 

  if($this->form_validation->run() === FALSE){ 
   $this->load->view('header'); 
   $this->load->view('level_create', $data); 
   $this->load->view('footer'); 
  } else { 
   $this->Level_model->create_level(); 
   redirect('level'); 
 }
}
  public function view()
  {
     $data['dataKategori']=$this->Category_model->get_all_categories();
     $this->load->view('cat_view', $data);
  }
  
 public function edit($id = NULL)
  {
    // cek apakah id kosong atau tidak
    if ( empty($id) || !$data['level'] ) redirect('level');
      // $this->load->helper('form');
      // meload library form_validation
      $this->load->library('form_validation');

      // validasi input
      $this->form_validation->set_rules('nama_level', 'Nama Level', 'required',
      array('required' => 'Isi %s donk, males amat.'));

      // Cek apakah input valid atau tidak
      if ($this->form_validation->run() === FALSE)
      {
          $this->load->view('level_edit', $data);
      } else {
        $post_data = array(
            'nama_level' => $this->input->post('nama_level')
        );
        if ($this->Level_model->edit($post_data, $id)) {
          redirect('level'); 
        } else {
          $this->load->view('level_edit', $data);
        }
      }
  }
  
  public function delete($id)
  {
    $this->Level_model->delete($id);
    redirect('level');
  }
}
?>