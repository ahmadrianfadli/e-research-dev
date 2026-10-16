<?php
    class Viewfile extends CI_Controller{

        public function __construct(){
            parent:: __construct();
            if($_SESSION['timeout']===true){
                redirect(base_url().'lockscreen');
            }
        }

        public function index(){
            if( !$_SESSION['nik'] || $_SESSION['nik']==""){
                redirect("login");
            };

            $this->load->view("viewfile");
        }

    }
?>