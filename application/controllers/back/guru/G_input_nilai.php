<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class G_input_nilai extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('back/guru/M_siswa');

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

    public function index($siswa_nisn){

        $data = [
            'content'   => 'back/guru/pages/v_input_nilai',
            'title'     => 'Input Nilai',
            'siswa_nisn'=> $this->_get_data_siswa($siswa_nisn),
            'mapel'     => $this->M_siswa->get_mapel(),
            'semester'  => $this->M_siswa->get_semester()
        ];
        $this->load->view('back/guru/layout/wrap_layout', $data, FALSE);
    }

    private function _get_data_siswa($siswa_nisn){
        return $this->M_siswa->get_detail_siswa($siswa_nisn);
    }

    // private function _get_data_kelas(){
    //     return $this->M_siswa->
    // }

    public function input_nilai(){
        $nip = $this->session->userdata('username');
        $input = $this->input->post();
        $nisn = $input['nisn'];
        $mapel = $this->M_siswa->get_mapel();
        
        $nilai = [];
            foreach ($mapel as $val) {
                $nil = $input['pelajaran'.$val->id_mapel];
                    if($nil < 62){
                        $nilai_predikat = 'D';
                    }
                    else if($nil >= 62 && $nil <= 74){
                        $nilai_predikat = 'C';
                    }
                    else if($nil >= 75 && $nil <= 87){
                        $nilai_predikat = 'B';
                    }
                    else if($nil >= 88){
                        $nilai_predikat = 'A';
                    }
                // var_dump($nilai_predikat);

                $tugas = $input['tugas'.$val->id_mapel];
                    if($tugas < 62){
                        $tugas_predikat = 'D';
                    }
                    else if($tugas >= 62 && $tugas <= 74){
                        $tugas_predikat = 'C';
                    }
                    else if($tugas >= 75 && $tugas <= 87){
                        $tugas_predikat = 'B';
                    }
                    else if($tugas >= 88){
                        $tugas_predikat = 'A';
                    }

                $uts = $input['uts'.$val->id_mapel];
                    if($uts < 62){
                        $uts_predikat = 'D';
                    }
                    else if($uts >= 62 && $uts <= 74){
                        $uts_predikat = 'C';
                    }
                    else if($uts >= 75 && $uts <= 87){
                        $uts_predikat = 'B';
                    }
                    else if($uts >= 88){
                        $uts_predikat = 'A';
                    }

                $uas = $input['uas'.$val->id_mapel];
                    if($uas < 62){
                        $uas_predikat = 'D';
                    }
                    else if($uas >= 62 && $uas <= 74){
                        $uas_predikat = 'C';
                    }
                    else if($uas >= 75 && $uas <= 87){
                        $uas_predikat = 'B';
                    }
                    else if($uas >= 88){
                        $uas_predikat = 'A';
                    }

                array_push($nilai, array(
                    'nisn'          => $input['nisn'],
                    'nip'           => $nip,
                    'id_mapel'      => $val->id_mapel,
                    'nilai'         => $nil,
                    'predikat_nilai'=> $nilai_predikat,
                    'tugas'         => $tugas,
                    'predikat_tugas'=> $tugas_predikat,
                    'uts'           => $uts,
                    'predikat_uts'  => $uts_predikat,
                    'uas'           => $uas,
                    'predikat_uas'  => $uas_predikat,
                    'sikap'         => $input['sikap'],
                    'kompetensi'    => $input['kompetensi'],
                    'keterampilan'  => $input['keterampilan'],
                    'id_semester'   => $input['semester'],
                    'catatan'       => $input['catatan'],
                    'tahun_ajaran'  => $input['ajar']
                )

            );

            $penilaian = array('penilaian' => 1);
        }
        $this->M_siswa->update_status_nilai($penilaian, $nisn);
        $this->M_siswa->insert_nilai($nilai);
        redirect('data_siswa');
        
        
    }

}

/* End of file G_input_nilai.php */
