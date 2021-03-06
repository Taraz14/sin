<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sikap extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('back/admin/M_pengembangan');
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
            'content' => 'back/admin/pages/v_sikap',
            'siswa' => $this->_get_siswa()
        ];

        $this->load->view('back/admin/layout/wrap_layout', $data);
    }

    public function _get_siswa(){
        return $this->M_pengembangan->show_siswa();
    }

    public function input_sikap(){
        $input = $this->input->post();


    }

}

/* End of file Akhlak.php */
