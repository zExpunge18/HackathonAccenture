<?php

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('hacakthonModel');
        $this->load->library("form_validation");

        if($this->session->userdata('logged_in')){
            redirect('dashboard/');
        }  
    }

    public function index() {
        $this->load->view('login');
    }

    public function loginSubmit() {
        $username = $this->input->post('username',true);
        $password = $this->input->post('password', true);

        $data = ['username'=>$username,
        'password'=>$password];

        $usercredentials = $this->oirsmodel->getItems('admin',$data);

        if($usercredentials == false){
            redirect('user/');
        }else{
            redirect('dashboard/');
        }
    }

}

?>