<?php
defined('BASEPATH') OR exit('NO direct script accses allowed');
class Silab extends CI_Controller{
    function  __construct() { 
        parent :: __construct();
        $this->load->model('M_silab');
    }
   function beranda()
	{
		$data['content'] = '';
		$this->load->view('menu_utama');

			
	}
    
    public function navigasi()
	{
		$isi['content'] = 'admin/navigasi';
		$this->load->view('admin/tampilan_admin',$isi);

			
	}
    function daftar_lokasi($page=0){
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-left"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
        $data['title']="Latihan Table";
        $data['meta']="Ini adalah Produk Untuk Latihan Html";
        $config['total_rows']=$this->M_silab->page_lokasi();
        $config['per_page']=4;
        $config['base_url']=site_url('Silab/daftar_lokasi');
        $data['id_lokasi']=$this->M_silab->get_lokasi($config['per_page'],$page);
        $this->pagination->initialize($config);
        $data['content']='tabel_lokasi';
        $this->load->view('tampilan_admin', $data);
    }

    public function search_lokasi(){ //search lokasi
        $keyword = $this->input->post('keyword');
        $data['id_lokasi']=$this->M_silab->get_data_lokasi_keyword($keyword);
        $data['content']='tabel_lokasi';
        $this->load->view('tampilan_admin',$data);
    }
    public function search_prodi(){ //search lokasi
        $keyword = $this->input->post('keyword');
        $data['id_prodi']=$this->M_silab->get_data_prodi_keyword($keyword);
        $data['content']='tabel_prodi';
        $this->load->view('tampilan_admin',$data);
    }
    function register_lokasi(){
        $data['title']="Registrasi";
        $data['metta']="Ini adalah produk untuk latihan HTML";
        $data['content']='register_lokasi';
        $data['nama_prodi']=$this->M_silab->get_namaprodi();
        $this->load->view('tampilan_admin',$data);
    }
    function update_register_lokasi($id_lokasi){
        $data['title']="Registrasi";
        $data['metta']="Ini adalah produk untuk latihan HTML";
        $data['content']='register_lokasi';
        $this->db->where('md5(id_lokasi)',$id_lokasi);
        $data['id_lokasi']=$this->db->get('tb_lokasi')->row_array();
        $data['nama_prodi']=$this->M_silab->get_namaprodi();
        $this->load->view('tampilan_admin',$data);
    }
    public function delete_lokasi(){

		$key = $this->uri->segment(3);
		$this->db->where('id_lokasi',$key);
		$query =$this->db->get('tb_lokasi');
		if($query->num_rows()>0)
		{
			$this->M_silab->getdelete_lokasi($key);
		}
		redirect('Silab/daftar_lokasi');
    }

    function save_register_lokasi(){
        if($_POST['id_lokasi']!=''){
            $this->M_silab->save_update_registerlokasi($_POST);
        }else{
        $this->M_silab->save_register_lokasi($_POST);
        
    }
    redirect('Silab/daftar_lokasi');
    }


    function daftar_aset($page=0){
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-left"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
        $data['title']="Latihan Table";
        $data['meta']="Ini adalah Produk Untuk Latihan Html";
        $config['total_rows']=$this->M_silab->page_aset();
        $config['per_page']=4;
        $config['base_url']=site_url('Silab/daftar_aset');
        $data['kode_aset']=$this->M_silab->get_aset($config['per_page'],$page);
        $this->pagination->initialize($config);
        $data['content']='tabel_aset';
        $this->load->view('tampilan_admin', $data);
    }
    function register_aset(){
        $data['title']="Registrasi";
        $data['metta']="Ini adalah produk untuk latihan HTML";
        $data['content']='register_aset';
        $data['nama_lab']=$this->M_silab->get_namalab();
        $this->load->view('tampilan_admin',$data);
    }
    function update_register_aset($kode_aset){
        $data['title']="Registrasi";
        $data['metta']="Ini adalah produk untuk latihan HTML";
        $data['content']='register_aset';
        $this->db->where('md5(kode_aset)',$kode_aset);
        $data['kode_aset']=$this->db->get('tb_aset')->row_array();
        $data['nama_lab']=$this->M_silab->get_namalab();
        $this->load->view('tampilan_admin',$data);
    }
    public function delete_aset(){

		$key = $this->uri->segment(3);
		$this->db->where('kode_aset',$key);
		$query =$this->db->get('tb_aset');
		if($query->num_rows()>0)
		{
			$this->M_silab->getdelete_aset($key);
		}
		redirect('Silab/daftar_aset');
    }

    function save_register_aset(){
        if($_POST['kode_aset']!=''){
            $this->M_silab->save_update_registeraset($_POST);
        }else{
        $this->M_silab->save_registeraset($_POST);
    }
    redirect('Silab/daftar_aset');
    }

    function daftar_prodi($page=0){
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-left"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
        $data['title']="Latihan Table";
        $data['meta']="Ini adalah Produk Untuk Latihan Html";
        $config['total_rows']=$this->M_silab->page_prodi();
        $config['per_page']=4;
        $config['base_url']=site_url('Silab/daftar_prodi');
        $data['id_prodi']=$this->M_silab->get_prodi($config['per_page'],$page);
        $this->pagination->initialize($config);
        $data['content']='tabel_prodi';
        $this->load->view('tampilan_admin', $data);
    }
    function register_prodi(){
        $data['title']="Registrasi";
        $data['metta']="Ini adalah produk untuk latihan HTML";
        $data['content']='register_prodi';
        $this->load->view('tampilan_admin',$data);
    }
    function update_register_prodi($id_prodi){
        $data['title']="Registrasi";
        $data['metta']="Ini adalah produk untuk latihan HTML";
        $data['content']='register_prodi';
        $this->db->where('md5(id_prodi)',$id_prodi);
        $data['id_prodi']=$this->db->get('tb_prodi')->row_array();
        $this->load->view('tampilan_admin',$data);
    }
    public function delete_prodi(){

		$key = $this->uri->segment(3);
		$this->db->where('id_prodi',$key);
		$query =$this->db->get('tb_prodi');
		if($query->num_rows()>0)
		{
			$this->M_silab->getdelete_prodi($key);
		}
		redirect('Silab/daftar_prodi');
	}
    function save_register_prodi(){
        if($_POST['id_prodi']!=''){
            $this->M_silab->save_update_registerprodi($_POST);
        }else{
        $this->M_silab->save_register_prodi($_POST);
        
    }
    redirect('Silab/daftar_prodi');
    }
}