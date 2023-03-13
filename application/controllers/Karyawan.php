<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->library('datatables');
        $this->load->model('Karyawan_model');
    }

	public function index()
	{
		$this->load->view('karyawan_view');
	}

    function getindex(){
        $list = $this->Karyawan_model->fetchtable();
        echo "<pre>";
        print_r($list);
        echo "</pre>";
        exit();
        $this->load->view('karyawan_view');
    }

	public function ajax_list()
	{
        $data = [];
        $result = $this->Karyawan_model->listDataTables();
        // print_r($result);exit;
        foreach (json_decode($result)->aaData as $val) {
            
            $buttons = '';
            $data[] = array(
                    $val[0],
                    $val[1],
                    $val[2],
                    $buttons
                );
        }

        // print_r($data);exit;
        $output = array(
            'draw' => json_decode($result)->sEcho,
            'recordsTotal' => json_decode($result)->iTotalRecords,
             'recordsFiltered' => json_decode($result)->iTotalDisplayRecords,
            'data' => $data
          );
         
          echo json_encode($output); 
          return json_encode($output); 

        // return print_r($this->datatables->generate('json', 'ISO-8859-1'));
	}

    function insert_dumy(){
        // jumlah data yang akan di insert
        $jumlah_data = 1000;
        for ($i=1;$i<=$jumlah_data;$i++){
            $data   =   array(
                "nama_lengkap"  =>  "Karyawan Ke-".$i,
                "email"         =>  "karyawan-$i@gmil.com",
                "no_hp"         =>  '089699935552',
                "foto"          =>  "foto-karyawan-$i.jpg");
            $this->db->insert('tbl_karyawan',$data); 
        }
        echo $i.' Data Berhasil Di Insert';
    }

}
