<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_siswa extends CI_Controller {

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
            'content' => 'back/admin/pages/v_master_siswa',
            'count_all' =>	$this->_count_all(),
            // 'nisn'      => $this->_get_nisn(),
            'kelas'      => $this->_get_kelas()
        ];
        $this->load->view('back/admin/layout/wrap_layout', $data, FALSE);
    }

    private function _count_all(){
        return $this->M_siswa->count_all();
    }

    // private function _get_nisn(){
    //     return $this->M_siswa->nisn();
    // }

    private function _get_kelas(){
        return $this->M_siswa->kelas();
    }

    public function datatables(){
        $data = $this->M_siswa->get_datatable();
        $jsonOut = [];
        foreach ($data as $val) {
            $tempArr = [];
            $tempArr[] = htmlspecialchars($val->nisn, ENT_QUOTES, 'UTF-8');
            $tempArr[] = htmlspecialchars($val->nama_siswa, ENT_QUOTES, 'UTF-8');
            $tempArr[] = htmlspecialchars($val->nama_kelas, ENT_QUOTES, 'UTF-8');
            $tempArr[] = htmlspecialchars($val->tanggal_lahir, ENT_QUOTES, 'UTF-8');
            $tempArr[] = htmlspecialchars($val->alamat, ENT_QUOTES, 'UTF-8');
            $tempArr[] = htmlspecialchars($val->agama, ENT_QUOTES, 'UTF-8');
            $tempArr[] = htmlspecialchars($val->jenis_kelamin, ENT_QUOTES, 'UTF-8');
            $tempArr[] = htmlspecialchars($val->telepon, ENT_QUOTES, 'UTF-8');
            $tempArr[] = htmlspecialchars($val->tempat_lahir, ENT_QUOTES, 'UTF-8');
            $tempArr[] = htmlspecialchars($val->no_kk, ENT_QUOTES, 'UTF-8');
            $tempArr[] = htmlspecialchars($val->nama_ayah, ENT_QUOTES, 'UTF-8');
            $tempArr[] = htmlspecialchars($val->nama_ibu, ENT_QUOTES, 'UTF-8');
            $tempArr[] = htmlspecialchars($val->tahun_ajaran, ENT_QUOTES, 'UTF-8');
            $tempArr[] = '<td>
                            <a class="btn btn-warning" href="javascript:void(0)" title="edit onclick="edit_siswa('."'".$val->nisn."'".')"><i class="fa fa-pencil"></i></a>
                            <a class="btn btn-danger" href="javascript:void(0)" title="delete" onclick="delete_siswa('."'".$val->nisn."'".')"><i class="fa fa-times"></i></a>
                        </td>';

            array_push($jsonOut, $tempArr);
        }

        $output['draw']             = intval($this->input->get('draw'));
        $output['recordsTotal']     = $this->M_siswa->fetch_count();
        $output['recordsFiltered']  = $this->M_siswa->filter();
        $output['data']             = $jsonOut;

        echo json_encode($output);
    }

    public function ajax_delete($siswa_nisn){
        $this->M_siswa->delete_row($siswa_nisn);
        $this->M_siswa->delete_nilai($siswa_nisn);
        $this->M_siswa->delete_user_login($siswa_nisn);
        echo json_encode(array("status" => TRUE));
    }

    // public function ajax_bulk_delete($siswa_nisn){
    //     $list_nisn = $this->input->post('nisn');
    //     foreach ($list_nisn as $nisn) {
    //         $this->M_siswa->delete_row($siswa_nisn);
    //     }
    //     echo json_encode(array("status" => TRUE));
    // }

}

/* End of file Master_siswa.php */
