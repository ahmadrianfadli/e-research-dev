<?php
    class Internal extends CI_Controller{

        public function __construct(){
            parent:: __construct();
            $this->load->helper("general_helper");

            if($_SESSION['timeout']===true){
                redirect(base_url().'lockscreen');
            }
        }

        public function index(){
            if( !$_SESSION['nik'] || $_SESSION['nik']==""){
                redirect("login");
            };

            $urlrekanan       ="https://rsudpasarminggu.jakarta.go.id/apirsudpm/api/research/rekanan";
            $resultrekanan    = curlPost($urlrekanan,null);

            $urljenis       ="https://rsudpasarminggu.jakarta.go.id/apirsudpm/api/research/jenis";
            $resultjenis    = curlPost($urljenis,null);

            $provider="";
            foreach($resultrekanan['response'] as $s ){
                $provider.="<option value='".$s['REKANAN_ID']."'>".$s['NAMA']."</option>";
            }
            $data['provider']=$provider;

            $jenis="";
            foreach($resultjenis['response'] as $s ){
                $jenis.="<option value='".$s['JENIS']."'>".$s['KETERANGAN']."</option>";
            }
            $data['jenis']=$jenis;

            $this->load->view("internal", $data);
        }

        public function daftarpasien(){ 


            $pencarian =$this->input->post("pencarian");
            $pencarian = str_replace(" ", "", $pencarian);

            

            if($pencarian!=null){
                $pencarian = $pencarian;
            }else{
                $pencarian = "I";
            }
            
            $provider  =$this->input->post("provider");
            $jenis     =$this->input->post("jenis");

            $tawal    = $this->input->post("tawal");
            if($tawal==""){
                $awal = "01.".date("m.Y");
            } else {
                $awal = $tawal;
            }

            $takhir   = $this->input->post("takhir");
            if($takhir==""){
                $akhir = date("d.m.Y");
            } else {
                $akhir = $takhir;
            }

            $url       ="https://rsudpasarminggu.jakarta.go.id/apirsudpm/api/research/daftarpasien/find/".$awal."/".$akhir."/".$provider."/".$jenis."/".$pencarian;
            
            $result = curlPost($url,null);
            echo json_encode($result);
        }

        public function orderlab(){ 
            $pasienid  =$this->input->post("pasienid");
            $episodeid =$this->input->post("episodeid");
            $url       ="https://rsudpasarminggu.jakarta.go.id/apirsudpm/api/research/orderlab/find/".$pasienid."/".$episodeid;
            $result = curlPost($url,null);
            echo json_encode($result);
        }

        public function hasillab(){ 
            $pasienidlab  =$this->input->post("pasienidlab");
            $sampelid     =$this->input->post("sampelid");
            $url          ="https://rsudpasarminggu.jakarta.go.id/apirsudpm/api/research/hasillab/find/".$pasienidlab."/".$sampelid;
            $result = curlPost($url,null);
            echo json_encode($result);
        }

        public function listlab(){ 
            $pasienidlab  =$this->input->post("pasienidlab");
            $testid       =$this->input->post("testid");
            $pasienid     =$this->input->post("pasienid");
            $episodeid    =$this->input->post("episodeid");
            $url          ="https://rsudpasarminggu.jakarta.go.id/apirsudpm/api/research/listlab/find/".$pasienidlab."/".$testid."/".$pasienid."/".$episodeid;
            $result = curlPost($url,null);
            echo json_encode($result);
        }

        public function tindakanRI(){ 
            $pasienid  =$this->input->post("pasienid");
            $episodeid =$this->input->post("episodeid");
            $url       ="https://rsudpasarminggu.jakarta.go.id/apirsudpm/api/research/tindakanRI/find/".$pasienid."/".$episodeid;
            $result = curlPost($url,null);
            echo json_encode($result);
        }

    }
?>