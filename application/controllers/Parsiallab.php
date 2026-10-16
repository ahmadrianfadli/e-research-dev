<?php
    class parsiallab extends CI_Controller{

        public function __construct(){
            parent:: __construct();
            $this->load->model('Modelparsiallab', 'md');
        }

        public function index(){
            if(!$_SESSION['nik']||$_SESSION['nik']==""){
                redirect("login");
            };
            
            $filename = 'dist/FILEAPPS/EMPLOYEE/'.$_SESSION['nik'].'/'.$_SESSION['nik'].'.jpg';

            if (file_exists($filename)) {
                $data['fotoprofile']="<div class='col-md-2'><img class='shadow-lg p-2 bg-secondary rounded img-thumbnail btn' data-toggle='modal' data-target='#uploadfotoprofile' title='Klik Untuk Upload Foto Profile' src='".base_url().$filename."'></img></div>";
                $data['avatar']="<img src='".base_url().$filename."' class='img-circle elevation-2' data-toggle='modal' data-target='#uploadfotoprofile' title='Klik Untuk Upload Foto Profile' style='height:37px; width:37px;'>";
            } else {
                $data['fotoprofile']="<div class='col-md-2'><img class='shadow-lg p-2 bg-secondary rounded img-thumbnail btn' data-toggle='modal' data-target='#uploadfotoprofile' title='Klik Untuk Upload Foto Profile' src='".base_url()."dist/img/user.svg"."'></img></div>";
                $data['avatar']="<img src='".base_url()."dist/img/user.svg'"."data-toggle='modal' data-target='#uploadfotoprofile' title='Klik Untuk Upload Foto Profile' class='img-circle'>";
            }
            
            $data['title'] = 'E-RESEARCH';
            $this->load->view("parsiallab", $data);
        }

        public function datatransaksi(){ 
            $result   = $this->md->datatransaksi();

            if(!empty($result)){
                $json['responCode']="00";
                $json['responDesc']="Data Di Temukan";
                $json['responResult']=$result;
            }else{
                $json['responCode']="01";
                $json['responDesc']="Data Tidak Di Temukan";  
            }

            echo json_encode($json);
        }

    }
?>