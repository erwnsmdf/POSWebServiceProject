<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProdukModel
 *
 * @author erwin
 */

require 'CrudFunction.php';
class ProdukModel extends CI_Model implements CrudFunction {

    var $table = "produk";
    var $primaryKey = "id_produk";

    public function getAll() {
        return $this->db->get($this->table)->result();
    }

    public function getByPrimaryKey($primaryKey) {
        $this->db->where($this->primaryKey,$primaryKey);
        return $this->db->get($this->table)->row();
    }

    public function insert($data) {
        return $this->db->insert($this->table,$data);
    }

    public function update($data, $primaryKey) {
        $this->db->where($this->primaryKey,$primaryKey);
        return $this->db->update($this->table,data);
    }

    public function delete($primaryKey) {
        return $this->db->delete($this->table,$primaryKey);
    }

}
