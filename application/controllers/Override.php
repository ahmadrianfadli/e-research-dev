<?php
    class Override extends CI_Controller{ 
        public function index(){
            $this->load->view('errors/404');
        }
    }
?>