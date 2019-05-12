<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('back/admin/M_siswa');
        
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
            'content' => 'back/admin/pages/v_dashboard',
            'kelas'   => $this->_get_data_kelas()
        ];
        $this->load->view('back/admin/layout/wrap_layout', $data);
    }

    private function _get_data_kelas(){
        return $this->M_siswa->kelas();
    }

    public function input_siswa(){
        $id_admin = $this->session->userdata('id_user');
        $input = $this->input->post();

        $input_siswa = array(
                'nisn'          => $input['nisn'],
                'id_kelas'      => $input['kelas'],
                'nama_siswa'    => $input['nama'],
                'tanggal_lahir' => $input['birth'],
                'agama'         => $input['agama'],
                'alamat'        => $input['alamat'],
                'jenis_kelamin' => $input['jk'],
                'telepon'       => $input['telp'],
                'tempat_lahir'  => $input['tempat_lahir'],
                'no_kk'         => $input['nokk'],
                'nama_ayah'     => $input['ayah'],
                'nama_ibu'      => $input['ibu'],
                'tahun_ajaran'  => $input['ajaran'],
                'penilaian'     => '0'
            
        );

        $login_siswa = array(
            'username'       => $input['nisn'],
            'password'      =>  md5($input['nisn']),
            'level'         => 'murid'
        );
        
        $this->M_siswa->input_siswa($input_siswa);
        $this->M_siswa->input_log_siswa($login_siswa);
        redirect('admin','refresh');
        $this->session->set_flashdata('notif',
        '<div class="alert alert-success alert-dismissible">
            <h4>Success</h4>
            <p>Data Siswa Berhasil diinput</p>
        </div>');
        
    
    }

}

/* End of file Dashboard.php */
