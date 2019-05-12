<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_guru extends CI_Controller {

    function __construct(){
        parent::__construct();
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
            'content' => 'back/admin/pages/v_master_guru',
            'count_all' =>	$this->_count_all()
        ];
        $this->load->view('back/admin/layout/wrap_layout', $data);
    }

    private function _count_all(){
        return $this->M_guru->count_all();
    }

    public function datatables(){
        $data = $this->M_guru->get_datatable();
        $jsonOut = [];
        foreach ($data as $val) {
            $tempArr = [];
            $tempArr[] = htmlspecialchars($val->nip, ENT_QUOTES, 'UTF-8');
            $tempArr[] = htmlspecialchars($val->nama_guru, ENT_QUOTES, 'UTF-8');
            $tempArr[] = htmlspecialchars($val->alamat, ENT_QUOTES, 'UTF-8');
            $tempArr[] = htmlspecialchars($val->status, ENT_QUOTES, 'UTF-8');
            $tempArr[] = htmlspecialchars($val->jenis_kelamin, ENT_QUOTES, 'UTF-8');
            $tempArr[] = htmlspecialchars($val->telepon, ENT_QUOTES, 'UTF-8');
            $tempArr[] = htmlspecialchars($val->email, ENT_QUOTES, 'UTF-8');
            $tempArr[] = htmlspecialchars($val->jabatan, ENT_QUOTES, 'UTF-8');
            $tempArr[] = '<td>
                                <a class="btn btn-warning" href="javascript:void(0)" title="edit onclick="edit_guru('."'".$val->nip."'".')"><i class="fa fa-pencil"></i></a>
                                <a class="btn btn-danger" href="javascript:void(0)" title="delete" onclick="delete_guru('."'".$val->nip."'".')"><i class="fa fa-times"></i></a>
                            </td>';
            array_push($jsonOut, $tempArr);
        }

        $output['draw']             = intval($this->input->get('draw'));
        $output['recordsTotal']     = $this->M_guru->fetch_count();
        $output['recordsFiltered']  = $this->M_guru->filter();
        $output['data']             = $jsonOut;

        echo json_encode($output);
    }

    public function ajax_delete_row($nip){
        $this->M_guru->delete_row($nip);
        $this->M_guru->delete_user_row($nip);
        echo json_encode(array("status" => TRUE));
    }

}

/* End of file Master_guru.php */
