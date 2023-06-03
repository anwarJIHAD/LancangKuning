<?php
defined('BASEPATH') or exit('No direct script access
allowed');
class Ilegal_model extends CI_Model
{
    public $table = 'pmi_ilegal';
    // public $table2 = 'pmi_pendukung';
    public $id = 'pmi_ilegal.id_ilegal';
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
    public function tampil()
    {
        $id = $this->session->userdata('NIP');
        $this->db->select('i.*,pn.*,pe.*,d.*');
        $this->db->from('detail_ilegal d');
        $this->db->join('pmi_pendukung pn', 'd.id_pendukung = pn.id_pendukung');
        $this->db->join('pelaku pe', 'd.id_pelaku  = pe.id_pelaku');
        $this->db->join('pmi_ilegal i', 'd.no_korban  = i.no_korban');
        $this->db->group_by('i.no_korban');
        $query = $this->db->get();
        return $query->result_array();

    }
   
    public function getById2($id)
    {
        $this->db->from($this->table);
        $this->db->where('no_korban', $id);
        $query = $this->db->get();
        return $query->result_array();

    }
    public function getById3($id)
    {
        $this->db->from($this->table);
        $this->db->where('no_korban', $id);
        $query = $this->db->get();
        return $query->row_array();


    }
    public function update($where, $data)
    {
        $this->db->update_batch($this->table, $data, $where);
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
    public function tampil2()
    {


        $this->db->select('k.*,pn.*');

        $this->db->from('pmi_ilegal k');
        $this->db->join('pmi_pendukung pn', 'k.id_pendukung = pn.id_pendukung', 'inner');


        $query = $this->db->get();
        $data = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $data = $query->result_array();
        }
        return $data;

    }
    public function tampil3()
    {


        $this->db->select('k.id_ilegal as id, k.id_pendukung as pendukung,,pn.*');

        $this->db->from('pmi_ilegal k');
        $this->db->join('pmi_pendukung pn', 'k.id_pendukung = pn.id_pendukung', 'inner');


        $query = $this->db->get();
        $data = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $data = $query->result_array();
        }
        return $data;

    }

}