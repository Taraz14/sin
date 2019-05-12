<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('back/admin/M_absensi');
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
        $data = [
            'content' => 'back/admin/pages/v_absensi',
            'siswa' => $this->_get_siswa()
        ];
        $this->load->view('back/admin/layout/wrap_layout', $data);
    }

    public function _get_siswa(){
        return $this->M_absensi->show_siswa();
    }

    public function input_absensi(){
        $id_admin = $this->session->userdata('id_user');
        $input = $this->input->post();

        $input_absen = array(
            'nisn'  => $input['siswa'],
            'sakit' => $input['sakit'],
            'ijin'  => $input['ijin'],
            'tanpa_keterangan' => $input['tk'],
            'semester'  => $input['semester']
        );

        $this->M_absensi->input_absensi($input_absen);
        redirect('absensi');
        
    }

}

/* End of file Absensi.php */
