<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan_nilai extends CI_Model {

    private static $tb_siswa = 'tb_siswa';
    private static $tb_kelas = 'tb_kelas';
    private static $tb_kategori_kelas = 'tb_kategori_kelas';
    private static $tb_guru = 'tb_guru';

    protected $select_column = [
        'tb_siswa.nisn',
        'tb_siswa.nama_siswa',
        'tb_siswa.tahun_ajaran',
        'tb_kategori_kelas.nama_kategori',
        'tb_kelas.nama_kelas'
    ];
    
    protected $order_column = [
        'tb_siswa.nisn',
        'tb_siswa.nama_siswa',
        'tb_kelas.nama_kelas',
        'tb_kategori_kelas.nama_kategori',
        'tb_siswa.tahun_ajaran',
    ];
    
    protected $nilai = [
        'tb_siswa.nisn',
        // 'tb_kelas.id_kelas',
        'tb_mapel.id_mapel',
        'tb_semester.id_semester',
        'tb_guru.nip'
    ];

    protected $order_nilai = [
        'tb_siswa.nisn',
        'tb_kelas.id_kelas',
        'tb_mapel.id_mapel',
        'tb_semester.id_semester',
        'tb_guru.id_guru'
    ];

    public function data_siswa(){
        $nip = $this->session->userdata('username');

        $this->db->select($this->select_column);
        $this->db->from(self::$tb_kelas);
        $this->db->join('tb_guru', 'tb_kelas.nip ='.self::$tb_kelas.'.nip');
        $this->db->join('tb_siswa', 'tb_kelas.id_kelas = '.self::$tb_siswa.'.id_kelas');
        $this->db->join('tb_kategori_kelas', 'tb_kategori_kelas.id_kategoriK = '.self::$tb_kelas.'.id_kategoriK', 'LEFT');
        $where = 'tb_kelas.nip = '.$nip;
        $this->db->where($where);
        $this->db->group_by('nisn');
        return $this->db->get()->result();
    }

    public function get_detail_siswa($siswa_nisn){
        $this->db->join('tb_kelas', 'tb_kelas.id_kelas = tb_siswa.id_kelas');
        $this->db->where('nisn', $siswa_nisn);
		return $this->db->get( self::$tb_siswa , 1)->result();
    }

    public function get_data_nilai($siswa_nisn){
        $this->db->join('tb_semester', 'tb_semester.id_semester = tb_nilai.id_semester');
        $this->db->join('tb_guru', 'tb_guru.nip = tb_nilai.nip');
        $this->db->where('nisn', $siswa_nisn);
        return $this->db->get('tb_nilai', 1)->result();
    }

    public function get_data_detail(){
        $this->db->join('tb_semester', 'tb_semester.id_semester = tb_nilai.id_semester');
        // $this->db->where('nisn');
        return $this->db->get('tb_nilai', 1)->result();
    }

}

/* End of file M_laporan_nilai.php */
