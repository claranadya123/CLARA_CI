<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Home extends CI_Controller {

 	public function __construct()
 	{
 		parent:: __construct();
 		$this->load->model('category_model');
 	}
 
 	public function index()
 	{
 		$this->load->model('biodata');
 		$data['biodata_array'] = $this->biodata->getBiodataQueryArray();
 		$data['biodata_object'] = $this->biodata->getBiodataQueryObject();
 		$data['biodata_builder_array'] = $this->biodata->getBiodataBuilderArray();
 		$data['biodata_builder_object'] = $this->biodata->getBiodataBuilderObject();
 		$this->load->view('home',$data);		
 	}

 	public function keEditKategori()
 	{
 		$this->load->helper('form');
		$idKat = $this->input->post('edit');
		$data['detailKat'] = $this->category_model->getCategoryByID($idKat);
		$this->load->view('cat_edit', $data);
 	}

 	public function hapusKategori()
	{
		$cat_id = $this->input->post('delete');
		$cat_name = $this->input->post('cat_name');
		$this->category_model->deleteCategory($cat_id, $cat_name);
		redirect('category/view');
	}
 
 }
 
 /* End of file About.php */
 /* Location: ./application/controllers/About.php */ 
 ?>