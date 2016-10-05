<?php

class Base_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function insert($data)
    {
        $this->db->insert($this->table_name, $data);
        return $this->db->insert_id();
    }

    public function get_item($id)
    {
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where('id', $id);

        return $this->db->get()->row();
    }

    public function get_items()
    {
        $this->db->select('*');
        $this->db->from($this->table_name);

        return $this->db->get()->result();
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table_name);
                    
        return true;
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update($this->table_name, $data);

        return true;
    }
}