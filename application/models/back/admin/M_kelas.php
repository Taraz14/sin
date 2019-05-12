<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kelas extends CI_Model {

    private static $tb_kelas = 'tb_kelas';
    private static $tb_kategori_kelas = 'tb_kategori_kelas';

    protected $select_column = [
        'tb_kelas.id_kelas',
        'tb_kelas.nama_kelas',
        'tb_kelas.jumlah_siswa',
        'tb_kategori_kelas.nama_kategori'
    ];

    protected $order_column = [
        'tb_kelas.id_kelas',
        'tb_kelas.nama_kelas',
        'tb_kategori_kelas.nama_kategori',
        'tb_kelas.jumlah_siswa'
    ];

    protected function master_kelas(){
        $this->db->select($this->select_column);
        $this->db->from(self::$tb_kelas);
        $this->db->join('tb_kategori_kelas', 'tb_kategori_kelas.id_kategoriK = '.self::$tb_kelas.'.id_kategoriK');

        if($this->input->get('kategori')){
            $where_kateg = "nama_kategori = '".($this->input->get('nama_kategori'))."'";
            $this->db->where($where_kateg);
        }

        if(isset($_GET['order'])){
			$this->db->order_by( $this->order_column[$_GET['order']['0']['column']], $_GET['order']['0']['dir'] );
        }

        else {
            $this->db->order_by('id_kelas', 'desc');
        }
    }

    public function get_datatable(){
        $this->master_kelas();
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
        $this->db->from(self::$tb_kelas);
        $query = $this->db->get();
        return $this->db->count_all_results();
    }

    public function filter(){
        $this->master_kelas();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function kategori(){
        $this->db->select('*');
        $this->db->from(self::$tb_kategori_kelas);
        $this->db->group_by('id_kategoriK');
        return $this->db->get()->result();
    }

    public function kelas(){
        $this->db->select('*');
        $this->db->from(self::$tb_kelas);
        return $this->db->get()->result();
    }

    public function guru_wali(){
        $this->db->select('*');
        $this->db->from('tb_guru');
        return $this->db->get()->result();
    }

    public function input_kelas($input_kelas){
        return $this->db->insert(self::$tb_kelas, $input_kelas);
    }

}

/* End of file M_kelas.php */
