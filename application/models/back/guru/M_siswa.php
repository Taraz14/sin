<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_siswa extends CI_Model {
    
    private static $tb_siswa = 'tb_siswa';
    private static $tb_kelas = 'tb_kelas';
    private static $tb_kategori_kelas = 'tb_kategori_kelas';
    private static $tb_guru = 'tb_guru';
    private static $tb_nilai = 'tb_nilai';


    protected $select_column = [
        'tb_siswa.nisn',
        'tb_siswa.nama_siswa',
        'tb_siswa.tahun_ajaran',
        'tb_kategori_kelas.nama_kategori',
        'tb_kelas.nama_kelas',
        'tb_siswa.penilaian'
    ];
    
    protected $order_column = [
        'tb_siswa.nisn',
        'tb_siswa.nama_siswa',
        'tb_kelas.nama_kelas',
        'tb_kategori_kelas.nama_kategori',
        'tb_siswa.tahun_ajaran',
        'tb_siswa.penilaian'
    ];
    
    protected $nilai = [
        'tb_siswa.nisn',
        // 'tb_kelas.id_kelas',
        'tb_mapel.id_mapel',
        'tb_mapel.nama_mapel',
        'tb_semester.id_semester',
        'tb_guru.nip'
    ];

    protected $order_nilai = [
        'tb_siswa.nisn',
        'tb_kelas.id_kelas',
        'tb_mapel.id_mapel',
        'tb_mapel.nama_mapel',
        'tb_semester.id_semester',
        'tb_guru.id_guru'
    ];


    protected function data_siswa(){
        $nip = $this->session->userdata('username');

        $this->db->select($this->select_column);
        $this->db->from(self::$tb_kelas);
        $this->db->join('tb_guru', 'tb_kelas.nip ='.self::$tb_guru.'.nip');
        $this->db->join('tb_siswa', 'tb_kelas.id_kelas = '.self::$tb_siswa.'.id_kelas');
        $this->db->join('tb_kategori_kelas', 'tb_kategori_kelas.id_kategoriK = '.self::$tb_kelas.'.id_kategoriK', 'LEFT');
        $where = 'tb_kelas.nip = '.$nip;
        $this->db->where($where);
        // $this->db->group_by('tb_nilai.id_semester');
        
        if($_GET['search']['value']){
			$this->db->like('tb_siswa.nisn', $_GET['search']['value'])
					 ->or_like('tb_siswa.nama_siswa', $_GET['search']['value'])
					 ->or_like('tb_kelas.nama_kelas', $_GET['search']['value'])
					 ->or_like('tb_kategori_kelas.nama_kategori', $_GET['search']['value'])
					 ->or_like('tb_siswa.tahun_ajaran', $_GET['search']['value']);
        }
        
        if($this->input->get('nisn')){
            $nisn = "nisn = '".($this->input->get('nisn'))."'";
            $this->db->where($nisn);
        }

        if(isset($_GET['order'])){
			$this->db->order_by( $this->order_column[$_GET['order']['0']['column']], $_GET['order']['0']['dir'] );
        }

        else {
            $this->db->order_by('tb_siswa.id_kelas', 'desc');
        }
    }

    public function get_datatable(){
        $this->data_siswa();
        if ($this->input->get('length') !== 1) {
			$this->db->limit($this->input->get('length'), $this->input->get('start'));
		}
		$query = $this->db->get();
		return $query->result();
    }

    public function count_all(){
        return $this->db->get(self::$tb_kelas)->num_rows();
    }

    public function fetch_count(){
        $this->db->select('*');
        $this->db->from(self::$tb_siswa);
        $query = $this->db->get();
        return $this->db->count_all_results();
    }

    public function filter(){
        $this->data_siswa();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function nisn(){
        $nip = $this->session->userdata('username');

        $this->db->select($this->select_column);
        $this->db->from(self::$tb_kelas);
        $this->db->join('tb_guru', 'tb_kelas.nip ='.self::$tb_guru.'.nip');
        $this->db->join('tb_siswa', 'tb_kelas.id_kelas = '.self::$tb_siswa.'.id_kelas');
        $this->db->join('tb_kategori_kelas', 'tb_kategori_kelas.id_kategoriK = '.self::$tb_kelas.'.id_kategoriK', 'LEFT');
        $where = 'tb_kelas.nip = '.$nip;
        $this->db->where($where);
        $this->db->group_by('tb_siswa.nisn');
        return $this->db->get()->result();
    }

    public function get_detail_siswa($siswa_nisn){
        // $this->db->from();
        // $this->db->select('tb_siswa.nisn', 'tb_kelas.nama_kelas');
        $this->db->join('tb_kelas', 'tb_kelas.id_kelas = tb_siswa.id_kelas');
        $this->db->where('nisn', $siswa_nisn);
		return $this->db->get( self::$tb_siswa , 2)->result();
    }

    public function get_data_kelas(){
        return $this->db->get('tb_kelas')->result();
    }

    public function get_nisn(){
        return $this->db->get('tb_siswa')->result();
    }
    
    public function get_mapel(){
        return $this->db->get('tb_mapel')->result();
    }

    public function get_semester(){
        return $this->db->get('tb_semester')->result();
    }

    public function get_data_nilai($siswa_nisn){
        $this->db->select($this->nilai);
        $this->db->from('tb_nilai');
        $this->db->join('tb_siswa', 'tb_siswa.nisn = tb_nilai.nisn');
        // $this->db->join('tb_kelas', 'tb_kelas.id_kelas = tb_nilai.id_kelas');
        $this->db->join('tb_mapel', 'tb_mapel.id_mapel = tb_nilai.id_mapel');
        $this->db->join('tb_semester', 'tb_semester.id_semester = tb_nilai.id_semester');
        $this->db->join('tb_guru', 'tb_guru.nip = tb_nilai.nip');
        $this->db->where('tb_nilai.nisn', $siswa_nisn);
        return $this->db->get()->result();
    }

    public function get_guru(){
        return $this->db->get('tb_guru')->result();
    }

    public function get_nilai($siswa_nisn){
        $this->db->select('tb_mapel.id_mapel, tb_mapel.nama_mapel, tb_mapel.kkm, tb_nilai.nilai, tb_nilai.nisn, tb_nilai.tugas, tb_nilai.uts, tb_nilai.uas');
        $this->db->from('tb_nilai');
        $this->db->join('tb_mapel', 'tb_nilai.id_mapel = tb_mapel.id_mapel');
        $this->db->where('tb_nilai.nisn', $siswa_nisn);
        return $this->db->get()->result();
    }

    public function count_nilai($siswa_nisn){
        $this->db->select('AVG(nilai) AS avnilai, AVG(tugas) AS avgtugas, AVG(uts) AS avguts, AVG(uas) AS avguas');
        $this->db->where('nisn', $siswa_nisn);
        return $this->db->get('tb_nilai')->result();
    }

    public function insert_nilai($nilai){
        $this->db->insert_batch('tb_nilai', $nilai);
        $nilai['nisn'] = $this->db->insert_id();
    }

    public function update_status_nilai($penilaian, $nisn){
        $this->db->set('penilaian', '1', false);
        $this->db->where('nisn', $nisn);
        $this->db->update('tb_siswa', $penilaian);
    }

}

/* End of file Kelas_detail.php */
