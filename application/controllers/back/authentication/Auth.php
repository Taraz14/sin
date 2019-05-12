<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('back/authentic/M_auth');
        
    }
    public function index(){
        $this->load->view('back/auth/v_login_page');
    }

    public function login(){
        $username   = $this->input->post('username', TRUE);
        $password   = $this->input->post('password', TRUE);
        $pass       = md5($password);
        $check      = $this->M_auth->check($username, $pass);

        if($check->num_rows() > 0){
            foreach ($check->result() as $val) {
                $row = array(
                    'user'      => TRUE,
                    'id_user'   => $val->id_user,
                    'username'  => $val->username,
                    'level'      => $val->level
                );
                $this->session->set_userdata($row);
            }

            if ($this->session->userdata('level') == 'admin') {
                redirect('laporan_nilai');
            }
            elseif ($this->session->userdata('level') == 'guru') {
                redirect('guru');
                
            }
            elseif($this->session->userdata('level') == 'murid'){
                redirect('murid');
                
            }
        }
        else{
            $this->session->set_flashdata('notif',
               '<div class="callout callout-danger">
                    <h4>Peringatan!</h4>
                    <p>Username atau Password salah!</p>
                </div>'
            );
            redirect('login');
        }
    }

    public function logout() {
		$this->session->sess_destroy();
		redirect('login');
	}

}

/* End of file Auth.php */
