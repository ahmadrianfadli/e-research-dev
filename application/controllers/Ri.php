<?php
    class Ri extends CI_Controller{

        public function __construct(){
            parent:: __construct();
            $this->load->model('Modelresearch', 'md');
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
            $this->load->view("ri", $data);
        }


        public function triase(){ 
            $triaseigd = $this->input->post("triaseigd");
            $hasil   = $this->md->triase($triaseigd);

            if(count($hasil)==0){
                $json['responCode']="01";
                $json['responDesc']="Riwayat Triase Tidak Di Temukan";
            }else{
                $json['responCode']="00";
                $json['responDesc']="Riwayat Triase Di Temukan";
                $json['responResult']=$hasil;
            }

            echo json_encode($json);
        }

        public function riwayatpasienri(){ 
            $search = $this->input->post("search");
            $hasil  = $this->md->riwayatpasienri($search);

            if(count($hasil)==0){
                $json['responCode']="01";
                $json['responDesc']="Riwayat Pasien Tidak Di Temukan";
            }else{
                $json['responCode']="00";
                $json['responDesc']="Riwayat Pasien Di Temukan";
                $json['responResult']=$hasil;
            }

            echo json_encode($json);
        }

		public function rincianbilling(){ 
            $pasienid  = $this->input->post("pasienid");
            $episodeid = $this->input->post("episodeid");

            $hasil  = $this->md->rincianbillingri($pasienid, $episodeid);

            if(count($hasil)==0){
                $json['responCode']="01";
                $json['responDesc']="Rincian Billing Tidak Di Temukan";
            }else{
                $json['responCode']="00";
                $json['responDesc']="Rincian Billing Di Temukan";
                $json['responResult']=$hasil;
            }

            echo json_encode($json);
        }

		public function resumelab(){ 
            $episodeid = $this->input->post("episodeid");
            
            $hasil  = $this->md->resumelab($episodeid);

            if(count($hasil)==0){
                $json['responCode']="01";
                $json['responDesc']="Resume Lab Tidak Di Temukan";
            }else{
                $json['responCode']="00";
                $json['responDesc']="Resume Lab Di Temukan";
                $json['responResult']=$hasil;
            }

            echo json_encode($json);
        }

		public function resumerad(){ 
			$pasienid  = $this->input->post("pasienid");
            $episodeid = $this->input->post("episodeid");

            $hasil  = $this->md->resumerad($pasienid, $episodeid);

            if(count($hasil)==0){
                $json['responCode']="01";
                $json['responDesc']="Resume Rad Tidak Di Temukan";
            }else{
                $json['responCode']="00";
                $json['responDesc']="Resume Rad Di Temukan";
                $json['responResult']=$hasil;
            }

            echo json_encode($json);
        }

		public function resumeri(){ 
			$pasienid  = $this->input->post("pasienid");
            $episodeid = $this->input->post("episodeid");

            $hasil  = $this->md->resumeri($pasienid, $episodeid);

            if(count($hasil)==0){
                $json['responCode']="01";
                $json['responDesc']="Resume Rawat Inap Tidak Di Temukan";
            }else{
                $json['responCode']="00";
                $json['responDesc']="Resume Rawat Inap Di Temukan";
                $json['responResult']=$hasil;
            }

            echo json_encode($json);
        }

		public function konsul(){ 
			$pasienid  = $this->input->post("pasienid");
            $episodeid = $this->input->post("episodeid");

            $hasil  = $this->md->konsul($pasienid, $episodeid);

            if(count($hasil)==0){
                $json['responCode']="01";
                $json['responDesc']="Konsutasi Rawat Inap Tidak Di Temukan";
            }else{
                $json['responCode']="00";
                $json['responDesc']="Konsutasi Rawat Inap Di Temukan";
                $json['responResult']=$hasil;
            }

            echo json_encode($json);
        }

		public function laporanok(){ 
			$pasienid  = $this->input->post("pasienid");
            $episodeid = $this->input->post("episodeid");
			$jenisopr = $this->input->post("jenisopr");

            $hasil  = $this->md->laporan($jenisopr,$pasienid,$episodeid);

            if(count($hasil)==0){
                $json['responCode']="01";
                $json['responDesc']="Laporan Operasi Tidak Di Temukan";
            }else{
                $json['responCode']="00";
                $json['responDesc']="Laporan Operasi Inap Di Temukan";
                $json['responResult']=$hasil;
            }

            echo json_encode($json);
        }

    }

?>