<?php
defined('BASEPATH') or exit('No direct script access
allowed');
class User_model extends CI_Model
{
    public $table = 'user';
    public $NIP = 'user.NIP';
    public function __construct()
    {
        parent::__construct();
    }
    public function get()
    {
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getBy()
    {
        $this->db->from($this->table);
        $this->db->where('NIP', $this->session->userdata('NIP'));
        $query = $this->db->get();
        return $query->row_array();
    }
    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
    public function getById($NIP)
    {
        $this->db->from($this->table);
        $this->db->where('NIP', $NIP);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->affected_rows();
    }
    public function delete($NIP)
    {
        $this->db->where($this->NIP, $NIP);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }
    public function tuser()
    {
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->num_rows();
    }
}
