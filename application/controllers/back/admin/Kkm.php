<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kkm extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('back/admin/M_kkm');
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
            'content' => 'back/admin/pages/v_kkm',
            'mapel' => $this->_get_mapel()
        ];
        $this->load->view('back/admin/layout/wrap_layout', $data);
    }

    public function _get_mapel(){
        return $this->M_kkm->show_mapel();
    }

    public function input_kkm(){
        $id_admin = $this->session->userdata('id_user');
        $input = $this->input->post();

        $input_kkm = array(
            'id_mapel'  => $input['mapel'],
            'nilai_kkm' => $input['nilai_kkm'],
            'tahun_ajaran' => $input['tahun_ajaran']
        );

        $this->M_kkm->input_kkm($input_kkm);
        redirect('kkm');
        
    }

}

/* End of file KKM.php */
