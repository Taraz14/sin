<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('back/admin/M_laporan_nilai');
        $this->load->model('back/admin/M_siswa_nilai');

        if(!$this->session->userdata('id_user')){
            $this->session->set_flashdata('notif',
                '<div class="callout callout-danger">
                    <h4>Reminder!</h4>
                    <p>Anda Harus Login!</p>
                </div>'
            );
            redirect('login');
        }
    }

    public function index($siswa_nisn){
        $data = [
            'content' => 'back/admin/pages/v_laporan_nilai',
            'nilai'   => $this->_get_data_nilai($siswa_nisn),
            'nisn'    => $this->_get_nisn($siswa_nisn),
            'mapel'   => $this->_get_nilai($siswa_nisn),
            'avg'     => $this->_count_nilai($siswa_nisn)
        ];
        $this->load->view('back/admin/layout/wrap_layout', $data);
    }

    private function _get_nisn($siswa_nisn){
        return $this->M_laporan_nilai->get_detail_siswa($siswa_nisn);
    }

    private function _get_data_nilai($siswa_nisn){
        return $this->M_laporan_nilai->get_data_nilai($siswa_nisn);
    }

    private function _get_nilai($siswa_nisn){
        return $this->M_siswa_nilai->get_nilai($siswa_nisn);
    }

    private function _count_nilai($siswa_nisn){
        return $this->M_siswa_nilai->count_nilai($siswa_nisn);
    }

}

/* End of file Laporan.php */
