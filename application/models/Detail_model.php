<?php
defined('BASEPATH') or exit('No direct script access
allowed');
class Detail_model extends CI_Model
{
    public $table = 'detail_ilegal';
    // public $table2 = 'pmi_pendukung';
    public $id = 'detail_ilegal.id_detail';
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
    // public function tampil()
    // {
    //     $id = $this->session->userdata('NIP');

    //     $this->db->select('d.*,pn.*,pe.*,k.*');
    //     $this->db->from('detail_ilegal d');
    //     $this->db->join('pmi_pendukung pn', 'd.id_pendukung = pn.id_pendukung', 'inner');
    //     $this->db->join('pelaku pe', 'd.id_pelaku  = pe.id_pelaku', 'inner');
    //     $this->db->join('pmi_ilegal k', 'd.no_korban  = k.no_korban', 'inner');
    //     $query = $this->db->get();
    //     $data = array();
    //     if ($query !== FALSE && $query->num_rows() > 0) {
    //         $data = $query->result_array();
    //     }
    //     return $data;

    // }
    public function tampil()
    {
        $id = $this->session->userdata('NIP');

        $this->db->select('d.*,pn.*,pe.*,k.*');

        $this->db->from('detail_ilegal d');
        $this->db->join('pmi_pendukung pn', 'd.id_pendukung = pn.id_pendukung', 'inner');

        $this->db->join('pelaku pe', 'd.id_pelaku  = pe.id_pelaku', 'inner');
        $this->db->join('pmi_ilegal k', 'd.no_korban  = k.no_korban', 'inner');
        ;
        $this->db->group_by('pe.id_pelaku');
        $query = $this->db->get();
        $data = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $data = $query->result_array();
        }
        return $data;

    }



    public function getById2($id)
    {
        $this->db->from($this->table);
        $this->db->where('id_pmi', $id);
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
        return $this->db->insert_batch($this->table, $data);
    }

    public function delete($id)
    {
        $this->db->where('no_korban', $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }
    public function delete_($id)
    {
        $this->db->where('id_pendukung', $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }

}