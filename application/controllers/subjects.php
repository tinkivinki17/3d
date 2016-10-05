<?php

class Subjects extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('Form_validation');
        $this->load->model('subjects_model');
        $this->load->helper('url');
    }

    public function index()
    {
        $items = $this->subjects_model->get_items();

        $this->load->view('subjects/index', array('items' => $items));
    }

    public function create()
    {
        $this->form_validation->set_rules('name', 'Имя', 'required|trim|xss_clean');
        $this->form_validation->set_rules('sname', 'Фамилия', 'required|trim|xss_clean');
        $this->form_validation->set_rules('comment', 'Комментарий', 'trim|xss_clean');

        if ($this->form_validation->run() === false) {
        } else {
            $data = array(
                'name' => $this->input->post('name'),
                'sname' => $this->input->post('sname'),
                'comment' => $this->input->post('comment'),
            );

            $subject_id = $this->subjects_model->insert($data);

            if (!empty($_FILES['image']['name'])) {
                move_uploaded_file($_FILES["image"]['tmp_name'], getcwd() . "/upload/subjects/images/" . $subject_id . ".jpg");
            }

            redirect(site_url("subjects/edit/{$subject_id}"));
        }

        $this->load->view('subjects/create');
    }

    public function edit()
    {
        $id = $this->uri->segment(3, $this->input->post('id'));
        $item = $this->subjects_model->get_item($id);

        if(empty($item)) {
            redirect(site_url("subjects/"));
        }

        $this->form_validation->set_rules('name', 'Имя', 'required|trim|xss_clean');
        $this->form_validation->set_rules('sname', 'Фамилия', 'required|trim|xss_clean');
        $this->form_validation->set_rules('comment', 'Комментарий', 'trim|xss_clean');

        if ($this->form_validation->run() === false) {
        } else {
            $data = array(
                'name' => $this->input->post('name'),
                'sname' => $this->input->post('sname'),
                'comment' => $this->input->post('comment'),
            );

            $this->subjects_model->update($id, $data);

            if (!empty($_FILES['image']['name'])) {
                move_uploaded_file($_FILES["image"]['tmp_name'], getcwd() . "/upload/subjects/images/" . $id . ".jpg");
            }

            redirect(site_url("subjects/edit/{$id}"));
        }

        $this->load->view('subjects/edit', array('item' => $item));
    }

    public function delete()
    {
        $id = $this->uri->segment(3, $this->input->post('id'));
        $status = $this->subjects_model->delete($id);

        redirect(site_url("subjects"));
    }
}
