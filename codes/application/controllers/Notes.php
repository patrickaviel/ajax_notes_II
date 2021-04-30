<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notes extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model("Note");
    }
	public function index() {
 		$this->load->view('index');
	}
    public function index_html(){
        $data['notes'] = $this->Note->load_all();
        $this->load->view('partials/notes',$data);
    }
    public function create(){
        if(!is_null($this->input->post('title')) && !is_null($this->input->post('description'))){
            $this->Note->create($this->input->post());
        }
        $data['notes'] = $this->Note->load_all();
        $this->load->view('partials/notes',$data);
    }
    public function delete($id){
        $this->Note->delete($id);
        $data['notes'] = $this->Note->load_all();
        $this->load->view('partials/notes',$data);
    }
    public function update($id){
        $this->Note->update($this->input->post(),$id);
        $data['notes'] = $this->Note->load_all();
        $this->load->view('partials/notes',$data);
    }
}
