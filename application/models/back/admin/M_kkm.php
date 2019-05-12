<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kkm extends CI_Model {

    private static $tb_kkm = 'tb_kkm';
    private static $tb_mapel = 'tb_mapel';

    protected $order_column = [
        'id_mapel',
        'nilai_kkm',
        'tahun_ajaran'
    ];

    public function show_mapel(){
        $this->db->select('*');
        $this->db->from(self::$tb_mapel);
        $this->db->group_by('id_mapel');
        return $this->db->get()->result();
        
    }

    public function input_kkm($input_kkm){
        return $this->db->insert(self::$tb_kkm, $input_kkm);
    }

}

/* End of file M_kkm.php */
