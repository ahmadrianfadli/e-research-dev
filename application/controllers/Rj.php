<?php

/**
 * @property mixed md 
 * @property mixed session
 * @property mixed input
 */
header('Access-Control-Allow-Origin: *');
require FCPATH . '/plugins/jaspersoft/rest-client/autoload.dist.php';
require APPPATH . '/libraries/fpdi/src/autoload.php';
require APPPATH . '/libraries/fpdf/fpdf.php';

require APPPATH . '/libraries/tcpdf/tcpdf.php';


use setasign\Fpdi\Fpdi;

use setasign\Fpdi\PdfParser\StreamReader;

use Jaspersoft\Client\Client;

class Rj extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Modelresearch', 'md');
    }

    public function index()
    {
        if (!$_SESSION['nik'] || $_SESSION['nik'] == "") {
            redirect("login");
        };

        $filename = 'dist/FILEAPPS/EMPLOYEE/' . $_SESSION['nik'] . '/' . $_SESSION['nik'] . '.jpg';

        if (file_exists($filename)) {
            $data['fotoprofile'] = "<div class='col-md-2'><img class='shadow-lg p-2 bg-secondary rounded img-thumbnail btn' data-toggle='modal' data-target='#uploadfotoprofile' title='Klik Untuk Upload Foto Profile' src='" . base_url() . $filename . "'></img></div>";
            $data['avatar'] = "<img src='" . base_url() . $filename . "' class='img-circle elevation-2' data-toggle='modal' data-target='#uploadfotoprofile' title='Klik Untuk Upload Foto Profile' style='height:37px; width:37px;'>";
        } else {
            $data['fotoprofile'] = "<div class='col-md-2'><img class='shadow-lg p-2 bg-secondary rounded img-thumbnail btn' data-toggle='modal' data-target='#uploadfotoprofile' title='Klik Untuk Upload Foto Profile' src='" . base_url() . "dist/img/user.svg" . "'></img></div>";
            $data['avatar'] = "<img src='" . base_url() . "dist/img/user.svg'" . "data-toggle='modal' data-target='#uploadfotoprofile' title='Klik Untuk Upload Foto Profile' class='img-circle'>";
        }

        $data['title'] = 'E-RESEARCH';
        $this->load->view("rj", $data);
    }

    public function riwayatpasienrj()
    {
        $search = $this->input->post("search");
        $hasil  = $this->md->riwayatpasienrj($search);

        if (count($hasil) == 0) {
            $json['responCode'] = "01";
            $json['responDesc'] = "Riwayat Pasien Tidak Di Temukan";
        } else {
            $json['responCode'] = "00";
            $json['responDesc'] = "Riwayat Pasien Di Temukan";
            $json['responResult'] = $hasil;
        }

        echo json_encode($json);
    }

    public function triase()
    {
        $triaseigd = $this->input->post("triaseigd");
        $hasil   = $this->md->triase($triaseigd);

        if (count($hasil) == 0) {
            $json['responCode'] = "01";
            $json['responDesc'] = "Riwayat Triase Tidak Di Temukan";
        } else {
            $json['responCode'] = "00";
            $json['responDesc'] = "Riwayat Triase Di Temukan";
            $json['responResult'] = $hasil;
        }

        echo json_encode($json);
    }

    public function laporantindakan()
    {
        $transid = $this->input->post("transid");

        $hasil  = $this->md->laporantindakan($transid);

        if (count($hasil) == 0) {
            $json['responCode'] = "01";
            $json['responDesc'] = "Laporan Tindakan Tidak Di Temukan";
        } else {
            $json['responCode'] = "00";
            $json['responDesc'] = "Laporan Tindakan Di Temukan";
            $json['responResult'] = $hasil;
        }

        echo json_encode($json);
    }

    public function listlaporantindakan()
    {
        $episodeid = $this->input->post("episodeid");

        $hasil  = $this->md->listlaporantindakan($episodeid);

        if (count($hasil) == 0) {
            $json['responCode'] = "01";
            $json['responDesc'] = "Laporan Tindakan Tidak Di Temukan";
        } else {
            $json['responCode'] = "00";
            $json['responDesc'] = "Laporan Tindakan Di Temukan";
            $json['responResult'] = $hasil;
        }

        echo json_encode($json);
    }

    public function laporanalat()
    {
        $episodeid = $this->input->post("episodeid");

        $hasil  = $this->md->laporantindakan($episodeid, "02");

        if (count($hasil) == 0) {
            $json['responCode'] = "01";
            $json['responDesc'] = "Laporan Tindakan Tidak Di Temukan";
        } else {
            $json['responCode'] = "00";
            $json['responDesc'] = "Laporan Tindakan Di Temukan";
            $json['responResult'] = $hasil;
        }

        echo json_encode($json);
    }

    public function lampirantindakan()
    {
        $jenis     = $this->input->post("jenis");
        $pasienid  = $this->input->post("pasienid");
        $episodeid = $this->input->post("episodeid");

        if ($jenis == '01') {
            $jenis = 'FL01';
        } else {
            $jenis = 'FL02';
        }

        $hasil  = $this->md->lampirantindakan($jenis, $pasienid, $episodeid);

        if (count($hasil) == 0) {
            $json['responCode'] = "01";
            $json['responDesc'] = "Dokumen Lampiran Pasien Tidak Di Temukan";
        } else {
            $json['responCode'] = "00";
            $json['responDesc'] = "Dokumen Lampiran Pasien Di Temukan";
            $json['responResult'] = $hasil;
        }

        echo json_encode($json);
    }

    // public function lampiranalat(){ 
    //     $pasienid  = $this->input->post("pasienid");
    //     $episodeid = $this->input->post("episodeid");

    //     $hasil  = $this->md->lampirantindakan("FL02",$pasienid, $episodeid);

    //     if(count($hasil)==0){
    //         $json['responCode']="01";
    //         $json['responDesc']="Dokumen Lampiran Pasien Tidak Di Temukan";
    //     }else{
    //         $json['responCode']="00";
    //         $json['responDesc']="Dokumen Lampiran Pasien Di Temukan";
    //         $json['responResult']=$hasil;
    //     }

    //     echo json_encode($json);
    // }

    public function createdsep()
    {
        $nosep    = $this->input->post("nosep");
        $urldir   = $this->input->post("urldir");
        $namefile = $this->input->post("namefile");

        $serverjasper = new Client("http://192.168.200.90:8080/jasperserver", "jasperadmin", "jasperadmin");

        if (!is_dir(FCPATH . $urldir)) {
            mkdir(FCPATH . $urldir, 0777, true);
        };

        $controls = array(
            'SEP' => $nosep
        );

        $dirfile         = FCPATH . $urldir . $namefile;
        $report          = $serverjasper->reportService()->runReport('/reports/esep', 'pdf', null, null, $controls);

        if (file_put_contents($dirfile, $report)) {
            $json['responCode'] = "00";
            $json['responDesc'] = "Dokumen SEP Pasien Berhasil ";
        } else {
            $json['responCode'] = "01";
            $json['responDesc'] = "Dokumen SEP Pasien Gagal";
        }

        echo json_encode($json);
    }
    public function createdsep2()
    {
        $nosep    = $this->input->get("nosep");
        $urldir   = $this->input->get("urldir");
        $namefile = $this->input->get("namefile");

        $serverjasper = new Client("http://192.168.200.90:8080/jasperserver", "jasperadmin", "jasperadmin");

        if (!is_dir(FCPATH . $urldir)) {
            mkdir(FCPATH . $urldir, 0777, true);
        };

        $controls = array(
            'SEP' => $nosep
        );

        $dirfile         = FCPATH . $urldir . $namefile;
        $report          = $serverjasper->reportService()->runReport('/reports/esep', 'pdf', null, null, $controls);

        if (file_put_contents($dirfile, $report)) {
            $json['responCode'] = "00";
            $json['responDesc'] = "Dokumen SEP Pasien Berhasil ";
        } else {
            $json['responCode'] = "01";
            $json['responDesc'] = "Dokumen SEP Pasien Gagal";
        }

        echo json_encode($json);
    }
    public function cetakkfr()
    {
        // $userID = $this->input->get('user_id');
        $episodeID = $this->input->get('episode_id');
        $data['dataEpisode'] = $this->md->getEpisode($episodeID);
        $data['datatindakankfr'] = $this->md->gettindakankfr($episodeID);
        $data['datalayankfr'] = $this->md->getlayankfr($episodeID);
        /*  var_dump($data);
        die(); */
        $pdf = new TCPDF();
        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(false);
        // Add a page
        $pdf->AddPage('P', 'A4');

        // Set the font
        $pdf->SetFont('times', '', 10);

        // HTML content to be added to the PDF
        ob_start();
        $this->load->view('pdf/kfr', $data);
        $html = ob_get_clean();
        /*  echo $html;
        die(); */
        // Write HTML to the PDF
        $pdf->writeHTML($html, true, false, true, false, '');

        // Output the PDF
        $pdf->Output('FORMULIR-REHAB.pdf', 'I');
    }
    public function lampiran()
    {
        $pasienid  = $this->input->post("pasienid");
        $episodeid = $this->input->post("episodeid");
        $nosep = $this->input->post("nosep");

        $hasil  = $this->md->lampiran($pasienid, $episodeid, $nosep);
        if (count($hasil) == 0) {
            $json['responCode'] = "01";
            $json['responDesc'] = "Dokumen Lampiran Pasien Tidak Di Temukan";
        } else {
            $json['responCode'] = "00";
            $json['responDesc'] = "Dokumen Lampiran Pasien Di Temukan";
            $json['responResult'] = $hasil;
        }

        echo json_encode($json);
    }

    public function rincianbilling()
    {
        $pasienid  = $this->input->post("pasienid");
        $episodeid = $this->input->post("episodeid");

        $hasil  = $this->md->rincianbillingrj($pasienid, $episodeid);

        if (count($hasil) == 0) {
            $json['responCode'] = "01";
            $json['responDesc'] = "Rincian Billing Tidak Di Temukan";
        } else {
            $json['responCode'] = "00";
            $json['responDesc'] = "Rincian Billing Di Temukan";
            $json['responResult'] = $hasil;
        }

        echo json_encode($json);
    }

    public function orderlab()
    {
        $pasienid  = $this->input->post("pasienid");
        $episodeid = $this->input->post("episodeid");

        $hasil  = $this->md->orderlab($pasienid, $episodeid);

        if (count($hasil) == 0) {
            $json['responCode'] = "01";
            $json['responDesc'] = "Order Lab Tidak Di Temukan";
        } else {
            $json['responCode'] = "00";
            $json['responDesc'] = "Order Lab Di Temukan";
            $json['responResult'] = $hasil;
        }

        echo json_encode($json);
    }

    public function orderrad()
    {
        $pasienid  = $this->input->post("pasienid");
        $episodeid = $this->input->post("episodeid");

        $hasil  = $this->md->orderrad($pasienid, $episodeid);

        if (count($hasil) == 0) {
            $json['responCode'] = "01";
            $json['responDesc'] = "Order Rad Tidak Di Temukan";
        } else {
            $json['responCode'] = "00";
            $json['responDesc'] = "Order Rad Di Temukan";
            $json['responResult'] = $hasil;
        }

        echo json_encode($json);
    }

    public function detailrad()
    {
        $transcorad  = $this->input->post("transcorad");
        $episodeid   = $this->input->post("episodeid");

        $hasil  = $this->md->radetail($episodeid, $transcorad);

        if (count($hasil) == 0) {
            $json['responCode'] = "01";
            $json['responDesc'] = "Detail Order Rad Tidak Di Temukan";
        } else {
            $json['responCode'] = "00";
            $json['responDesc'] = "Detail Order Rad Di Temukan";
            $json['responResult'] = $hasil;
        }

        echo json_encode($json);
    }

    public function hasilrad()
    {
        $transrad  = $this->input->post("transrad");

        $hasil  = $this->md->hasilrad($transrad);


        if (count($hasil) == 0) {
            //cek di ris
            $hasilris = $this->md->hasilris($transrad);
            /*  echo json_encode($hasilris);
            die(); */
            if ($hasilris) {
                $resultris = $hasilris->EXPERTISE->load();
                $json['responCode'] = "00";
                $json['responDesc'] = "Expertise Rad Di Temukan";
                $json['responResult'] = $resultris;
            } else {
                $json['responCode'] = "01";
                $json['responDesc'] = "Expertise Tidak Di Temukan";
            }
        } else {
            $reader = new RtfReader();
            $reader->Parse($hasil[0]->RESULT_RTF);
            $formatter = new RtfHtml();
            $resultrad = $formatter->Format($reader->root);
            $json['responCode'] = "00";
            $json['responDesc'] = "Expertise Rad Di Temukan";
            $json['responResult'] = $resultrad;
        }

        echo json_encode($json);
    }

    public function resultlab()
    {
        $pasienidlab  = $this->input->post("pasienidlab");
        $sampleid     = $this->input->post("sampleid");

        $hasil  = $this->md->resultlab($pasienidlab, $sampleid);

        if (count($hasil) == 0) {
            $json['responCode'] = "01";
            $json['responDesc'] = "Result Lab Tidak Di Temukan";
        } else {
            $json['responCode'] = "00";
            $json['responDesc'] = "Result Lab Di Temukan";
            $json['responResult'] = $hasil;
        }

        echo json_encode($json);
    }

    public function explab()
    {
        $noteid  = $this->input->post("noteid");

        $hasil  = $this->md->explab($noteid);

        $reader = new RtfReader();
        $reader->Parse($hasil[0]->HASIL_TEKS);
        $formatter = new RtfHtml();
        $result = $formatter->Format($reader->root);

        if (count($hasil) == 0) {
            $json['responCode'] = "01";
            $json['responDesc'] = "Expertise Tidak Di Temukan";
        } else {
            $json['responCode'] = "00";
            $json['responDesc'] = "Expertise Lab Di Temukan";
            $json['responResult'] = $result;
        }

        echo json_encode($json);
    }

    public function chartlab()
    {
        $pasienidlab  = $this->input->post("pasienidlab");
        $testid       = $this->input->post("testid");
        $pasienid     = $this->input->post("pasienid");
        $episodeid    = $this->input->post("episodeid");

        $hasil  = $this->md->chartlab($pasienidlab, $testid, $pasienid, $episodeid);

        if (count($hasil) == 0) {
            $json['responCode'] = "01";
            $json['responDesc'] = "Chart Lab Tidak Di Temukan";
        } else {
            $json['responCode'] = "00";
            $json['responDesc'] = "Chart Lab Di Temukan";
            $json['responResult'] = $hasil;
        }

        echo json_encode($json);
    }

    public function resumediagnosa()
    {
        $episodeid   = $this->input->post("episodeid");
        $provider    = $this->input->post("provider");

        if ($provider === 'CO-INSIDENS') {
            $hasil  = $this->md->resumediagnosaCOINSIDEN($episodeid);
        } else {
            $hasil  = $this->md->resumediagnosa($episodeid);
        }


        if (count($hasil) == 0) {
            $json['responCode'] = "01";
            $json['responDesc'] = "Resume Diagnosa Tidak Di Temukan";
        } else {
            $json['responCode'] = "00";
            $json['responDesc'] = "Resume Diagnosa Di Temukan";
            $json['responResult'] = $hasil;
        }

        echo json_encode($json);
    }

    public function resumetindakan()
    {
        $episodeid    = $this->input->post("episodeid");

        $hasil  = $this->md->resumetindakan($episodeid);

        if (count($hasil) == 0) {
            $json['responCode'] = "01";
            $json['responDesc'] = "Resume Tindakan Medis Tidak Di Temukan";
        } else {
            $json['responCode'] = "00";
            $json['responDesc'] = "Resume Tindakan Medis Di Temukan";
            $json['responResult'] = $hasil;
        }

        echo json_encode($json);
    }

    public function resumeanamnesa()
    {
        $episodeid    = $this->input->post("episodeid");

        $hasil  = $this->md->resumeanamnesa($episodeid);

        if (count($hasil) == 0) {
            $json['responCode'] = "01";
            $json['responDesc'] = "Anamnesa Tidak Di Temukan";
        } else {
            $json['responCode'] = "00";
            $json['responDesc'] = "Anamnesa Di Temukan";
            $json['responResult'] = $hasil;
        }

        echo json_encode($json);
    }

    public function resumeobat()
    {
        $pasienid    = $this->input->post("pasienid");
        $episodeid    = $this->input->post("episodeid");

        $hasil  = $this->md->resumeobat($pasienid, $episodeid);

        if (count($hasil) == 0) {
            $json['responCode'] = "01";
            $json['responDesc'] = "Obat Tidak Di Temukan";
        } else {
            $json['responCode'] = "00";
            $json['responDesc'] = "Obat Di Temukan";
            $json['responResult'] = $hasil;
        }

        echo json_encode($json);
    }

    public function soap()
    {
        $pasienid  = $this->input->post("pasienid");
        $episodeid = $this->input->post("episodeid");
        $jmlsoapdr = $this->input->post("jmlsoapdr");
        $poliid    = $this->input->post("poliid");
        $dokterid  = $this->input->post("dokterid");
        $tglmasuk  = $this->input->post("tglmasuk");
        $jenissoap = $this->input->post("jenissoap");

        if ($jenissoap === 'DOKTER') {
            if ($jmlsoapdr === '0') {
                $hasil  = $this->md->soapdrlast($pasienid, $poliid, $dokterid, $tglmasuk);
            } else {
                $hasil  = $this->md->soapdr($pasienid, $episodeid);
            }
        } else {
            $hasil  = $this->md->soapprwt($pasienid, $episodeid);
        }

        if (count($hasil) == 0) {
            $json['responCode'] = "01";
            $json['responDesc'] = "SOAP Tidak Di Temukan";
        } else {
            $json['responCode'] = "00";
            $json['responDesc'] = "SOAP Di Temukan";
            $json['responResult'] = $hasil;
        }

        echo json_encode($json);
    }
    function mergePDFs($files, $outputPath)
    {
        $pdf = new Fpdi();
        $options = array(
            'http' => array(
                'timeout' => 300
            ),
        );
        $context = stream_context_create($options);
        // Loop through each PDF file
        foreach ($files as $file) {
            // Get the total number of pages in the PDF
            $pageCount = $pdf->setSourceFile(StreamReader::createByString(file_get_contents($file, false)));

            // Add each page to the new document
            for ($i = 1; $i <= $pageCount; $i++) {
                $template = $pdf->importPage($i);
                $size = $pdf->getTemplateSize($template);
                $pdf->AddPage($size['orientation'], [$size['width'], $size['height']]);
                $pdf->useTemplate($template);
            }
        }

        // Output the merged PDF to a file
        $pdf->Output('D', $outputPath);
    }
    public function mergepdf()
    {
        /*  $pdf = new Fpdi();
        $file = file_get_contents('http://simrs.rsudpm.local/e-research//dist/filescan/00/02/21/04/00022104_0008_241101112001.pdf');
        $pagecount = $pdf->setSourceFile(StreamReader::createByString($file)); */
        $name = $this->input->get('name');
        $listattach = explode(',', $this->input->get('listattach'));

        $files = $listattach;
        //$outputPath = './dist/merged_output.pdf';
        $outputPath = $name . '.pdf';
        $this->mergePDFs($files, $outputPath);

        echo "PDFs merged successfully!";
    }
    public function createdpdfrad()
    {
        /* $pdf = new TCPDF();
        $pdf->AddPage();
        $html = $this->load->view('pdf/rad', true);
        $pdf->writeHTML($html);
        $pdf->Output(); */
        $no = $this->input->get('no');
        $rad = $this->md->getrad($no);
        $data['rad'] = $rad;
        $pdf = new TCPDF();
        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(false);
        // Add a page
        $pdf->AddPage('P', 'A4');

        // Set the font
        $pdf->SetFont('times', '', 10);

        // HTML content to be added to the PDF
        // ob_start();
        //$data['EXPERTISE_HTML_CONCLUSION'] =  $rad->EXPERTISE_HTML_CONCLUSION ? preg_replace('/style[^>]*/', '', $rad->EXPERTISE_HTML_CONCLUSION->load()) : '';
        //$data['EXPERTISE_HTML_FINDING'] =  $rad->EXPERTISE_HTML_FINDING ?   preg_replace('/style[^>]*/', '', $rad->EXPERTISE_HTML_FINDING->load()) : '';
        $html = $this->load->view('pdf/rad', $data, true);
        /*  echo $html;
        die(); */
        //$html = ob_get_clean();

        // Write HTML to the PDF
        $pdf->writeHTML($html, true, false, true, false, '');

        // Output the PDF
        $pdf->Output();
        //$pdf->Output('D:\\RAD.pdf', 'F');
    }
    public function convertimgtopdf()
    {
        $url = $this->input->get('url');
        $pdf = new TCPDF();
        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(false);
        $pdf->SetMargins(5, 5, 5, 5);
        $pdf->AddPage();
        $pdf->writeHTML('<img src="' . $url . '"/>', true, false, true, false, '');

        // Output the PDF
        $pdf->Output();
    }
    public function convertpdf()
    {

        //echo shell_exec("gswin64c -version");

        /*  $path = $this->input->get('path');
        $pathd = explode('_',$path);
        $pathfull = "\\\\192.168.100.50\\scanrm\\FILESCAN\\".substr($pathd[0],0,2)."\\".substr($pathd[0],2,2)."\\".substr($pathd[0],4,2)."\\".substr($pathd[0],6,2)."\\".$path;
        fopen($pathfull,'r'); */
        //$pathfull = 'file://///192.168.100.50/scanrm/FILESCAN/00/37/52/15/00375215_0104_06032025090818.pdf';
        // $output = './dist/00375215_0104_06032025090818.pdf';

        // die();
        /*  echo $path;
        die(); */
        /*  $pdf = new Fpdi();
        $pdf->setSourceFile('./dist/00377011_0104_11032025092300.pdf');
        $templateId = $pdf->importPage(1);
        $size = $pdf->getTemplateSize($templateId);
        $pdf->AddPage($size['orientation'], [$size['width'], $size['height']]);
        $pdf->useTemplate($templateId);

        $pdf->Output('F', 'output.pdf'); // Save as new PDF (defaults to 1.4) */
        //$outputFile = './dist/00377011_0104_11032025092300_1.pdf';
        /*  header('Content-type:Application/pdf');
        echo str_replace('86271', '89766', str_replace('PDF-1.5', 'PDF-1.4', file_get_contents($inputFile))); */
        /*  $outputFile = './dist/00377011_0104_11032025092300.pdf';

        $command = "gs -sDEVICE=pdfwrite -dCompatibilityLevel=1.4 -o " . escapeshellarg($outputFile) . " " . escapeshellarg($inputFile);
        exec($command, $output, $returnVar);

        if ($returnVar === 0) {
            echo "PDF successfully converted to version 1.4.";
        } else {
            echo "Error converting PDF.";
        } */
        /* shell_exec( "gswin64 -sDEVICE=pdfwrite -dCompatibilityLevel=1.4 -dNOPAUSE -dQUIET -dBATCH -sOutputFile=".$pathfull." ".$output);

        echo 'done'; */
        $pathfull = $this->input->get('path');
        $os = PHP_OS;
        /*  echo $pathfull;
        die(); */
        if ($os == 'Linux') {
            $merge = shell_exec("gs -sDEVICE=pdfwrite -dCompatibilityLevel=1.4 -dNOPAUSE -dQUIET -dBATCH -sOutputFile=." . str_replace('.pdf', '_new.pdf', $pathfull) . " ." . $pathfull);
            $merge = shell_exec("gs -sDEVICE=pdfwrite -dCompatibilityLevel=1.4 -dNOPAUSE -dQUIET -dBATCH -sOutputFile=." . $pathfull . " ." . str_replace('.pdf', '_new.pdf', $pathfull));
            unlink("." . str_replace('.pdf', '_new.pdf', $pathfull));
        } else {
            $merge = shell_exec("gswin64 -sDEVICE=pdfwrite -dCompatibilityLevel=1.4 -dNOPAUSE -dQUIET -dBATCH -sOutputFile=." . str_replace('.pdf', '_new.pdf', $pathfull) . " ." . $pathfull);
            $merge = shell_exec("gswin64 -sDEVICE=pdfwrite -dCompatibilityLevel=1.4 -dNOPAUSE -dQUIET -dBATCH -sOutputFile=." . $pathfull . " ." . str_replace('.pdf', '_new.pdf', $pathfull));
            unlink("." . str_replace('.pdf', '_new.pdf', $pathfull));
        }
        /*    if($merge) {
            $file = base_url('dist/FILEAPPS/merge_new.pdf');
            header('Content-Type: application/pdf');
            header('Content-Disposition: attachment; filename="' . basename($file) . '"');
            readfile($file);
        } */
    }
    public function convertpdf2()
    {
        $pdf = new Fpdi();
        $pdf->setSourceFile('./dist/convertpdf.pdf');
        $templateId = $pdf->importPage(1);
        $size = $pdf->getTemplateSize($templateId);
        $pdf->AddPage($size['orientation'], [$size['width'], $size['height']]);
        $pdf->useTemplate($templateId);

        $pdf->Output('F', 'output.pdf');
    }

    public function showeklaim()
    {
        $nosep = $this->input->get('nosep');
        $geteklaimbaru = $this->md->geteklaimbaru($nosep);
        $pdf = $geteklaimbaru->CLAIM_PDF_BASE64->load();
        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename="klaim.pdf"');
        echo base64_decode($pdf);
    }
}

class RtfElement
{
    protected function Indent($level)
    {
        for ($i = 0; $i < $level * 2; $i++) echo "&nbsp;";
    }
}

class RtfGroup extends RtfElement
{

    public $parent;
    public $children;

    public function __construct()
    {
        $this->parent = null;
        $this->children = array();
    }

    public function GetType()
    {
        // No children?
        if (sizeof($this->children) == 0) return null;
        // First child not a control word?
        $child = $this->children[0];
        if (get_class($child) != "RtfControlWord") return null;
        return $child->word;
    }

    public function IsDestination()
    {
        // No children?
        if (sizeof($this->children) == 0) return null;
        // First child not a control symbol?
        $child = $this->children[0];
        if (get_class($child) != "RtfControlSymbol") return null;
        return $child->symbol == '*';
    }

    public function dump($level = 0)
    {
        echo "<div>";
        $this->Indent($level);
        echo "{";
        echo "</div>";

        foreach ($this->children as $child) {
            if (get_class($child) == "RtfGroup") {
                if ($child->GetType() == "fonttbl") continue;
                if ($child->GetType() == "colortbl") continue;
                if ($child->GetType() == "stylesheet") continue;
                if ($child->GetType() == "info") continue;
                // Skip any pictures:
                if (substr($child->GetType(), 0, 4) == "pict") continue;
                if ($child->IsDestination()) continue;
            }
            $child->dump($level + 2);
        }

        echo "<div>";
        $this->Indent($level);
        echo "}";
        echo "</div>";
    }
}

class RtfControlWord extends RtfElement
{
    public $word;
    public $parameter;

    public function dump($level)
    {
        echo "<div style='color:green'>";
        $this->Indent($level);
        echo "WORD {$this->word} ({$this->parameter})";
        echo "</div>";
    }
}

class RtfControlSymbol extends RtfElement
{
    public $symbol;
    public $parameter = 0;

    public function dump($level)
    {
        echo "<div style='color:blue'>";
        $this->Indent($level);
        echo "SYMBOL {$this->symbol} ({$this->parameter})";
        echo "</div>";
    }
}

class RtfText extends RtfElement
{
    public $text;

    public function dump($level)
    {
        echo "<div style='color:red'>";
        $this->Indent($level);
        echo "TEXT {$this->text}";
        echo "</div>";
    }
}

class RtfReader
{
    public $root = null;

    protected function GetChar()
    {
        $this->char = $this->rtf[$this->pos++];
    }

    protected function ParseStartGroup()
    {
        // Store state of document on stack.
        $group = new RtfGroup();
        if ($this->group != null) $group->parent = $this->group;
        if ($this->root == null) {
            $this->group = $group;
            $this->root = $group;
        } else {
            array_push($this->group->children, $group);
            $this->group = $group;
        }
    }

    protected function is_letter()
    {
        if (ord($this->char) >= 65 && ord($this->char) <= 90) return TRUE;
        if (ord($this->char) >= 90 && ord($this->char) <= 122) return TRUE;
        return FALSE;
    }

    protected function is_digit()
    {
        if (ord($this->char) >= 48 && ord($this->char) <= 57) return TRUE;
        return FALSE;
    }

    protected function ParseEndGroup()
    {
        // Retrieve state of document from stack.
        $this->group = $this->group->parent;
    }

    protected function ParseControlWord()
    {
        $this->GetChar();
        $word = "";
        while ($this->is_letter()) {
            $word .= $this->char;
            $this->GetChar();
        }

        // Read parameter (if any) consisting of digits.
        // Paramater may be negative.
        $parameter = null;
        $negative = false;

        if ($this->char == '-') {
            $this->GetChar();
            $negative = true;
        }

        while ($this->is_digit()) {
            if ($parameter == null) $parameter = 0;
            $parameter = $parameter * 10 + $this->char;
            $this->GetChar();
        }

        if ($parameter === null) $parameter = 1;
        if ($negative) $parameter = -$parameter;

        // If this is \u, then the parameter will be followed by 
        // a character.
        if ($word == "u") {
        }
        // If the current character is a space, then
        // it is a delimiter. It is consumed.
        // If it's not a space, then it's part of the next
        // item in the text, so put the character back.
        else {
            if ($this->char != ' ') $this->pos--;
        }

        $rtfword = new RtfControlWord();
        $rtfword->word = $word;
        $rtfword->parameter = $parameter;
        array_push($this->group->children, $rtfword);
    }

    protected function ParseControlSymbol()
    {
        // Read symbol (one character only).
        $this->GetChar();
        $symbol = $this->char;

        // Symbols ordinarily have no parameter. However, 
        // if this is \', then it is followed by a 2-digit hex-code:
        $parameter = 0;
        if ($symbol == '\'') {
            $this->GetChar();
            $parameter = $this->char;
            $this->GetChar();
            $parameter = hexdec($parameter . $this->char);
        }

        $rtfsymbol = new RtfControlSymbol();
        $rtfsymbol->symbol = $symbol;
        $rtfsymbol->parameter = $parameter;
        array_push($this->group->children, $rtfsymbol);
    }

    protected function ParseControl()
    {
        // Beginning of an RTF control word or control symbol.
        // Look ahead by one character to see if it starts with
        // a letter (control world) or another symbol (control symbol):
        $this->GetChar();
        $this->pos--;

        if ($this->is_letter())
            $this->ParseControlWord();
        else
            $this->ParseControlSymbol();
    }

    protected function ParseText()
    {
        // Parse plain text up to backslash or brace,
        // unless escaped.
        $text = "";

        do {
            $terminate = false;
            $escape = false;

            // Is this an escape?
            if ($this->char == '\\') {
                // Perform lookahead to see if this
                // is really an escape sequence.
                $this->GetChar();
                switch ($this->char) {
                    case '\\':
                        $text .= '\\';
                        break;
                    case '{':
                        $text .= '{';
                        break;
                    case '}':
                        $text .= '}';
                        break;
                    default:
                        // Not an escape. Roll back.
                        $this->pos = $this->pos - 2;
                        $terminate = true;
                        break;
                }
            } else if ($this->char == '{' || $this->char == '}') {
                $this->pos--;
                $terminate = true;;
            }

            if (!$terminate && !$escape) {
                $text .= $this->char;
                $this->GetChar();
            }
        } while (!$terminate && $this->pos < $this->len);

        $rtftext = new RtfText();
        $rtftext->text = $text;
        array_push($this->group->children, $rtftext);
    }

    public function Parse($rtf)
    {
        $this->rtf = $rtf;
        $this->pos = 0;
        $this->len = strlen($this->rtf);
        $this->group = null;
        $this->root = null;

        while ($this->pos < $this->len) {
            // Read next character:
            $this->GetChar();

            // Ignore \r and \n
            if ($this->char == "\n" || $this->char == "\r") continue;

            // What type of character is this?
            switch ($this->char) {
                case '{':
                    $this->ParseStartGroup();
                    break;
                case '}':
                    $this->ParseEndGroup();
                    break;
                case '\\':
                    $this->ParseControl();
                    break;
                default:
                    $this->ParseText();
                    break;
            }
        }
    }
}

class RtfState
{

    public function __construct()
    {
        $this->Reset();
    }

    public function Reset()
    {
        $this->bold = false;
        $this->italic = false;
        $this->underline = false;
        $this->end_underline = false;
        $this->strike = false;
        $this->hidden = false;
        $this->fontsize = 0;
    }
}

class RtfHtml
{
    public function Format($root)
    {
        $this->output = "";
        // Create a stack of states:
        $this->states = array();
        // Put an initial standard state onto the stack:
        $this->state = new RtfState();
        array_push($this->states, $this->state);
        $this->FormatGroup($root);
        return $this->output;
    }

    protected function FormatGroup($group)
    {
        // Can we ignore this group?
        if ($group->GetType() == "fonttbl") return;
        if ($group->GetType() == "colortbl") return;
        if ($group->GetType() == "stylesheet") return;
        if ($group->GetType() == "info") return;
        // Skip any pictures:
        if (substr($group->GetType(), 0, 4) == "pict") return;
        if ($group->IsDestination()) return;

        // Push a new state onto the stack:
        $this->state = clone $this->state;
        array_push($this->states, $this->state);

        foreach ($group->children as $child) {
            if (get_class($child) == "RtfGroup") $this->FormatGroup($child);
            if (get_class($child) == "RtfControlWord") $this->FormatControlWord($child);
            if (get_class($child) == "RtfControlSymbol") $this->FormatControlSymbol($child);
            if (get_class($child) == "RtfText") $this->FormatText($child);
        }

        // Pop state from stack.
        array_pop($this->states);
        $this->state = $this->states[sizeof($this->states) - 1];
    }

    protected function FormatControlWord($word)
    {
        if ($word->word == "plain") $this->state->Reset();
        if ($word->word == "b") $this->state->bold = $word->parameter;
        if ($word->word == "i") $this->state->italic = $word->parameter;
        if ($word->word == "ul") $this->state->underline = $word->parameter;
        if ($word->word == "ulnone") $this->state->end_underline = $word->parameter;
        if ($word->word == "strike") $this->state->strike = $word->parameter;
        if ($word->word == "v") $this->state->hidden = $word->parameter;
        if ($word->word == "fs") $this->state->fontsize = ceil(($word->parameter / 24) * 16);

        if ($word->word == "par") $this->output .= "<p>";

        // Characters:
        if ($word->word == "lquote") $this->output .= "&lsquo;";
        if ($word->word == "rquote") $this->output .= "&rsquo;";
        if ($word->word == "ldblquote") $this->output .= "&ldquo;";
        if ($word->word == "rdblquote") $this->output .= "&rdquo;";
        if ($word->word == "emdash") $this->output .= "&mdash;";
        if ($word->word == "endash") $this->output .= "&ndash;";
        if ($word->word == "bullet") $this->output .= "&bull;";
        if ($word->word == "u") $this->output .= "&loz;";
    }

    protected function BeginState()
    {
        $span = "";
        if ($this->state->bold) $span .= "font-weight:bold;";
        if ($this->state->italic) $span .= "font-style:italic;";
        if ($this->state->underline) $span .= "text-decoration:underline;";
        if ($this->state->end_underline) $span .= "text-decoration:none;";
        if ($this->state->strike) $span .= "text-decoration:strikethrough;";
        if ($this->state->hidden) $span .= "display:none;";
        if ($this->state->fontsize != 0) $span .= "font-size: {$this->state->fontsize}px;";
        $this->output .= "<span style='{$span}'>";
    }

    protected function EndState()
    {
        $this->output .= "</span>";
    }

    protected function FormatControlSymbol($symbol)
    {
        if ($symbol->symbol == '\'') {
            $this->BeginState();
            $this->output .= htmlentities(chr($symbol->parameter), ENT_QUOTES, 'ISO-8859-1');
            $this->EndState();
        }
    }

    protected function FormatText($text)
    {
        $this->BeginState();
        $this->output .= $text->text;
        $this->EndState();
    }
}
