<?php
class Subjects_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function insert($data)
    {
        $this->db->insert('subjects', $data);
        return $this->db->insert_id();
    }

    public function get_item($id)
    {
        $this->db->select('*');
        $this->db->from('subjects');
        $this->db->where('id', $id);

        return $this->db->get()->row();
    }

    public function get_items()
    {
        $this->db->select('*');
        $this->db->from('subjects');

        return $this->db->get()->result();
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('subjects');
                    
        return true;
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('subjects', $data);

        return true;
    }
}
