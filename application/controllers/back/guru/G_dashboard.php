<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class G_dashboard extends CI_Controller {

    function __construct(){
        parent::__construct();
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
        $data = [
            'content' => 'back/guru/pages/v_dashboard'
        ];
        $this->load->view('back/guru/layout/wrap_layout', $data);
    }
}

/* End of file G_dashboard.php */
