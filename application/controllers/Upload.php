<?php
    class Upload extends CI_Controller{

        public function __construct(){
            parent:: __construct();
            $this->load->model('Modelupload', 'md');
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

            $data['title']       = 'E-RESEARCH';
            $this->load->view("upload", $data);
        }

        public function datapasien(){
            $parameter  =$this->input->post("pencarian");
            $result     =$this->md->datapasien($parameter);

            if(!empty($result)){
                $data['responCode']  ="00";
                $data['responDesc']  ="Data Pasien Di Temukan";
                $data['responResult']=$result;
            }else{
                $data['responCode'] ="01";
                $data['responDesc'] ="Data Pasien Tidak Di Temukan";
            }

            echo json_encode($data);
        }

        public function viewfile(){
            $pasienid   =$_SESSION['pasienid'];
            $episodeid  =$_SESSION['episodeid'];

            $result     =$this->md->viewfile($pasienid, $episodeid, $_SESSION['userid']);

            if(!empty($result)){
                $data['responCode']  ="00";
                $data['responDesc']  ="History File Pasien Di Temukan";
                $data['responResult']=$result;
            }else{
                $data['responCode'] ="01";
                $data['responDesc'] ="History File Pasien Tidak Di Temukan";
            }

            echo json_encode($data);
        }

        public function getsession(){
            $urlsimpan    =$this->input->post('urlsimpan');
            $dirurl       =$this->input->post('dirurl');
            $dirfile      =$this->input->post('dirfile');
            $pasienid     =$this->input->post('pasienid');
            $episodeid    =$this->input->post('episodeid');
            $jenisepisode =$this->input->post('jenisepisode');

            $session = array(
                'urlsimpan'     =>$urlsimpan,
                'dirurl'        =>$dirurl, 
                'dirfile'       =>$dirfile,
                'pasienid'      =>$pasienid,
                'episodeid'     =>$episodeid,
                'jenisepisode'  =>$jenisepisode
            );

            $this->session->set_userdata($session);

            $data['responCode']="00";
            $data['responDesc']="Get Data Success";

            echo json_encode($data);
        }

        public function upload(){
            $jenis =$this->input->get("jenis");
            $date  =date("dmY");
            $timer =date("His");

            if (!empty($_FILES)) {
                $config["upload_path"]    = $_SESSION['urlsimpan'];
                $config["allowed_types"]  = "pdf";
                $config['file_name']      = $_SESSION['pasienid'].'_'.$jenis.'_'.$date.$timer;
                // $config['overwrite']      = TRUE;
                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload("file")) {
                    $error = $this->upload->display_errors();
                    echo $error;
                }else{
                    $namafile = $_SESSION['pasienid'].'_'.$jenis.'_'.$date.$timer.'.pdf';
                    $this->md->simpandata($_SESSION['pasienid'],$jenis,$_SESSION['dirfile'],$namafile,$_SESSION['episodeid'],$date,$_SESSION['dirurl'],$_SESSION['jenisepisode'],$_SESSION['userid']);
                    echo "Upload Success";
                }
            }  
        }

        public function remove(){
            // $upload_path = $_SESSION['urlsimpan'].'/'.;
            $upload_path = "";

		    $file = $this->input->post("file");
            $file = str_replace(" ","_",$file);
            return var_dump($upload_path.$file);
            if (file_exists($upload_path.$file)) {
                unlink($upload_path . "/" . $file);
            }
        }

        public function list_files(){
            // $upload_path = $_SESSION['urlsimpan'].'/';
            $upload_path = "";

		    $this->load->helper("file");
		    $files = get_filenames($upload_path);
     
            foreach ($files as &$file) {
                $file = array(
                    'name' => $file,
                    'size' => filesize($upload_path."/".$file)
                );
            }

            header("Content-type: text/json");
            header("Content-type: application/json");
            echo json_encode($files);
	    }

        public function createfolder(){

            if (!is_dir($_SESSION['urlsimpan'])) {
                if(mkdir($_SESSION['urlsimpan'], 0777, true)){
                    $data['responCode']="00";
                    $data['responDesc']="Created Folder Success";
                }else{
                    $data['responCode']="01";
                    $data['responDesc']="Created Folder Failed";
                }      
            }

            echo json_encode($data);
        }

        public function createdropbox(){
            $listdrop     ="";
            $srcdropzone  ="";

            $pasienid     =$_SESSION['pasienid'];
            $episodeid    =$_SESSION['episodeid'];
            $parameter    =$this->input->post("pencariandoc");
            
            $result       =$this->md->typedocument($parameter,$pasienid,$episodeid);
            
            foreach($result as $a){
                $listdrop .="<div class='col-md-4'>";
                $listdrop .="<div id='my-dropzone' class='dropzone dropzone".$a->JNS_DOC." mb-3' data-jnsdoc='".$a->JNS_DOC."'title='".$a->KETERANGAN."'>";
                $listdrop .="<div class='dz-message'>";
                $listdrop .="<h6 class='text-truncate'>".$a->KETERANGAN."</h6>";
                $listdrop .="<h6 class='text-truncate'>Uploaded : ".$a->JMLUPLOAD." Files</h6>";
                $listdrop .="<h3><i class='fas fa-cloud-upload-alt'></i>  Drop files here</h3> or <strong>click</strong> to upload";
                $listdrop .="</div>";
                $listdrop .="</div>";
                $listdrop .="</div>";

                $srcdropzone .="var myDropzone = new Dropzone('.dropzone".$a->JNS_DOC."', {";
                $srcdropzone .="url:'".site_url('Upload/upload')."?jenis=".$a->JNS_DOC."',";
                $srcdropzone .="acceptedFiles: '.pdf',";
                $srcdropzone .="addRemoveLinks: false,";
                $srcdropzone .="removedfile: function(file) {";
                $srcdropzone .="var name = file.name;";
                $srcdropzone .="$.ajax({";
                $srcdropzone .="type: 'post',";
                $srcdropzone .="url: '".site_url('Upload/remove')."',";
                $srcdropzone .="data: { file: name },";
                $srcdropzone .="dataType: 'html'";
                $srcdropzone .="});";
                $srcdropzone .="var previewElement;";
                $srcdropzone .="return (previewElement = file.previewElement) != null ? (previewElement.parentNode.removeChild(file.previewElement)) : (void 0);";
                $srcdropzone .="},";
                $srcdropzone .="init: function() {";
                $srcdropzone .="var me = this;";
                $srcdropzone .="$.get('".site_url('Upload/list_files')."', function(data) {";
                $srcdropzone .="if (data.length > 0) {";
                $srcdropzone .="$.each(data, function(key, value) {";
                $srcdropzone .="var mockFile = value;";
                $srcdropzone .="me.emit('addedfile', mockFile);";
                $srcdropzone .="me.emit('thumbnail', mockFile, '".base_url()."dist/img/icon-pdf.png');";
                $srcdropzone .="me.emit('complete', mockFile);";
                $srcdropzone .="});}});}});";
            }

            // return var_dump($srcdropzone);

            if(!empty($listdrop) && !empty($srcdropzone)){
                $data['responCode']     ="00";
                $data['responDesc']     ="Created Dropbox Success";
                $data['listdrop']       =$listdrop;
                $data['srcdropzone']    =$srcdropzone;
            }else{
                $data['responCode']     ="01";
                $data['responDesc']     ="Created Dropbox Failed";
            }

            echo json_encode($data);
        }

        public function hapusdok(){
            $pasienid        =$this->input->post("pasienid");
            $episodeid       =$this->input->post("episodeid");
            $jnsdoc          =$this->input->post("jnsdoc");
            $namafile        =$this->input->post("namafile");

            $data['SHOW_ITEM']    ='0';

            if($this->md->hapusdok($pasienid, $episodeid, $namafile, $data)){
                $json['responCode']="00";
                $json['responHead']="success";
                $json['responDesc']="Hapus Kegiatan Berhasil";
                
            }else{
                $json['responCode']="01";
                $json['responHead']="info";
                $json['responDesc']="Hapus Kegiatan Gagal";
            }
            
            echo json_encode($json);
        }

    }
?>