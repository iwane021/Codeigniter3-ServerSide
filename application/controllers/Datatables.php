<?php

    class Datatables extends CI_Controller
    {
        public function __construct()
        {  
            parent::__construct();
            $this->load->model('Datatables_model');
        }

        public function index()
        {
            $this->load->view('home_datatables');
        }

        public function onetable()
        {
            $this->load->view('datatables/onetable');

        }

        public function tablewhere()
        {
            $this->load->view('datatables/tablewhere');

        }

        public function tablequery()
        {
            $this->load->view('datatables/tablequery');

        }

        function view_data()
        {
            $tables = "tbl_article";
            $search = array('judul','kategori','penulis','tgl_posting');
            // jika memakai IS NULL pada where sql
            $isWhere = null;
            // $isWhere = 'tbl_article.deleted_at IS NULL';
            header('Content-Type: application/json');
            echo $this->Datatables_model->get_tables($tables,$search,$isWhere);
        }

        function view_data_where()
        {
            $tables = "tbl_article";
            $search = array('judul','kategori','penulis','tgl_posting');
            $where  = array('kategori' => 'php');
            // jika memakai IS NULL pada where sql
            $isWhere = null;
            // $isWhere = 'tbl_article.deleted_at IS NULL';
            header('Content-Type: application/json');
            echo $this->Datatables_model->get_tables_where($tables,$search,$where,$isWhere);
        }

        function view_data_query()
        {
            $query  = "SELECT tbl_kategori.nama_kategori AS nama_kategori, tbl_subkat.* FROM tbl_subkat 
                       JOIN tbl_kategori ON tbl_subkat.id_kategori = tbl_kategori.id_kategori";
            $search = array('nama_kategori','subkat','tgl_add');
            $where  = null; 
            // $where  = array('nama_kategori' => 'Tutorial');
            
            // jika memakai IS NULL pada where sql
            $isWhere = null;
            // $isWhere = 'tbl_article.deleted_at IS NULL';
            header('Content-Type: application/json');
            echo $this->Datatables_model->get_tables_query($query,$search,$where,$isWhere);
        }
    }
?>