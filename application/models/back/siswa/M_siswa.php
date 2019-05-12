<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_siswa extends CI_Model {

    private static $tb_nilai = 'tb_nilai';
    private static $tb_siswa = 'tb_siswa';
    private static $tb_guru = 'tb_guru';
    private static $tb_kelas = 'tb_kelas';
    private static $tb_semester = 'tb_semester';
    private static $tb_mapel = 'tb_mapel';

    // protected $select_column = [
    //     'tb_siswa.nisn',
    //     'tb_siswa.id_kelas',
    //     'tb_siswa.nama_siswa',
    //     'tb_siswa.tanggal_lahir',
    //     'tb_siswa.alamat',
    //     'tb_siswa.agama',
    //     'tb_siswa.jenis_kelamin',
    //     'tb_siswa.telepon',
    //     'tb_siswa.tempat_lahir',
    //     'tb_siswa.nama_ayah',
    //     'tb_siswa.nama_ibu',
    //     'tb_siswa.tahun_ajaran',
    //     'tb_kelas.nama_kelas'
    // ];

    // protected $order_column = [
    //     'tb_siswa.nisn',
    //     'tb_siswa.id_kelas',
    //     'tb_kelas.nama_kelas',
    //     'tb_siswa.nama_siswa',
    //     'tb_siswa.tanggal_lahir',
    //     'tb_siswa.alamat',
    //     'tb_siswa.agama',
    //     'tb_siswa.jenis_kelamin',
    //     'tb_siswa.telepon',
    //     'tb_siswa.tempat_lahir',
    //     'tb_siswa.nama_ayah',
    //     'tb_siswa.nama_ibu',
    //     'tb_siswa.tahun_ajaran'
    // ];

    public function profile($nisn){
        $this->db->join(self::$tb_kelas, 'tb_siswa.id_kelas = '.self::$tb_kelas.'.id_kelas');
        $this->db->where('nisn', $nisn);
        return $this->db->get(self::$tb_siswa)->row();
    }

    public function jika_belum_dinilai($nisn){
        // $this->db->join(self::$tb_kelas, 'tb_siswa.id_kelas = '.self::$tb_kelas.'.id_kelas');
        $this->db->where('nisn', $nisn);
        return $this->db->get(self::$tb_nilai)->row();
    }

    public function data_siswa($nisn){
        $this->db->join(self::$tb_kelas, 'tb_siswa.id_kelas = '.self::$tb_kelas.'.id_kelas');
        $this->db->where('tb_siswa.nisn', $nisn);
        return $this->db->get(self::$tb_siswa, 1)->result();
    }

    public function nilai($nisn){
        $this->db->join(self::$tb_siswa, 'tb_nilai.nisn = '.self::$tb_siswa.'.nisn')
                 ->join(self::$tb_guru, 'tb_nilai.nip = '.self::$tb_guru.'.nip')
                 ->join(self::$tb_semester, 'tb_nilai.id_semester = '.self::$tb_semester.'.id_semester')
                 ->join(self::$tb_mapel, 'tb_nilai.id_mapel = '.self::$tb_mapel.'.id_mapel');
        $this->db->where('tb_nilai.nisn', $nisn);
        return $this->db->get(self::$tb_nilai)->result();
    }

    public function avg($nisn){
        $this->db->select('AVG(nilai) AS avnilai, AVG(tugas) AS avgtugas, AVG(uts) AS avguts, AVG(uas) AS avguas');
        $this->db->where('nisn', $nisn);
        return $this->db->get(self::$tb_nilai)->result();
    }

    public function pribadi($nisn){
        $this->db->select('sikap, kompetensi, keterampilan, catatan');
        $this->db->from(self::$tb_nilai);
        $this->db->where('nisn', $nisn);
        return $this->db->get()->result();
    }

    public function upload_foto($data){
        $nisn = $this->session->userdata('username');
        // $this->db->set('foto', $data, false);
        $this->db->where('nisn', $nisn);
        $this->db->update(self::$tb_siswa, $data);
    }

}

/* End of file M_siswa.php */
