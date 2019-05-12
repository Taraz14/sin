<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tambah_kelas extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('back/admin/M_kelas');
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
            'content' => 'back/admin/pages/v_tambah_kelas',
            'kategori'  => $this->_get_kategori(),
            'guru'      => $this->_get_guru_wali()
        ];
        $this->load->view('back/admin/layout/wrap_layout', $data);
    }

    private function _get_kategori(){
        return $this->M_kelas->kategori();
    }

    private function _get_guru_wali(){
        return $this->M_kelas->guru_wali();
    }

    public function input_kelas(){
        $id_admin = $this->session->userdata('id_user');
        $input = $this->input->post();

        $input_kelas = array(
            'id_kelas'  =>  $input['id_kelas'],
            'nip'       => $input['wali'],
            'id_kategoriK' => $input['kateg'],
            'nama_kelas' => $input['kelas'],
            'jumlah_siswa' => $input['jumlah_siswa']
        );

        $this->M_kelas->input_kelas($input_kelas);
        redirect('kelas');
    }

}

/* End of file Kelas.php */
