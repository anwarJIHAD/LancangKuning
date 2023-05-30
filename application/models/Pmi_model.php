<?php
defined('BASEPATH') or exit('No direct script access
allowed');
class Pmi_model extends CI_Model
{
    public $table = 'pmi';
    public $id = 'pmi.id_pmi';
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
    public function get_provinsi(){
        $this->db->select('provinsi');
        $this->db->distinct();
        $this->db->from($this->table);
        return $this->db->get()->result_array();
        
    }
    public function ambil_data($keyword){
		$this->db->select('*');
        $this->db->from($this->table);
		if(!empty($keyword)){
			$this->db->like('nama',$keyword);
		}
		return $this->db->get();
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
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();

        
    }
    public function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }
    function fetch_data($query)
	{
		$this->db->select("*");
		$this->db->from($this->table);
		if($query != '')
		{
			$this->db->like('nama', $query);
			$this->db->or_like('jenis_kelamin', $query);
			$this->db->or_like('tanggal_lahir', $query);
			$this->db->or_like('negara_penempatan', $query);
			$this->db->or_like('tgl_datang', $query);
			$this->db->or_like('jenis_pulang', $query);
			$this->db->or_like('alamat', $query);
			$this->db->or_like('provinsi', $query);
			$this->db->or_like('debarkas', $query);
		}
		$this->db->order_by('nama', 'DESC');
		return $this->db->get();
	}
}