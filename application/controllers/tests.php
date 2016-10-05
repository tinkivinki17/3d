<?php

class Tests extends Base_Controller {
    public $module_name = "tests";
    public $title = "Опыты";

    public function __construct() {
        parent::__construct();

        $this->load->model('subjects_model');
        $this->load->model('items_model');
    }

    public function create()
    {
        $this->title .= "::Создание";
        $this->form_validation->set_rules("comment", "Комментарий", "trim|xss_clean");

        if ($this->form_validation->run() === false) {
        } else {
            $data = array(
                "subject_id" => $this->input->post("subject_id"),
                "item_id" => $this->input->post("item_id"),
                "comment" => $this->input->post("comment"),
            );

            $id = $this->model->insert($data);
            $this->check_file($id);

            redirect(site_url("{$this->module_name}/edit/{$id}"));
        }

        $this->load->view(
            "{$this->module_name}/create", array(
                "subjects" => $this->subjects_model->get_items(),
                "items" => $this->items_model->get_items()
        ));
    }

    public function edit()
    {
        $this->title .= "::Редактирование";
        $id = $this->uri->segment(3, $this->input->post("id"));
        $item = $this->model->get_item($id);

        if (empty($item)) {
            redirect(site_url("{$this->module_name}/"));
        }

        $this->form_validation->set_rules("comment", "Комментарий", "trim|xss_clean");

        if ($this->form_validation->run() === false) {
        } else {
            $data = array(
                "subject_id" => $this->input->post("subject_id"),
                "item_id" => $this->input->post("item_id"),
                "comment" => $this->input->post("comment"),
            );

            $this->model->update($id, $data);
            $this->check_image($id);

            redirect(site_url("{$this->module_name}/edit/{$id}"));
        }

        $this->load->view("{$this->module_name}/edit", array(
            "test" => $item,
            "subjects" => $this->subjects_model->get_items(),
            "items" => $this->items_model->get_items()
        ));
    }
}
