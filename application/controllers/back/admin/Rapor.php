<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rapor extends CI_Controller {

    function __construct(){
        parent::__construct();
        // $this->load->model('back/admin/M_siswa');
        
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
            'content' => 'back/admin/pages/v_rapor'
        ];
        $this->load->view('back/admin/layout/wrap_layout', $data);
    }

}

/* End of file Rapor.php */
