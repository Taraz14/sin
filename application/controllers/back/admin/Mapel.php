<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('back/admin/M_mapel');
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
            'content' => 'back/admin/pages/v_mapel'
        ];
        $this->load->view('back/admin/layout/wrap_layout', $data);
    }

    public function input_mapel(){
        $id_admin = $this->session->userdata('id_user');
        $input = $this->input->post();

        $input_mapel = array(
            'nama_mapel' => $input['nama_mapel'],
            'kkm'        => $input['kkm']
        );

        $this->M_mapel->input_mapel($input_mapel);
        redirect('mapel');
    }

}

/* End of file Mapel.php */
