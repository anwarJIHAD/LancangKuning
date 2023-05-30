<?php
defined('BASEPATH') or exit('No direct script access
allowed');
class Pendukung_model extends CI_Model
{
    public $table = 'pmi_pendukung';
    public $id = 'pmi_pendukung.id_pendukung';
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
    public function getsemua()
    {
        $this->db->select('p.*,l.*,k.*');
        $this->db->from('pendukung p');
        $this->db->join('korban k', 'k. = u.NIP');

    }
    public function korban_($id)
    {

        $this->db->select('pmi_pendukung.id_pendukung, pmi_ilegal.*');
        $this->db->from('pmi_pendukung');
        $this->db->join('pmi_ilegal', 'pmi_pendukung.id_pendukung = pmi_ilegal.id_pendukung');
        $this->db->where('pmi_pendukung.id_pendukung', $id);
        $query = $this->db->get();
        return $query->result_array();


    }
    public function pmi_ilegal()
    {
        $this->db->select('d.*, p.nama_pelaksana');
        $this->db->from('detail_ilegal d');
        $this->db->join('pmi_pendukung p', 'p.id_pendukung = d.id_pendukung');
        $this->db->group_by('d.no_korban');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function pmi_ilegal1($id)
    {
        $this->db->distinct();
        $this->db->select('d.*, p.nama_pelaksana');
        $this->db->from('detail_ilegal d');
        $this->db->join('pmi_pendukung p', 'p.id_pendukung = d.id_pendukung');
        $this->db->where('d.no_korban', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function getById2($id)
    {
        $this->db->from($this->table);
        $this->db->where('id_pendukung', $id);
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