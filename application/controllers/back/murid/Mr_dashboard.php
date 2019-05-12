<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mr_dashboard extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('back/siswa/M_siswa');

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

    public function index(){
        $nisn = $this->session->userdata('username');

        $data = [
            'content' => 'back/murid/pages/v_dashboard',
            'profile' => $this->M_siswa->profile($nisn),
            'nisn'    => $this->_get_siswa($nisn),
            'nilai'   => $this->_get_nilai($nisn),
            'avg'     => $this->_get_avg($nisn),
            'pribadi' => $this->_get_pribadi($nisn),
            'belum_dinilai' => $this->_get_belum_dinilai($nisn)
        ];
        $this->load->view('back/murid/layout/wrap_layout', $data);
    }

    private function _get_siswa($nisn){
        return $this->M_siswa->data_siswa($nisn);
    }

    private function _get_nilai($nisn){
        return $this->M_siswa->nilai($nisn);
    }

    private function _get_avg($nisn){
        return $this->M_siswa->avg($nisn);
    }

    private function _get_pribadi($nisn){
        return $this->M_siswa->pribadi($nisn);
    }

    private function _get_belum_dinilai($nisn){
        return $this->M_siswa->jika_belum_dinilai($nisn);
    }

    public function update_foto(){
        $nisn = $this->session->userdata('username');
        $config = array(
            'upload_path'   => './assets/dist/img/profile/',
            'allowed_types' => 'jpg|JPG|jpeg|png',
            'max_size'      => '2048'
        );
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        
        if(!$this->upload->do_upload('profileImage')){
            $error = array('error' => $this->upload->display_errors());
            var_dump($error);
        }

        else{
            $foto = $this->upload->data();

            $data = array(
                'foto' => $foto['file_name']
            );
            
            $this->M_siswa->upload_foto($data);
            redirect('murid');
        }
        
    }

}

/* End of file Mr_dashboard.php */
