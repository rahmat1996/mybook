<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dashboard_model
 *
 * @author rahmat1996
 */
class Dashboard_model extends CI_Model{
    
    protected $table_book = 'book';


    public function __construct() {
        parent::__construct();
    }
    
    public function getCurrentListBook(){
        
    }
    
    public function getLastDateBook(){
        $this->db->select_max('date_added');
        $query = $this->db->get($this->table_book);
        return $query->row();
    }
    
}
