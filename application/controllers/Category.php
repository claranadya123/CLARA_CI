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
  
 public function edit($id = NULL)
  {
    // $data['category'] = $this->category_model->get_category_by_id($id);
    // cek apakah id kosong atau tidak
    if ( empty($id) || !$data['category'] ) redirect('blog');
      // $this->load->helper('form');
      // meload library form_validation
      $this->load->library('form_validation');
      // validasi input
      $this->form_validation->set_rules('cat_name', 'Nama Kategori', 'required',
      array('required' => 'Isi %s donk, males amat.'));
      $this->form_validation->set_rules('cat_description', 'Deskripsi', 'required');
      // Cek apakah input valid atau tidak
      if ($this->form_validation->run() === FALSE)
      {
          $this->load->view('cat_edit', $data);
      } else {
        $post_data = array(
            'cat_name' => $this->input->post('cat_name'),
            'cat_description' => $this->input->post('cat_description'),
        );
        if ($this->category_model->update_category($post_data, $id)) {
          redirect('cat_view'); 
        } else {
          $this->load->view('cat_edit', $data);
        }
      }
  }
  
  public function delete($id)
  {
    $data['page_title'] = 'Delete category';
    $this->category_model->delete_category($id);
    $this->load->view('templates/header');
    $this->load->view('blogs/blog_success', $data);
    $this->load->view('templates/footer');
  }
}
?>