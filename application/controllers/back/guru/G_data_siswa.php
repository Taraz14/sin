<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class G_data_siswa extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('back/guru/M_siswa');
        $this->load->model('back/guru/M_laporan_nilai');

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
            'content' => 'back/guru/pages/v_data_siswa',
            'count'   => $this->_count_all(),
            'nisn'    => $this->_get_nisn()
        ];
        $this->load->view('back/guru/layout/wrap_layout', $data);
    }

    private function _count_all(){
        return $this->M_siswa->count_all();
    }

    private function _get_nisn(){
        return $this->M_siswa->nisn();
    }

    // private function _get_data_nilai($siswa_nisn){
    //     return $this->M_laporan_nilai->get_data_nilai($siswa_nisn);
    // }

    public function datatables(){
        // $nilai = $this->M_laporan_nilai->get_data_detail();
        $data = $this->M_siswa->get_datatable();
        $jsonOut = [];
        foreach ($data as $val) {
            $tempArr = [];
            $tempArr[] = htmlspecialchars($val->nisn, ENT_QUOTES, 'UTF-8');
            $tempArr[] = htmlspecialchars($val->nama_siswa, ENT_QUOTES, 'UTF-8');
            $tempArr[] = htmlspecialchars($val->nama_kategori, ENT_QUOTES, 'UTF-8');
            $tempArr[] = htmlspecialchars($val->nama_kelas, ENT_QUOTES, 'UTF-8');
            $tempArr[] = htmlspecialchars($val->tahun_ajaran, ENT_QUOTES, 'UTF-8');
            if($val->penilaian == 0){
                $tempArr[] = '<td>
                <a href="'.site_url('input_nilai/'.$val->nisn).'" class="btn btn-default"><i class="fa fa-list"></i> Input Nilai</a>
                </td>';
            }
            else {
                $tempArr[] = '<td>
                <a href="'.site_url('input_nilai/'.$val->nisn).'" class="btn btn-warning"><i class="fa fa-pencil"></i> Update Nilai</a>
                <a href="'.site_url('laporan/'.$val->nisn).'" class="btn btn-info"><i class="fa fa-file-text"></i> Laporan Nilai</a>
                </td>';
            }
            array_push($jsonOut, $tempArr);

        }

        $output['draw']             = intval($this->input->get('draw'));
        $output['recordsTotal']     = $this->M_siswa->fetch_count();
        $output['recordsFiltered']  = $this->M_siswa->filter();
        $output['data']             = $jsonOut;

        echo json_encode($output);
    }
}

/* End of file G_data_siswa.php */
