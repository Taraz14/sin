<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_mapel extends CI_Model {

    private static $tb_mapel = 'tb_mapel';

    protected $order_column = [
        'id_mapel',
        'nama_mapel'
    ];

    public function input_mapel($input_mapel){
        return $this->db->insert(self::$tb_mapel, $input_mapel);
    }

}

/* End of file M_mapel.php */
