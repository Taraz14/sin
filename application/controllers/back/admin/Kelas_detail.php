<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas_detail extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('back/admin/M_kelas_detail');
        
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
        $id_kelas = $this->session->userdata('id_kelas');
        // var_dump($id_kelas);

        $data = [
            'content' => 'back/admin/pages/v_kelas_detail',
            'count_all' =>	$this->_count_all()
        ];
        $this->load->view('back/admin/layout/wrap_layout', $data);
    }

    private function _count_all(){
        return $this->M_kelas_detail->count_all();
    }

    public function datatables(){
        $data = $this->M_kelas_detail->get_datatable();
        $jsonOut = [];
        foreach ($data as $val) {
            $tempArr = [];
            $tempArr[] = htmlspecialchars($val->nisn, ENT_QUOTES, 'UTF-8');
            $tempArr[] = htmlspecialchars($val->nama_siswa, ENT_QUOTES, 'UTF-8');
            $tempArr[] = htmlspecialchars($val->nama_kategori, ENT_QUOTES, 'UTF-8');
            $tempArr[] = htmlspecialchars($val->nama_kelas, ENT_QUOTES, 'UTF-8');
            $tempArr[] = htmlspecialchars($val->tahun_ajaran, ENT_QUOTES, 'UTF-8');
            $tempArr[] = '<a href="'.site_url('rapor').'" class="btn btn-default"><i class="fa fa-file-text"></i> Cetak Rapor</a>';

            array_push($jsonOut, $tempArr);
        }

        $output['draw']             = intval($this->input->get('draw'));
        $output['recordsTotal']     = $this->M_kelas_detail->fetch_count();
        $output['recordsFiltered']  = $this->M_kelas_detail->filter();
        $output['data']             = $jsonOut;

        echo json_encode($output);
    }


}

/* End of file Kelas_detail.php */
