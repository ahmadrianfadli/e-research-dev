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

class Mergepdf extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Modelresearch', 'md');
    }
    public function createdsep()
    {
        header('Content-type: application/pdf');
        $nosep    = $this->input->get("nosep");

        /*         $urldir   = $this->input->post("urldir");
        $namefile = $this->input->post("namefile"); */

        $serverjasper = new Client("http://192.168.200.90:8080/jasperserver", "jasperadmin", "jasperadmin");

        /* if (!is_dir(FCPATH . $urldir)) {
            mkdir(FCPATH . $urldir, 0777, true);
        };*/

        $controls = array(
            'SEP' => $nosep
        );

        /*$dirfile         = FCPATH . $urldir . $namefile; */
        $report          = $serverjasper->reportService()->runReport('/reports/esep', 'pdf', null, null, $controls);
        echo $report;
        /*   if (file_put_contents($dirfile, $report)) {
            $json['responCode'] = "00";
            $json['responDesc'] = "Dokumen SEP Pasien Berhasil ";
        } else {
            $json['responCode'] = "01";
            $json['responDesc'] = "Dokumen SEP Pasien Gagal";
        }

        echo json_encode($json); */
    }
    function mergePDFs($files, $outputPath, $loc)
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
            $pageCount = $pdf->setSourceFile(StreamReader::createByString(file_get_contents($file, false, $context)));

            // Add each page to the new document
            for ($i = 1; $i <= $pageCount; $i++) {
                $template = $pdf->importPage($i);
                $size = $pdf->getTemplateSize($template);
                $pdf->AddPage($size['orientation'], [$size['width'], $size['height']]);
                $pdf->useTemplate($template);
            }
        }

        // Output the merged PDF to a file
        if ($loc) {
            $pdf->Output('F', $loc . $outputPath, TRUE);
        } else {
            $pdf->Output('D', $outputPath);
        }
    }
    public function mergepdfsepresep()
    {
        /*  $pdf = new Fpdi();
        $file = file_get_contents('http://simrs.rsudpm.local/e-research//dist/filescan/00/02/21/04/00022104_0008_241101112001.pdf');
        $pagecount = $pdf->setSourceFile(StreamReader::createByString($file)); */
        $name = $this->input->get('nosep');
        $loc = $this->input->get('loc');
        $listattach = explode(',', $this->input->get('listattach'));

        $files = $listattach;
        //$outputPath = './dist/merged_output.pdf';
        $outputPath =  $name . '.pdf';
        $this->mergePDFs($files, $outputPath, $loc);

        echo "PDFs merged successfully!";
    }
}
