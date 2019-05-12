<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_siswa extends CI_Model {

    private static $tb_siswa = 'tb_siswa';
    private static $tb_kelas = 'tb_kelas';

    protected $select_column = [
        'tb_siswa.nisn',
        'tb_siswa.nama_siswa',
        'tb_siswa.tanggal_lahir',
        'tb_siswa.alamat',
        'tb_siswa.agama',
        'tb_siswa.jenis_kelamin',
        'tb_siswa.telepon',
        'tb_siswa.tempat_lahir',
        'tb_siswa.no_kk',
        'tb_siswa.nama_ayah',
        'tb_siswa.nama_ibu',
        'tb_siswa.tahun_ajaran',
        'tb_kelas.nama_kelas'
    ];

    protected $order_column = [
        'tb_siswa.nisn',
        'tb_siswa.nama_siswa',
        'tb_kelas.nama_kelas',
        'tb_siswa.tanggal_lahir',
        'tb_siswa.alamat',
        'tb_siswa.agama',
        'tb_siswa.jenis_kelamin',
        'tb_siswa.telepon',
        'tb_siswa.tempat_lahir',
        'tb_siswa.no_kk',
        'tb_siswa.nama_ayah',
        'tb_siswa.nama_ibu',
        'tb_siswa.tahun_ajaran'
    ];
    
    protected function master_siswa(){
        $this->db->select($this->select_column);
        $this->db->from(self::$tb_siswa);
        $this->db->join('tb_kelas', 'tb_kelas.id_kelas = '.self::$tb_siswa.'.id_kelas');

        if($this->input->get('kelas')){
            $where = self::$tb_kelas.".nama_kelas = '".($this->input->get('kelas'))."'";
            $this->db->where($where);
        }

        if(isset($_GET['order'])) {
			$this->db->order_by( $this->order_column[$_GET['order']['0']['column']], $_GET['order']['0']['dir'] );
        }

        else {
            $this->db->order_by(self::$tb_siswa.'.nisn', 'desc');
        }
    }

    public function get_datatable(){
        $this->master_siswa();
        if ($this->input->get('length') !== 1) {
			$this->db->limit($this->input->get('length'), $this->input->get('start'));
		}
		$query = $this->db->get();
		return $query->result();
    }

    public function count_all(){
        return $this->db->get(self::$tb_siswa)->num_rows();
    }

    public function fetch_count(){
        $this->db->select('*');
        $this->db->from(self::$tb_siswa);
        $query = $this->db->get();
        return $this->db->count_all_results();
    }

    public function filter(){
        $this->master_siswa();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function nisn(){
        $this->db->select('nisn');
        $this->db->from(self::$tb_siswa);
        // $this->db->group_by('nisn');
        return $this->db->get()->result();
    }

    public function kelas(){
        $this->db->select('id_kelas, nama_kelas');
        $this->db->from(self::$tb_kelas);
        // $this->db->join('tb_siswa', 'tb_siswa.id_kelas = tb_kelas.id_kelas');
        $this->db->group_by('nama_kelas');
        return $this->db->get()->result();
    }

    public function input_siswa($input_siswa){
        return $this->db->insert(self::$tb_siswa, $input_siswa);
    }

    public function input_log_siswa($login_siswa){
        return $this->db->insert('tb_user', $login_siswa);
    }

    public function get_detail_siswa($siswa_nisn){
		$this->db->where('nisn', $siswa_nisn);
		return $this->db->get( self::$tb_siswa , 1)->result();
	}

    public function delete_row($siswa_nisn){
        $this->db->where('nisn', $siswa_nisn);
        $this->db->delete(self::$tb_siswa);
    }

    public function delete_nilai($siswa_nisn){
        $this->db->where('nisn', $siswa_nisn);
        $this->db->delete('tb_nilai');
    }

    public function delete_user_login($siswa_nisn){
        $this->db->where('username', $siswa_nisn);
        $this->db->delete('tb_user');
    }

}

/* End of file M_siswa.php */
