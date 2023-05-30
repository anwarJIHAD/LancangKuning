<?php
defined('BASEPATH') or exit('No direct script access
allowed');
class Pelaku_model extends CI_Model
{
    public $table = 'pelaku';
    public $id = 'pelaku.id_pelaku';
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
        $this->db->from('surat_keluar s');
        $this->db->join('user u', 's.NIP = u.NIP');
        $this->db->where('s.NIP', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_pelaku($id)
    {
        $this->db->from($this->table);
        $this->db->where('id_pendukung', $id);
        $query = $this->db->get();
        return $query->result_array();

    }
    public function get_Pelaku1($id)
    {
        $this->db->select('d.*,pe.*');
        $this->db->from('detail_ilegal d');
        $this->db->join('pelaku pe', 'd.id_pelaku  = pe.id_pelaku', 'inner');
        $this->db->where('d.id_pendukung', $id);
        $query = $this->db->get();
        $data = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $data = $query->result_array();
        }
        return $data;
    }
    public function pelaku_ilegal($nama_korban)
    {
        $this->db->select('d.*, p.*');
        $this->db->from('detail_ilegal d');
        $this->db->join('pelaku p', 'p.id_pelaku = d.id_pelaku');
        $this->db->where('d.no_korban', $nama_korban);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getById2($id)
    {
        $this->db->from($this->table);
        $this->db->where('id_pmi', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function getById3($id)
    {
        $this->db->from($this->table);
        $this->db->where('id_pendukung', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
    public function insert($data)
    {
        return $this->db->insert_batch('pelaku', $data);
        // return $this->db->insert_id();
    }
    public function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }
}