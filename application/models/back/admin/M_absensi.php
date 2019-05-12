<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_absensi extends CI_Model {

    private static $tb_absensi = 'tb_absensi';
    private static $tb_siswa = 'tb_siswa';

    public function show_siswa(){
        $this->db->select('*');
        $this->db->from(self::$tb_siswa);
        $this->db->group_by('nisn');
        return $this->db->get()->result();
    }

    public function input_absensi($input_absen){
        return $this->db->insert(self::$tb_absensi, $input_absen);
    }

}

/* End of file M_absensi.php */
