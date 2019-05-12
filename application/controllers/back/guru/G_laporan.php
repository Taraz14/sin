<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class G_laporan extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('back/guru/M_laporan_nilai');
        $this->load->model('back/guru/M_siswa');

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
            'content' => 'back/guru/pages/v_laporan_nilai',
            'nilai'   => $this->_get_data_nilai($siswa_nisn),
            'nisn'    => $this->_get_nisn($siswa_nisn),
            'mapel'   => $this->_get_nilai($siswa_nisn),
            'avg'     => $this->_count_nilai($siswa_nisn)
        ];
        $this->load->view('back/guru/layout/wrap_layout', $data);
    }

    private function _get_nisn($siswa_nisn){
        return $this->M_laporan_nilai->get_detail_siswa($siswa_nisn);
    }

    private function _get_data_nilai($siswa_nisn){
        return $this->M_laporan_nilai->get_data_nilai($siswa_nisn);
    }

    private function _get_nilai($siswa_nisn){
        return $this->M_siswa->get_nilai($siswa_nisn);
    }

    private function _count_nilai($siswa_nisn){
        return $this->M_siswa->count_nilai($siswa_nisn);
    }

    // private function _get_avg($siswa_nisn){
    //     $nilai = $this->_get_nilai($siswa_nisn);
    //     $count_row = $this->_count_nilai($siswa_nisn);
    //     var_dump($nilai);
    // }

}

/* End of file G_laporan.php */
