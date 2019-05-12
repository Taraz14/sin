<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_guru extends CI_Model {

    private static $tb_guru = 'tb_guru';

    protected $order_column = [
        'nip',
        'nama_guru',
        'alamat',
        'status',
        'jenis_kelamin',
        'telepon',
        'email',
        'jabatan'
    ];

    protected function master_guru(){
        $this->db->select('*');
        $this->db->from(self::$tb_guru);  

        if($this->input->get('nip')){
            $where = "nip = '".($this->input->get('nip'))."'";
            $this->db->where($where);
        }

        if(isset($_GET['order'])) {
			$this->db->order_by( $this->order_column[$_GET['order']['0']['column']], $_GET['order']['0']['dir'] );
        }
        
        else {
            $this->db->order_by('nip', 'desc');
        }

    }

    public function get_datatable(){
        $this->master_guru();
        if ($this->input->get('length') !== 1) {
			$this->db->limit($this->input->get('length'), $this->input->get('start'));
		}
		$query = $this->db->get();
		return $query->result();
    }

    public function count_all(){
        return $this->db->get(self::$tb_guru)->num_rows();
    }

    public function fetch_count(){
        $this->db->select('*');
        $this->db->from(self::$tb_guru);
        $query = $this->db->get();
        return $this->db->count_all_results();
    }

    public function filter(){
        $this->master_guru();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function input_guru($input_guru){
        return $this->db->insert(self::$tb_guru, $input_guru);
    }

    public function input_log_guru($login_guru){
        return $this->db->insert('tb_user', $login_guru);
    }

    public function delete_row($nip){
        $this->db->where('nip', $nip);
        $this->db->delete('tb_guru');
    }

    public function delete_user_row($nip){
        $this->db->where('username', $nip);
        $this->db->delete('tb_user');
    }
    

}

/* End of file M_guru.php */
