<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CrudFunction
 *
 * @author erwin
 */
interface CrudFunction {
    public function getAll();
    public function getByPrimaryKey($primaryKey);
    public function insert($data);
    public function update($data, $primaryKey);
    public function delete($primaryKey);
}
