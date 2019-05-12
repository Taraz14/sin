<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Kelas_detail extends CI_Model {
    
    private static $tb_siswa = 'tb_siswa';
    private static $tb_kelas = 'tb_kelas';
    private static $tb_kategori_kelas = 'tb_kategori_kelas';

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

    protected function kelas_detail(){
        $id_kelas = $this->session->userdata('id_kelas');

        $this->db->select($this->select_column);
        $this->db->from(self::$tb_siswa);
        $this->db->join('tb_kelas', 'tb_kelas.id_kelas = '.self::$tb_siswa.'.id_kelas', 'LEFT');
        $this->db->join('tb_kategori_kelas', 'tb_kategori_kelas.id_kategoriK = '.self::$tb_kategori_kelas.'.id_kategoriK', 'LEFT');
        // $where_kelas = "tb_siswa.id_kelas = '".$id_kelas."'";
        // $this->db->where($where_kelas);
        $this->db->group_by('nisn');
        

        if($this->input->get('kategori')){
            $where_kateg = "nama_kategori = '".($this->input->get('nama_kategori'))."'";
            $this->db->where($where_kateg);
        }

        if(isset($_GET['order'])){
			$this->db->order_by( $this->order_column[$_GET['order']['0']['column']], $_GET['order']['0']['dir'] );
        }

        else {
            $this->db->order_by('tb_siswa.id_kelas', 'desc');
        }
    }

    public function get_datatable(){
        $this->kelas_detail();
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
        $this->kelas_detail();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function kelas(){
        $this->db->select('id_kelas');
        $this->db->from(self::$tb_kelas);
        return $this->db->get()->result();
    }

}

/* End of file Kelas_detail.php */
