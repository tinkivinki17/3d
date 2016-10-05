<?php

class Base_Controller extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("{$this->module_name}_model", "model");
    }

    public function index()
    {
        $items = $this->model->get_items();
        $this->load->view("{$this->module_name}/index", array('items' => $items));
    }

    protected function check_image($id)
    {
        if (!empty($_FILES['image']['name'])) {
            move_uploaded_file($_FILES['image']['tmp_name'], getcwd() . "/upload/{$this->module_name}/images/" . $id . ".jpg");
        }
    }

    protected function check_file($id)
    {
        if (!empty($_FILES['csv']['name'])) {
            move_uploaded_file($_FILES['csv']['tmp_name'], getcwd() . "/upload/{$this->module_name}/files/" . $id . ".csv");
        }
    }

    public function delete()
    {
        $id = $this->uri->segment(3, $this->input->post("id"));
        $status = $this->model->delete($id);

        redirect(site_url("{$this->module_name}"));
    }
}