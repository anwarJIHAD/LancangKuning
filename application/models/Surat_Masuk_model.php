<?php
defined('BASEPATH') or exit('No direct script access
allowed');
class Surat_Masuk_model extends CI_Model
{
    public $table = 'surat_masuk';
    public $id = 'surat_masuk.id';
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
    //public function getById($id)
    //{
    //$this->db->from($this->table);
    //$this->db->where('id',$id);
    //$query = $this->db->get();
    //return $query->row_array();
    //}
    public function getById()
    {
        $id = $this->session->userdata('NIP');
        $this->db->select('s.*,u.nama');
        $this->db->from('surat_masuk s');
        $this->db->join('user u', 's.NIP = u.NIP');
        $this->db->where('s.NIP', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getById2($id)
    {
        $this->db->from($this->table);
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    public function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }
}
