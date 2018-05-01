<?php 
defined('BASEPATH') or exit('No direct script access allowed'); 

class Category extends CI_Controller{ 
 public function __construct() 
 { 
  parent::__construct(); 

  // Load custom helper applications/helpers/MY_helper.php 

  // Load semua model yang kita pakai 
  $this->load->model('blog_model'); 
  $this->load->model('Category_model'); 
 } 

 public function index()  
 { 

  // Judul Halaman 
  $data['page_title'] = 'List Kategori'; 

  // Dapatkan semua kategori 
  $data['categories'] = $this->Category_model->get_all_categories(); 
  $this->load->view('Cat_create', $data); 
 } 
 

 public function create()  
 { 
  // Judul Halaman 
  $data['page_title'] = 'Buat Kategori Baru'; 

  // Form validasi untuk Nama Kategori 
  $this->form_validation->set_rules( 
   'cat_name', 
   'Nama Kategori', 
   'required|is_unique[categories.cat_name]', 
   array( 
    'required' => 'Isi %s donk, males amat.', 
    'is_unique' => 'Judul <strong>' . $this->input->post('cat_name') . '</strong> sudah ada bosque.' 
   ) 
  ); 

  if($this->form_validation->run() === FALSE){ 
   $this->load->view('templates/header'); 
   $this->load->view('categories/cat_create', $data); 
   $this->load->view('templates/footer'); 
  } else { 
   $this->Category_model->create_category(); 
   redirect('category'); 
 }
}
  public function view()
  {
     $data['dataKategori']=$this->Category_model->get_all_categories();
     $this->load->view('cat_view', $data);
  }
  
}
?>