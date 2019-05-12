<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_kelas extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('back/admin/M_kelas');
        $this->load->model('back/admin/M_kelas_detail');
        $this->load->helper('url');
        
        if(!$this->session->userdata('id_user')){
            $this->session->set_flashdata('notif',
                '<div class="callout callout-danger">
                    <h4>Peringatan!</h4>
                    <p>Anda Harus Login!</p>
                </div>'
            );
            redirect('login');
        }
    }

    public function index(){
        $kel = $this->M_kelas_detail->kelas();
        foreach ($kel as $val) {
            $k = array('kelas' => $val->id_kelas);

            $this->session->set_userdata($k);
        }

        $data = [
            'content' => 'back/admin/pages/v_master_kelas',
            'count_all' =>	$this->_count_all()
        ];
        $this->load->view('back/admin/layout/wrap_layout', $data);
    }

    private function _count_all(){
        return $this->M_kelas->count_all();
    }

    public function datatables(){
        $data = $this->M_kelas->get_datatable();
        $jsonOut = [];
        foreach ($data as $val) {
            $tempArr = [];
            $tempArr[] = htmlspecialchars($val->id_kelas, ENT_QUOTES, 'UTF-8');
            $tempArr[] = '<a class="a" href="'.site_url('kelas_detail').'">'.htmlspecialchars($val->nama_kelas, ENT_QUOTES, 'UTF-8').'</a>';
            $tempArr[] = htmlspecialchars($val->nama_kategori, ENT_QUOTES, 'UTF-8');
            $tempArr[] = htmlspecialchars($val->jumlah_siswa, ENT_QUOTES, 'UTF-8');
            // $tempArr[] = '<a href="'.site_url('rapor').'" class="btn btn-default"><i class="fa fa-file-text"></i> Cetak Rapor</a>';

            array_push($jsonOut, $tempArr);
        }

        $output['draw']             = intval($this->input->get('draw'));
        $output['recordsTotal']     = $this->M_kelas->fetch_count();
        $output['recordsFiltered']  = $this->M_kelas->filter();
        $output['data']             = $jsonOut;

        echo json_encode($output);
    }


}

/* End of file Master_kelas.php */
