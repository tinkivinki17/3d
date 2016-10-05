<?php

class Items extends Base_Controller {
    public $module_name = "items";
    public $title = "Тестовые предметы";

    public function create()
    {
        $this->title .= "::Создание";
        $this->form_validation->set_rules("name", "Название", "required|trim|xss_clean");
        $this->form_validation->set_rules("comment", "Комментарий", "trim|xss_clean");

        if ($this->form_validation->run() === false) {
        } else {
            $data = array(
                "name" => $this->input->post("name"),
                "comment" => $this->input->post("comment"),
            );

            $id = $this->model->insert($data);
            $this->check_image($id);

            redirect(site_url("{$this->module_name}/edit/{$id}"));
        }

        $this->load->view("{$this->module_name}/create");
    }

    public function edit()
    {
        $this->title .= "::Редактирование";
        $id = $this->uri->segment(3, $this->input->post("id"));
        $item = $this->model->get_item($id);

        if (empty($item)) {
            redirect(site_url("{$this->module_name}/"));
        }

        $this->form_validation->set_rules("name", "Имя", "required|trim|xss_clean");
        $this->form_validation->set_rules("comment", "Комментарий", "trim|xss_clean");

        if ($this->form_validation->run() === false) {
        } else {
            $data = array(
                "name" => $this->input->post("name"),
                "comment" => $this->input->post("comment"),
            );

            $this->model->update($id, $data);
            $this->check_image($id);

            redirect(site_url("{$this->module_name}/edit/{$id}"));
        }

        $this->load->view("{$this->module_name}/edit", array("item" => $item));
    }
}
