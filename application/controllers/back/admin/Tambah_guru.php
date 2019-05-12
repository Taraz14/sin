<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tambah_guru extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('back/admin/M_kelas');
        $this->load->model('back/guru/M_guru');
        
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
            'content' => 'back/admin/pages/v_tambah_guru',
            'kelas' => $this->_get_kelas_detail()
        ];
        $this->load->view('back/admin/layout/wrap_layout', $data);
    }

    private function _get_kelas_detail(){
        return $this->M_kelas->kelas();
    }

    public function input_guru(){
        $id_admin = $this->session->userdata('id_user');
        $input = $this->input->post();

        $input_guru = array(
            'nip'           => $input['nip'],
            'id_kelas'      => $input['kelas'],
            'nama_guru'     => $input['nama'],
            'alamat'        => $input['alamat'],
            'status'        => $input['status'],
            'jenis_kelamin' => $input['jk'],
            'telepon'       => $input['telp'],
            'email'         => $input['email'],
            'jabatan'       => $input['jabatan']
        );

        $login_guru = array(
            'username'       => $input['nip'],
            'password'      =>  md5($input['nip']),
            'level'         => 'guru'
        );

        $this->M_guru->input_guru($input_guru);
        $this->M_guru->input_log_guru($login_guru);
        redirect('master_guru');
    }

}

/* End of file Tambah_guru.php */
