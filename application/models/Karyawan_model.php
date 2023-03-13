<?php
 
class Karyawan_model extends CI_Model {
 
    var $table = 'tbl_karyawan'; //nama tabel dari database

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function fetchtable()  
    {  
        $query = $this->db->get('tbl_karyawan');
        return $query->result();  
        // $query = $this->db->from($this->table);
        // return $query->count_all_results();
    }

    function listDataTables()
    {
        $this->datatables->select('*');
        $this->datatables->from('tbl_karyawan');
        $results = $this->datatables->generate('raw');

        return $results; 
    }
 
}